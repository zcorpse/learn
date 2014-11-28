<?php

use Laracasts\Validation\FormValidator;

class ShopRegisterValidator extends FormValidator
{
    protected $rules = [
        'login'         => 'required',
        'name'          => 'required',
        'mobile'    => 'required|digits:11',
        'email' => 'email'
    ];

    protected $messages = [
        'login.required' => '请填写超市账户名',
        'name.required'  => '请填写联系人',
        'mobile.required'  => '请填写手机号码',
        'mobile.digits'  => '手机号码格式不正确',
        'email.email'    => '电子邮件格式不正确'
    ];
}