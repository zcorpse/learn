<?php

use Laracasts\Validation\FormValidator;

class UserRegisterValidator extends FormValidator
{
    protected $rules = [
        'login'			=> 'required',
        'name'			=> 'required',
        'type'			=> 'required',
        'mobile'		=> 'required|digits:11',
        'referee'		=> 'required',
        //'accepter'		=> 'required',
        //'accepterquarter'	=> 'required',         
        'date'			=> 'required',
        'amount' 		=> 'required|numeric|min:0',
        'email'			=> 'email'
    ];

    protected $messages = [
        'login.required' 	=> '请填写账户名',
        'name.required'  	=> '请填写姓名',
        'type.required'  	=> '请选择会员类型',
        'mobile.required'  	=> '请填写手机号码',
        'mobile.digits'  	=> '手机号码格式不正确',
        'referee.required'  => '请填推荐人帐号',
        //'accepter.required'	=> '请填接点人帐号',
        //'accepterquarter.required'  => '请选择接点人区域',
        'date.required'  	=> '请选择开户日期',         
        'amount.required'  	=> '请输入开户金额',
        'amount.numeric'  	=> '输入格式不正确',
        'amount.min'        => '金额不能小于零',       
        'email.email'  		=> '电子邮件格式不正确'
    ];
}