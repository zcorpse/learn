<?php

class Configure extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'configures';

	protected $guarded = array();

	public $timestamps = false;
	
}