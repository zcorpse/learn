<?php

	const DEFAULT_PASSWORD = '888888';
	const RATE_100 	= 1.00;
	const RATE_20 	= 0.20;
	const RATE_5 	= 0.05;
	const RATE_4 	= 0.04;
	const RATE_2 	= 0.02;
	const RATE_1 	= 0.01;

	const STATUS_NORMAL = 1;
	const STATUS_FREEZE = 0;
	

	const CONST_1 		= 1;
	const CONST_2 		= 2;	
	const FLAG_DEBIT 	= 1;
	const FLAG_CREDIT 	= 0;

	const FLAG_USER 	= 0;//用户
	const FLAG_HO 		= 1;//总公司
	const FLAG_BO 		= 2;//分公司
	const FLAG_SP 		= 3;//家庭超市

	const ORDER_TEMP 	= -1;
	const ORDER_UNPAY	= 0;//未付款
	const ORDER_NORMAL	= 1;//已付款
	const ORDER_PROCESS	= 2;//已审核
	const ORDER_END		= 3;//交易完毕
	const ORDER_CANCEL	= 4;//订单取消

	const INVOICE_EXPRESS	= 1;//快递发货
	const INVOICE_SHOP		= 2;//家庭超市自提

	const FEE_PARTNER		= 14000;
	const FEE_STANDARD		= 600;
	

//开户/直推奖/提成/重消奖/充值/提现/转入/转出/普通消费/开户消费/领导奖/区域奖/订单退还/区域奖扣除
//
	const RECORD_D_KH 	= 0;
	const RECORD_D_ZT 	= 1;
	const RECORD_D_TC 	= 2;
	const RECORD_D_CX 	= 3;
	const RECORD_D_CZ 	= 4;
	const RECORD_C_TC 	= 5;
	const RECORD_D_ZR 	= 6;
	const RECORD_C_ZC 	= 7;
	const RECORD_C_XF 	= 8;
	const RECORD_C_SC 	= 9;
	const RECORD_D_LD 	= 10;
	const RECORD_D_QY 	= 11;
	const RECORD_D_TH 	= 12;
	const RECORD_C_KC 	= 13;

?>