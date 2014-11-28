<?php

use Laracasts\Validation\FormValidator;

class RegisterValidator extends FormValidator
{
    protected $rules = [
        'email'         => 'required|email',        
        'name'			=> 'required',
        'password'              => 'required|confirmed',
        'password_confirmation' => 'required',
        'mobile'		=> 'required|digits:11',
        'region'        => 'required_without:0',
        'code'          => 'required|digits:6',
        'idcard'        => array('required','regex:/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/')
        
    ];

    protected $messages = [
        'email.required'    => '请填写电子邮箱',
        'email.email'       => '电子邮箱格式不正确',
        'name.required'  	=> '请填写姓名',
        'password.required'     => '密码不能为空',
        'password.confirmed'    => '两次输入的密码不一致',
        'password_confirmation.required'  => '密码确认不能为空',
        'mobile.required'  	=> '请填写手机号码',
        'mobile.digits'  	=> '手机号码格式不正确',  
        'region.required_without'   => '请选择注册区域',
        'code.required'     => '请填写邀请码',
        'code.digits'       => '邀请码格式不正确',
        'idcard.required'     => '请填写身份证号码',
        'idcard.regex'       => '身份证格式不正确'
        
    ];
}