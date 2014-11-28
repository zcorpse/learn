<?php

class Referee extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $guarded = array();

	public $timestamps = false;

	//protected $table = 'hms_referee';

	public function puser()
	{
		return $this->hasOne('User','id','pid');
	}

	public function referee()
    {
        return $this->belongsTo('User', 'uid', 'id');
    }


    public static function findRefereeParent(User $user)
	{
		$parent =  Referee::where('uid','=',$user->id)->first();	
		
		if ($parent){ 
			return User::userRole(FLAG_USER)->where('id','=',$parent->pid)->first();
		}
		
	}

    public static function setRefereeRelation(User $user, User $referee)
	{		
		$relation = new Referee;		

		$relation->uid = $user->id;
		$relation->pid = $referee->id;	
		$relation->quarter = 1;
		
		return $relation->save();			
	}

	public static function deleteRefereeRelation(User $user)
	{
		$referee = Referee::where('uid','=',$user->id)->first();
		if($referee){
			$referee->delete();
			return true;
		}
		return false;
	}
	
}