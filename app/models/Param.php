<?php

class Param extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	//protected $table = 'hms_param';

	protected $guarded = array();

	public $timestamps = false;

	public function scopeProductType($query, $type)
	{
        return $query->where('type','=',$type);
    }
}