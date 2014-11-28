<?php

use Laracasts\Validation\FormValidator;

class ExpressOrderValidator extends FormValidator
{
    protected $rules = [
        'name'      => 'required',
        'mobile'    => 'required|digits:11',
        'postcode'  => 'required|digits:6',
        'address'   => 'required'
    ];

    protected $messages = [
        'name.required'     => '请填写收货人姓名',
        'mobile.required'   => '请填写联系手机',
        'mobile.digits'     => '手机号码格式不正确',
        'postcode.required' => '请填写邮编',
        'postcode.digits'   => '邮编格式不正确',            
        'address.required'  => '请填写收货地址'
    ];
}