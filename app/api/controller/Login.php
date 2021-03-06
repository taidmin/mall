<?php
declare(strict_types = 1);

namespace app\api\controller;


use app\api\validate\User;
use app\BaseController;

class Login extends BaseController
{
    public function index():object
    {
        if(!$this->request->isPost()){
            return show(config('status.error'),'非法请求');
        }

        $phone = $this->request->param('phone','','trim');
        $code = $this->request->param('code',0,'intval');
        $type = $this->request->param('type',0,'intval');

        // 参数校验
        $data = [
            'phone' => $phone,
            'code' => $code,
            'type' => $type,
        ];

        $validate = new User();
        if(!$validate->scene('login')->check($data)){
            return show(config('status.error'),$validate->getError());
        }

        try{
            $result = (new \app\common\business\User())->login($data);
        }catch (\Exception $e){
            return show($e->getCode(),$e->getMessage());
        }

        return show(config('status.success'),'登录成功',$result);
    }
}