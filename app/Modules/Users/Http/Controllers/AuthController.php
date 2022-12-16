<?php

namespace App\Modules\Users\Http\Controllers;

use App\Modules\Users\Entities\PhoneNumber;
use App\Modules\Users\Entities\User;
use App\Modules\Users\Http\Requests\CodeFailRequest;
use App\Modules\Users\Http\Requests\PhoneFailRequest;
use App\Modules\Users\Http\Requests\UserCodeRequest;
use App\Modules\Users\Transformers\UserResource;
use App\OpenApi\Parameters\User\CodeParameters;
use App\OpenApi\Parameters\User\PhoneParameters;
use App\OpenApi\RequestBodies\PhoneRequestBody;
use App\OpenApi\RequestBodies\UserCodeRequestBody;
use App\OpenApi\Responses\FailedValidationResponse;
use App\OpenApi\Responses\User\LogoutUserResponse;
use App\OpenApi\Responses\User\SendSMSResponse;
use App\OpenApi\Responses\User\UserResponse;
use App\OpenApi\Responses\User\UserTokenResponse;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Throwable;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;


#[OpenApi\PathItem]
class AuthController extends Controller
{
    /**
     * create sms code
     * @return JsonResponse
     * @return Responsable
     */
    #[OpenApi\Operation(tags: ['Auth'], method: 'POST')]
    #[OpenApi\RequestBody(factory: PhoneRequestBody::class)]
    #[OpenApi\Response(factory: SendSMSResponse::class, statusCode: 200)]
    #[OpenApi\Response(factory: FailedValidationResponse::class, statusCode: 422)]
    public function createVerifyCode(PhoneFailRequest $request)
    {
        $requestData = $request->validated();
        $phone = $requestData['phone'];

        try {
            $smsCode = PhoneNumber::sendSmsCode($phone);
        } catch (Throwable $e) {
            abort(422, $e->getMessage());
        }

        session(['sms_code' => $smsCode[0], 'phone' => $phone]);
        return response()->json(['sms code send successfully' => session('sms_code')]);
    }

    /**
     * check user code
     * @return JsonResponse
     * @return Responsable
     */
    #[OpenApi\Operation(tags: ['Auth'], method: 'POST')]
    #[OpenApi\RequestBody(factory: UserCodeRequestBody::class)]
    #[OpenApi\Response(factory: UserTokenResponse::class, statusCode: 200)]
    #[OpenApi\Response(factory: FailedValidationResponse::class, statusCode: 422)]
    public function checkSmsCode(CodeFailRequest $request)
    {

        $data = $request->validated();
        $user_code = $data['user_code'];

        $phone = session('phone');
        $userPhone = PhoneNumber::query()
            ->where('number', $phone)
            ->first();

        if ($code = session('sms_code')){
            if ($user_code === $code){
                if(!$userPhone){
                    $user = User::createUser($phone);
                } else{
                    $user = User::whereHas('phone', function ($query) {
                        $phone = session('phone');
                        return $query->where('number', $phone);
                    })->first();
                }
                session()->flush();

                $authToken = $user->createToken('authToken', ['user'])->plainTextToken;
                return response()->json([
                    'authToken' => $authToken,
                    $user
                ]);
            }
        }
        return response()->json(['user_code' => 'incorrect code'], 403);
    }

    /**
     * logout user
     * @return JsonResponse
     * @return Responsable
     */
    #[OpenApi\Operation(security: 'BearerTokenSecurityScheme', tags: ['Auth'], method: 'POST')]
    #[OpenApi\Response(factory: LogoutUserResponse::class, statusCode: 200)]
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response()->json(['Successfull logout' => $user]);
    }

    /**
     * get user
     * @return UserResource
     * @return Responsable
     */
    #[OpenApi\Operation(security: 'BearerTokenSecurityScheme', tags: ['Auth'], method: 'GET')]
    #[OpenApi\Response(factory: UserResponse::class, statusCode: 200)]
    public function getUser(Request $request)
    {
        return new UserResource($request->user());
    }
}
