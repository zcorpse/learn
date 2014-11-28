<?php

use Laracasts\Validation\FormValidator;

class PasswordValidator extends FormValidator
{
    protected $rules = [
        'oldpassword'           => 'required',
        'password'              => 'required|confirmed',
        'password_confirmation' => 'required'
    ];

    protected $messages = [
        'oldpassword.required'   => '旧密码不能为空',
        'password.required'     => '新密码不能为空',
        'password.confirmed'    => '两次输入的密码不一致',
        'password_confirmation.required'  => '确认密码不能为空'
    ];
}