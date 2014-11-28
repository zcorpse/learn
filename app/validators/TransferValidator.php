<?php

use Laracasts\Validation\FormValidator;

class TransferValidator extends FormValidator
{
    protected $rules = [
        'password2' => 'required',
        'login'     => 'required',
        'name'      => 'required',
        'amount'    => 'required|numeric'
    ];

    protected $messages = [
        'password2.required'    => '请输入二级密码',
        'login.required'    => '请输入转入方帐号',
        'name.required' => '请输入转入方姓名',            
        'amount.required'  => '请输入转账金额',
        'amount.numeric'  => '输入格式不正确'
    ];
}