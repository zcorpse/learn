<?php

use Laracasts\Validation\FormValidator;

class LoginValidator extends FormValidator
{
    protected $rules = [
        'login'    => 'Required',
        'password' => 'Required',
        //'captcha' => 'Required|captcha'
    ];

    protected $messages = [
        'login.required' => '请填写用户名',
        'password.required'  => '请填写密码',    
        //'captcha.required'  => '请输入验证码',
        //'captcha.captcha'  => '验证码不正确'
    ];
}