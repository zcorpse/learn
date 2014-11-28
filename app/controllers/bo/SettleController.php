<?php

class SettleController extends AppController {

	public function getSearch()
	{	 	
		$date = Input::get('date');
		$qtr = Input::get('qtr');
		
		$date = empty($date)?strtotime(date('Y-m-d')) : strtotime($date);		
		
		$upper = $date + 86400;
		
		//$records = Record::whereBetween('date',array($date,$upper))->orderBy('date','ASC')->orderBy('id','ASC')->get();	
		$records = Record::join('users', 'users.id', '=', 'records.uid')
            		->where('users.region', '=', Auth::user()->id)
            		->where('users.flag', '=', FLAG_USER)
            		->whereBetween('records.date',array($date,$upper))
            		->orderBy('records.date','DESC')
            		->orderBy('records.id','DESC')
            		->select('records.*')
            		->get();	
		
		return View::make($this->views, compact('records'));
	}


	public function getRegionSearch()
	{	 	
		$date = Input::get('date');
		
		$date = empty($date)?strtotime(date('Y-m-d')) : strtotime($date);		
		
		$upper = $date + 86400;
		
		$records = Record::where('uid','=',Auth::user()->id)
					->whereBetween('date',array($date,$upper))
					->orderBy('id','DESC')
					->get();
		
		return View::make($this->views, compact('records'));
	}


	public function getShop()
	{	 	
		$date = Input::get('date');
		$qtr = Input::get('qtr');
		
		$date = empty($date)?strtotime(date('Y-m-d')) : strtotime($date);		
		
		$upper = $date + 86400;
		
		//$records = Record::whereBetween('date',array($date,$upper))->orderBy('date','ASC')->orderBy('id','ASC')->get();	
		$records = Record::join('users', 'users.id', '=', 'records.uid')
            		->where('users.region', '=', Auth::user()->id)
            		->where('users.flag', '=', FLAG_SP)
            		//->whereBetween('record.date',array($date,$upper))
            		->orderBy('records.date','DESC')
            		->orderBy('records.id','DESC')
            		->select('records.*')
            		->get();	
		
		return View::make($this->views, compact('records'));
	}


	
}