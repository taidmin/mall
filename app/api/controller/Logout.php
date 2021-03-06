<?php
/**
 * Created by PhpStorm.
 * User: Taidmin
 * Date: 2020/9/23
 * Time: 23:36
 */


namespace app\api\controller;


class Logout extends AuthBase
{
    public function index()
    {
        $res = cache(config('redis.token_pre') . $this->accessToken, null);

        if(!$res){
            return show(config('status.error'),'退出登录失败');
        }

        return show(config('status.success'),'退出登录成功');
    }
}