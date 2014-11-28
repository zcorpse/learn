<?php

use Laracasts\Validation\FormValidator;

class SendemailValidator extends FormValidator
{
    protected $rules = [
        'email'         => 'required|email'        
    ];

    protected $messages = [
        'email.required'    => '请填写电子邮箱',
        'email.email'       => '电子邮箱格式不正确'        
    ];
}