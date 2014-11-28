<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Laracasts\Presenter\PresentableTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait,PresentableTrait;

	const CACHE_REGIONS     = 'user_regions';
	const CACHE_RELATIONS	= 'user_relations';
	const CACHE_FIRST     	= 'user_first';
	const CACHE_NOTFIRST	= 'user_notfirst';
    const CACHE_MINUTES 	= 60;

    protected $presenter = 'UserPresenter';	
	
	//protected $table = 'users';

	protected $hidden = array('password','password2','passwordsalt');

	protected $guarded = array();

	public $timestamps = false;

	public function referee()
	{
		return $this->hasOne('Referee','uid','id');
	}

	public function accepter()
	{
		return $this->hasOne('Accepter','uid','id');
	}
	

	public function records()
	{
		return $this->hasMany('Record','uid','id');
	}

	public function orders()
	{
		return $this->hasMany('Order','uid','id');
	}

	//根据帐号查找用户
	public function scopeLoginName($query, $login)
	{
        return $query->where('login','=',$login);
    }


    public function scopeEmailName($query, $email)
	{
        return $query->where('email','=',$email);
    }

    public function scopeUserCode($query, $code)
	{
        return $query->where('code','=',$code);
    }


    //查找不同角色的用户
	public function scopeUserRole($query, $flag)
	{
        return $query->where('flag','=',$flag);
    }

    public function scopeUserStatus($query, $status)
	{
        return $query->where('status','=',$status);
    }

    public function scopeUserRegion($query, $region)
	{
        return $query->where('region','=',$region);
    }

 

    //查找是否产生首次消费的用户
    public function scopeIsFirst($query, $first)
	{
        return $query->where('first','=',$first);
    }


    public static function register($input, User $referee, $status = null)
    {
        $user = new User;
      
        $user->login = array_get($input, 'login');
        $user->password = Hash::make(array_get($input, 'password',DEFAULT_PASSWORD));
        $user->password2 = Hash::make(DEFAULT_PASSWORD);
        $user->name = array_get($input, 'name');
        $user->flag = array_get($input, 'flag',FLAG_USER);
        $user->region = array_get($input, 'region');
        $user->status = $status ? STATUS_NORMAL:STATUS_FREEZE;
        $user->first = STATUS_FREEZE;
        $user->balance = 0.00;
        $user->province = array_get($input, 'province');
        $user->city = array_get($input, 'city');
        $user->county = array_get($input, 'county');        
        $user->email = array_get($input, 'email');
        $user->mobile = array_get($input, 'mobile');
        $user->type = array_get($input, 'type', 2);
        $user->idcard = array_get($input, 'idcard');
        $user->address = array_get($input, 'address');
        $user->memo = array_get($input, 'memo');
        $user->date = strtotime(array_get($input, 'date', date('Y-m-d')));
        $user->code = rand(100000,999999);

        if($user->save()){

        	Referee::setRefereeRelation($user, $referee);		
		
			Record::setRecord($user,$user, FLAG_DEBIT,RECORD_D_KH,array_get($input, 'amount',0),RATE_100,false );

        	return $user;
        }
        return false;
    }


    public static function updateUser(User $user, $input)
    {
    	$user->name = array_get($input, 'name');
        $user->email = array_get($input, 'email');
        $user->mobile = array_get($input, 'mobile');
        $user->type = array_get($input, 'type', 2);
        $user->idcard = array_get($input, 'idcard');
        $user->address = array_get($input, 'address');
        $user->memo = array_get($input, 'memo'); 

        if($user->update())
        	return $user;
        return false;
    }

    public static function shopregister($input)
    {
        $user = new User;
      
        $user->login = array_get($input, 'login');
        $user->password = Hash::make(DEFAULT_PASSWORD);
        $user->password2 = Hash::make(DEFAULT_PASSWORD);
        $user->name = array_get($input, 'name');
        $user->flag = FLAG_SP;
        $user->region = array_get($input, 'region');
        $user->status = STATUS_NORMAL;
        $user->first = STATUS_NORMAL;
        $user->balance = 0.00;       
        $user->email = array_get($input, 'email');
        $user->mobile = array_get($input, 'mobile');
        $user->type = 0;
        $user->address = array_get($input, 'address');
        $user->memo = array_get($input, 'memo');
        $user->date = strtotime(array_get($input, 'date', date('Y-m-d')));
        $user->code = rand(100000,999999);

        if($user->save()){

        	//Referee::setRefereeRelation($user, $referee);		
		
			//Record::setRecord($user,$user, FLAG_DEBIT,RECORD_D_KH,array_get($input, 'amount',0),RATE_100,false );

        	return $user;
        }
        return false;
    }


    public static function setTransfer(User $send, User $recv, $amount)
    {    	
		if( Record::setRecord($send,$recv,FLAG_CREDIT,RECORD_C_ZC,$amount,RATE_100,true) ){
			Record::setRecord($recv,$send,FLAG_DEBIT,RECORD_D_ZR,$amount,RATE_100,true);
			return true;
		}
		return false;
    }


    public static function getShopList()
    {
    	$shoplist = array();

		$regions = User::userRole(FLAG_BO)->get();

		foreach( $regions as $region){
			$shops = User::userRole(FLAG_SP)->userRegion($region->id)->get();
			
			if( count($shops) > 0){
				$items = array();
				foreach($shops as $shop){
					$items[$shop->id] = $shop->name.' '.$shop->address.' '.$shop->mobile;
				}
				$shoplist[$region->county] = $items;
			}
		}

		return $shoplist;
    }



    //更新余额
	public static function updateBalance(User $user,$balance, $flag)
	{
		$value = $user->balance;

		$amount = ($flag == FLAG_DEBIT) ? $value+$balance : $value-$balance;
        
        $user->balance = $amount;

        if($user->update())
        	return true;
        return false;
        
	}


	//缓存首次消费状态的用户
	public static function getUserRelationsFrist($first)
	{		
		global $isfirst;
		$isfirst = $first;
		return Cache::remember($isfirst == STATUS_NORMAL ? self::CACHE_FIRST : self::CACHE_NOTFIRST, self::CACHE_MINUTES, function()
        {			
	        $users = User::with('referee')->userRole(FLAG_USER)->isFirst($GLOBALS['isfirst'])->get();
			foreach($users as $user){
	            $user->userReferee = User::find($user->referee->pid);  
	            /*if($user->accepter)
	            	$user->userAccepter = User::find($user->accepter->pid);
	            */
	        }
    	
            return $users;
        });
        
	}


	public static function updateUserRelationsFristCache()
	{
		Cache::forget(self::CACHE_FIRST);
		Cache::forget(self::CACHE_NOTFIRST);        
	}

	//
	public static function getSpecificUser($flag,$status,$region)
	{
		$users = User::with('referee','accepter')
				->userRole($flag)
				->userStatus($status)	
				->userRegion($region)
				->orderBy('id','DESC')
				->get();
        foreach($users as $user){
        	if($user->referee)
            	$user->userReferee = User::find($user->referee->pid);  
            /*if($user->accepter)
            	$user->userAccepter = User::find($user->accepter->pid);
           	*/
        }
        return $users;
	}

	//查找所有用户，且查找推荐人和接点人
	public static function getUserRelations()
	{
		$users = User::with('referee')->userRole(FLAG_USER)->get();
        foreach($users as $user){
            $user->userReferee = User::find($user->referee->pid);  
            /*if($user->accepter)
            	$user->userAccepter = User::find($user->accepter->pid);
           	*/
        }
        return $users;
	}


	//缓存用户列表
	public static function getUserRelationsCache()
	{		
		return Cache::remember(self::CACHE_RELATIONS, self::CACHE_MINUTES, function()
        {
            return User::getUserRelations();
        });
	}

	//更新用户列表缓存
	public static function updateUserRelationsCache()
	{
		Cache::forget(self::CACHE_RELATIONS);
        Cache::put(self::CACHE_RELATIONS, User::getUserRelations(), self::CACHE_MINUTES);
	}



	//缓存分公司
	public static function getUserRegionsCache()
	{
		return Cache::remember(self::CACHE_REGIONS, self::CACHE_MINUTES, function()
        {
			return User::where('flag','=',FLAG_BO)->orderBy('id','ASC')->get();
			
        });
	}


	public static function checkSession(User $user, $session)
	{
		$result = false;
		if( md5($user->password) == $session ){
			$result = true;
		}

		return $result;
	}



	public static function checkPayAmount(User $user, $amount)
	{
		$first = false;
		switch ($user->type)
		{
			case 1://股东
				$first = ( ($amount >= FEE_PARTNER - 10) && ($amount <= FEE_PARTNER + 10) )? true : false;
				break;
			case 2://会员
				$first = ( ($amount >= FEE_STANDARD - 10) && ($amount <= FEE_STANDARD + 10) )? true : false;
			default:				
				break;
		}
		return $first;
	}
}
