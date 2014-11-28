<?php

class Accepter extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $guarded = array();

	public $timestamps = false;

	//protected $table = 'hms_accepter';
	
	public function puser()
	{
		return $this->hasOne('User','id','pid');
	}


	public function scopeAccepterQuarter($query, $accepter,$quarter)
	{
		return $query->where('pid','=',$accepter)->where('quarter','=',$quarter);        
    }


    public static function findAccepterParent($uid)
	{
		$parent =  Accepter::where('uid','=',$uid)->first();	
		
		if ($parent){ 
			return User::userRole(FLAG_USER)->where('id','=',$parent->pid)->first();
		}
		
	}

    public static function setAccepterRelation($uid,$pid,$quarter)
	{		
		$relation = new Accepter;		

		$relation->uid = $uid;
		$relation->pid = $pid;	
		$relation->quarter = $quarter;
		
		return $relation->save();
			
	}
}