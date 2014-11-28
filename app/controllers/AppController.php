<?php

/*$dir = dirname(dirname(__FILE__));
require $dir.'/controllers/Const.php';*/

class AppController extends Controller {

	protected $views;
	protected $menus;

	public function __construct()
	{
		$this->views = Route::currentRouteName();		

		//Cache::forget('menu_nodes');
		if(Auth::check()){
			$this->menus = Menu::getAuthMenus();			
    	}

    	$this->beforeFilter('csrf', ['on' => 'post']);
	}

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
		View::share('menus', $this->menus);
	}





	protected function setRelation($type,$uid,$pid,$quarter)
	{
		if( $type == CONST_1){
			$relation = new Referee;
		}
		elseif($type == CONST_2){
			$relation = new Accepter;
		}
		else
			return false;

		
		$relation->uid = $uid;
		$relation->pid = $pid;
		$relation->quarter = $quarter;
		
		if($relation->save()){
			return $relation;
		}

	}


	
	protected function getUser($username)
	{
		return User::where('login','=',$username)->first();
	}



	protected function setUser($input,$flag,$status = false)
	{
		$user = new User;
		$user->login = $input['login'];
		$user->password = Hash::make(DEFAULT_PASSWORD);
		$user->password2 = Hash::make(DEFAULT_PASSWORD);
		$user->name = $input['name'];
		$user->flag = $flag;
		$user->region = Auth::user()->id;
		$user->status = $status ? STATUS_NORMAL:STATUS_FREEZE;
		$user->first = STATUS_FREEZE;
		$user->province = array_key_exists('province',$input)  ? $input['province']:'';
		$user->city = array_key_exists('city',$input) ? $input['city']:'';
		$user->county = array_key_exists('county',$input) ? $input['county']:'';
		
		$user->email = array_key_exists('email',$input) ? $input['email']:'';
		$user->mobile = $input['mobile'];
		$user->type = array_key_exists('type',$input) ? $input['type']:0;								
		$user->idcard = array_key_exists('idcard',$input) ? $input['idcard']:'';
		$user->address = $input['address'];
		$user->memo = $input['memo'];
		$user->date = array_key_exists('date',$input) ? strtotime($input['date']):strtotime(date('Y-m-d'));
		$user->code = rand(100000,999999);	
		//dd($user);
		if($user->save()){
			return $user;	
		}
		
	}



	protected function updateUser($uid,$input)
	{
		$user = User::find($uid);
		$user->name = $input['name'];
		$user->date = strtotime($input['date']);
		$user->email = array_key_exists('email',$input) ? $input['email']:'';
		$user->mobile = $input['mobile'];
		$user->type = array_key_exists('type',$input) ? $input['type']:1;								
		$user->idcard = array_key_exists('idcard',$input) ? $input['idcard']:'';
		$user->address = $input['address'];
		$user->memo = $input['memo'];
		if($user->save()){
			return $user;	
		}
	}


	protected function setAccount($user,$amount,$status = false)
	{
		if($user){			
			$account = new Account;
			$account->uid = $user->id;
			$account->type = CONST_1;
			$account->date = $user->date;
			$account->balance = $amount;
			$account->status = $status ? STATUS_NORMAL:STATUS_FREEZE;

			if( $account->save()){
				return $account;
			}
		}

	}



	protected function getRecord($uid,$type,$status)
	{
		return Record::where('uid','=',$uid)->where('type','=',$type)->where('status','=',$status)->first();
	}

	/**
	 * $check 自动入账标志
	 */

	protected function setRecord($uid,$bid,$flag,$type,$cost,$rate,$check = false)
	{
		//取得上次余额
		$lastBalance = $this->getLastBalance($uid);		
		//计算本次余额
		$balance = ($flag == FLAG_DEBIT) ? $lastBalance + $cost*$rate : $lastBalance - $cost*$rate;

		//if( isset($uid) && isset($bid) && ( $balance >= 0 ) ){
		if( isset($uid) && isset($bid) ){
			$record = new Record;			
			$record->uid = $uid;
			$record->bid = $bid;
			$record->flag = $flag;
			$record->type = $type;
			$record->cost = $cost;
			$record->rate = $rate;
			$record->amount = $cost*$rate;
			$record->status = STATUS_FREEZE;
			$record->date = strtotime(date('Y-m-d H:i:s'));
			$record->balance = $balance;
			//dd($record); 
			if($record->save()){
				if( $check ){
					$this->settleAccount($record);
				}
				return $record;
			}
		}
		else{

			return false;
		}
		
	}




	/*protected function getAccount($uid)
	{
		return Account::where('uid','=',$uid)->where('status','=',STATUS_NORMAL)->first();
	}
	/**
	 * 手工入账
	 */

	/*protected function settleAccount($record)
	{		
		//$checkRecord = Record::find($record->id);

		if(!is_null($record)){
			//更新流水
			$record->status = STATUS_NORMAL;
			$record->sdate = strtotime(date('Y-m-d H:i:s'));
			if( $record->save()){
				//更新余额
				/*$user = $record->user;
				$user->account = $record->balance;
				return ($user->save());
				$account = $this->getAccount($record->uid);

				if( !is_null($account)){
					$account->balance = $record->balance;
					$account->save();								
				}
				else{					
					$account = $this->setAccount($record->user, $record->balance, true);

				}
				return $account;
			}			
		}
		return false;
	}*/






	//取流水中最后一次余额
	protected function getLastBalance($uid)
	{
		$record = Record::where('uid','=',$uid)->where('status','=',STATUS_NORMAL)->orderBy('date','DESC')->orderBy('id','DESC')->first();
		if($record){
			return $record->balance;
		}
		return 0;		
	}





	protected function findParent($uid,$type)
	{
		switch ($type)
		{
			case 'referee':
				$parent =  Referee::where('uid','=',$uid)->first();					
				break;
			case 'accepter':
				$parent =  Accepter::where('uid','=',$uid)->first();			
				break;
			default:				
				break;			
		}
		
		if ($parent){ 
			return User::find($parent->pid);
		}
		
	}



	protected function getRegion($uid)
	{
		$region = User::find($uid)->region;
		return User::find($region);
	}


	protected function getUserIdByUsername($username)
	{
		$user = User::where('login','=',$username)->first();

		if($user) {			
			return $user->id;
		}

		return false;
	}



	protected function checkAccepterQuarter($accepter,$quarter)
	{
		$uid = $this->getUserIdByUsername($accepter);
		$record = Accepter::where('pid','=',$uid)->where('quarter','=',$quarter)->first();
		if($record){
			return false;
		}
		return true;
	}



	//同一区域内的用户
	protected function findSpecialUser($sid, $uid)
	{		
		if ( $sid == $uid ){
			return User::find($uid);
		}
		else{
			return User::where('id','=',$sid)->where('region','=',$uid)->first();
		}		

		return false;
	}





	//计算直推奖
	protected function setRefereeBouns($uid,$amount,$flag)
	{
		$parent = $this->findParent($uid,'referee');
		
		if( $parent && ($parent->flag == FLAG_USER) ){
			$rate = ($parent->type == 1) ? RATE_20 : RATE_5;			

			$this->setRecord($parent->id,$uid,FLAG_DEBIT,$flag,$amount,$rate,false);
		}
			
		return;
	}

	
	//计算三代领导奖
	protected function setParentRefereeBouns($uid,$amount,$flag,$source)
	{
		static $count = 1;
		
		$parent = $this->findParent($uid,'referee');
		
		if( $parent && ($count++ <=3) && ($parent->flag == FLAG_USER) ){	
			if( $parent->type == 1){
				$this->setRecord($parent->id,$source,FLAG_DEBIT,$flag,$amount,RATE_2,false);
			}					
			return $this->setParentRefereeBouns($parent->id,$amount,$flag,$source);			
		}
			
		
	}


	//计算三代重消奖
	protected function setParentRefereeExpends($uid,$amount,$flag,$source)
	{
		static $count = 1;
		
		$parent = $this->findParent($uid,'referee');
		
		if( $parent && ($count++ <=3) && ($parent->flag == 0) ){	
			if( $parent->type == 1){
				$this->setRecord($parent->id,$source,FLAG_DEBIT,$flag,$amount,RATE_2,false);
			}
			return $this->setParentRefereeExpends($parent->id,$amount,$flag,$source);			
		}
			
		
	}


	protected function processTransfer($send,$recv,$input)
	{
		if( $send->id && $recv->id){

			//转出方流水
			$this->setRecord($send->id,$recv->id,FLAG_CREDIT,RECORD_C_ZC,$input['amount'],RATE_100,true);

			//转入方流水
			$this->setRecord($recv->id,$send->id,FLAG_DEBIT,RECORD_D_ZR,$input['amount'],RATE_100,true);
		}
	}

	
	protected function findFirstOrder($uid)
	{		
		return User::find($uid)->first;		
	}



	
}


