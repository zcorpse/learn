<?php

use Laracasts\Validation\FormValidator;

class BranchRegisterValidator extends FormValidator
{
    protected $rules = [
        'login'         => 'required',
        'name'          => 'required',
        'mobile'    => 'required|digits:11',
        'province'          => 'required',
        'city'          => 'required',            
        'date'  => 'required',
        'amount' => 'required|numeric'
    ];

    protected $messages = [
        'login.required' => '请填写账户名',
        'name.required'  => '请填写名称',
        'mobile.required'  => '请填写手机号码',
        'mobile.digits'  => '手机号码格式不正确',
        'province.required'  => '请选择所属区域',
        'city.required'  => '请选择所属区域',   
        'date.required'  => '请选择登记日期',         
        'amount.required'  => '请输入初始金额',
        'amount.numeric'  => '输入格式不正确'
    ];
}