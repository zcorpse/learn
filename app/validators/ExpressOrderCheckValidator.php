<?php

use Laracasts\Validation\FormValidator;

class ExpressOrderCheckValidator extends FormValidator
{
    protected $rules = [
        'express'   => 'required',
        'ticket'    => 'required'
    ];

    protected $messages = [
        'express.required'  => '请填写快递公司名称',
        'ticket.required'   => '请填写运单号'
    ];
}