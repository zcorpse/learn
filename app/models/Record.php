<?php

use Laracasts\Presenter\PresentableTrait;

class Record extends Eloquent  {

	use PresentableTrait;

	protected $presenter = 'RecordPresenter';	

	protected $guarded = array();

	public $timestamps = false;

	//protected $table = 'hms_record';
	
	public function user()
	{
		return $this->hasOne('User','id','uid');
	}

	
	public function buser()
	{
		return $this->hasOne('User','id','bid');
	}

		
	public function scopeUserRecord($query, $uid, $type, $status)
	{
		return $query->where('uid','=',$uid)->where('type','=',$type)->where('status','=',$status);
	}


	public static function setRecord(User $user, User $buser, $flag, $type, $cost, $rate, $check = false)
	{
		//取得上次余额
		//$previous = $user->balance ? $user->balance : 0;
		
		//计算本次余额
		$balance = $cost*$rate;

		if( isset($user) && isset($buser) ){		
			$record = new Record;			
			$record->uid = $user->id;
			$record->bid = $buser->id;
			$record->flag = $flag;
			$record->type = $type;
			$record->cost = $cost;
			$record->rate = $rate;
			$record->amount = $cost*$rate;
			$record->status = $check ? STATUS_NORMAL:STATUS_FREEZE;
			$record->date = strtotime(date('Y-m-d H:i:s'));
			$record->sdate = $check ? strtotime(date('Y-m-d H:i:s')) : NULL;
			$record->save();

			if($check)
				User::updateBalance($user,$balance,$flag);
			
			return $record;			
		}
		
		return false;	
		
	}


	//日终帐务结算
	public static function settleRecord(User $user, Record $record)
	{
		$balance = $record->amount;
		$flag = $record->flag;
		if(User::updateBalance($user,$balance,$flag)){
			$record->status = STATUS_NORMAL;
			$record->sdate = strtotime(date('Y-m-d H:i:s'));
			$record->update();
			return true;
		}
		return false;
	}



	//计算直推奖
	public static function setRefereeBouns(User $user, Record $record)
	{
		$parent = Referee::findRefereeParent($user);
		
		if( $parent ){
			$rate = ($parent->type == 1) ? RATE_20 : RATE_5;			

			Record::setRecord($parent, $user,FLAG_DEBIT,RECORD_D_ZT,$record->amount,$rate,false);
		}
	}


	//删除直推奖
	public static function deleteRefereeBouns(User $user)
	{
		$parent = Referee::findRefereeParent($user);
		if($parent)
			Record::where('uid','=',$parent->id)->where('bid','=',$user->id)->where('type','=',RECORD_D_ZT)->delete();
		return true;
		
	}


	//计算三代领导奖
	protected function setParentRefereeBouns(User $user, Record $record, User $source)
	{
		static $count = 1;
		
		$parent = Referee::findRefereeParent($user);
		
		if( $parent && ($count++ <= 3) ){	
			if( $parent->type == 1){
				Record::setRecord($parent, $source, FLAG_DEBIT,RECORD_D_LD,$record->amount,RATE_2,false);
			}					
			return self::setParentRefereeBouns($parent, $record, $source);			
		}		
	}


	//删除三代领导奖
	protected function deleteParentRefereeBouns(User $user)
	{		
		$record = Record::where('bid','=',$user->id)->where('type','=',RECORD_D_LD)->delete();

		return true;
	}


	//计算三代重消奖
	protected function setParentRefereeExpends(User $user, $amount, $flag, User $source)
	{
		static $count = 1;
		
		$parent = Referee::findRefereeParent($user);
		
		if( $parent && ($count++ <=3) && ($parent->flag == 0) ){	
			if( $parent->type == 1){
				Record::setRecord($parent,$source,FLAG_DEBIT,$flag,$amount,RATE_2,false);
			}
			return self::setParentRefereeExpends($parent, $amount, $flag, $source);			
		}
			
		
	}

}