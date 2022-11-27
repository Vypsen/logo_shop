<?php

namespace App\Modules\Users\Entities;

use Illuminate\Database\Eloquent\Model;
use Zelenin\SmsRu\Api;
use Zelenin\SmsRu\Auth\ApiIdAuth;
use Zelenin\SmsRu\Client\Client;
use Zelenin\SmsRu\Entity\Sms;
use Zelenin\SmsRu\Entity\SmsPool;

/**
 * App\Modules\Users\Entities\PhoneNumber
 *
 * @property int $id
 * @property string $number
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Modules\Users\Entities\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber query()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneNumber whereUserId($value)
 * @mixin \Eloquent
 */
class PhoneNumber extends Model
{

    protected $table = 'phone_numbers';

    protected $fillable = [
        'number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function generateCodeSMS()
    {
        return (string) random_int(100000,999999);
    }

    private static function createSMS(string $number, string $code)
    {
        $apiId = $_ENV['API_SMS_RU'];
        $client = new Api(new ApiIdAuth($apiId), new Client());

        $sms = new Sms($number, $code);
        $send = $client->smsSend($sms);

        return $send;
    }

    public static function sendSmsCode(string $phone)
    {
        $code = self::generateCodeSMS();
        $status = self::createSMS($phone, $code . ' code verify');
        return [$code, $status];
    }

}
