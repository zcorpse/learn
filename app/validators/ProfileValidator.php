<?php

use Laracasts\Validation\FormValidator;

class ProfileValidator extends FormValidator
{
    protected $rules = [
        'mobile'    => 'required|digits:11',
        'idcard'        => array('required','regex:/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/')
    ];

    protected $messages = [
        'mobile.required'   => '请填写手机号码',
        'mobile.digits'     => '手机号码格式不正确',   
        'idcard.required'     => '请填写身份证号码',
        'idcard.regex'       => '身份证格式不正确'
    ];
}