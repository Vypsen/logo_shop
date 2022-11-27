<?php

namespace App\Modules\Users\Http\Controllers;

use App\Modules\Users\Entities\PhoneNumber;
use App\Modules\Users\Entities\User;
use App\Modules\Users\Http\Requests\CodeFailRequest;
use App\Modules\Users\Http\Requests\PhoneFailRequest;
use App\Modules\Users\Http\Requests\PhoneRequest;
use App\Modules\Users\Http\Requests\UserCodeRequest;
use App\Modules\Users\Http\Requests\UserRequest;
use App\Modules\Users\Transformers\UserResource;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
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
        return response()->json(['Код успешно отправлен пользователю']);
    }

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
        return response()->json(['user_code' => 'incorrect code' ], 403);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response()->json(['Successfull logout' => $user]);
    }

    public function getUser(Request $request)
    {
        return new UserResource($request->user());
    }
}
