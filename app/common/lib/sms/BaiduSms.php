<?php
declare(strict_types = 1);

namespace app\common\lib\sms;


class BaiduSms implements SmsBase
{
    public static function sendCode(string $phone, int $code):bool
    {
        return true;
    }
}