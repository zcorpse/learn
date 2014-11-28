<?php

use Laracasts\Validation\FormValidator;

class RefereeModifyValidator extends FormValidator
{
    protected $rules = [
        'name'          => 'required',
        'type'          => 'required',
        'mobile'    => 'required|digits:11',
        'referee'           => 'required',
        //'refereequarter'  => 'required',
        //'accepter'          => 'required',
        //'accepterquarter'   => 'required',
        //'province'            => 'required',
        //'city'            => 'required',    
        'email' => 'email'
    ];

    protected $messages = [
        'name.required'  => '请填写姓名',
        'type.required'  => '请选择会员类型',
        'mobile.required'  => '请填写手机号码',
        'mobile.digits'  => '手机号码格式不正确',
        'referee.required'  => '请填推荐人帐号',
        //'refereequarter.required'  => '请选择推荐人区域',
        //'accepter.required'  => '请填接点人帐号',
        //'accepterquarter.required'  => '请选择接点人区域',
        //'province.required'  => '请选择所属分公司',
        //'city.required'  => '请选择所属分公司',    
        'email.email'  => '电子邮件格式不正确'
    ];
}