<?php

use Laracasts\Validation\FormValidator;

class ReserveValidator extends FormValidator
{
    protected $rules = [
        'password2' => 'required',
      	'amount'    => 'required|numeric'
    ];

    protected $messages = [
        'password2.required'    => '请输入二级密码',    
        'amount.required'  => '请输入转账金额',
        'amount.numeric'  => '输入格式不正确'
    ];
}