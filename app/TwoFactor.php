<?php

namespace App;

use App\Services\Notification\SendSms;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\Translation\t;

class TwoFactor extends Model
{
    protected $table = 'two_factor';
    protected $fillable = ['user_id', 'code'];
    const CODE_EXPIRY = 60;


    public static function generateCodeFor(User $user)
    {
        $user->code()->delete();
        return static::create([
            'user_id' => $user->id,
            'code' => mt_rand( 1000, 9999)
        ]);
    }

    public function getCodeForSendAttribute()
    {
        return __('auth.codeForSend', ['code' => $this->code]);
    }

    public function send()
    {
        return  SendSms::send($this->user, $this->code_for_send);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isEqualWith(string $code)
    {
         return $this->code == $code;
    }

    public function isExpired()
    {
        return $this->created_at->diffInSeconds(now()) > self::CODE_EXPIRY;
    }
}
