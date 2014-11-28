<?php

use Laracasts\Validation\FormValidationException;

class BranchController extends AppController {

	public function getNew()
	{	 	
		return View::make($this->views);
	}



	public function postNew()
	{	
		$input = Input::all();

		$branchValidator = App::make('BranchRegisterValidator');
        try{
            $branchValidator->validate($input);
        }
        catch (FormValidationException $e){
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
        
        if ( User::loginName($input['login'])->first() ){           
            return Redirect::back()->withInput()->with(Flash::error(Lang('Duplicate user.')));
        } 
            
        $user = User::register($input, STATUS_NORMAL);
            
        if( $user ){
            return Redirect::route('ho.branch.list')->with(Flash::success(Lang('Branch register success.')));           
        }
        
        return Redirect::back()->withInput()->with(Flash::error(Lang('SYSTEM ERROR:Branch register failed.')));     
		
	}





	public function getList()
	{	 	
		$users = User::userRole(FLAG_BO)->orderBy('id','DESC')->get();

		return View::make($this->views, compact('users'));
	}




	public function getExtra()
    {        
        $date = Input::get('date');        
        $date = empty($date)?strtotime(date('Y-m-d')) : strtotime($date);        
        $upper = $date + 86400;

        $branchs = User::where('flag','=',FLAG_BO)->orderBy('id','ASC')->get();

        foreach($branchs as $branch){
            
            $branch['yj'] = $branch['tc'] = 0;
            $branch['yj'] = Record::where('uid','=',$branch->id)->where('type','=',RECORD_D_TC)->whereBetween('date',array($date,$upper))->sum('cost');
            $branch['tc'] = Record::where('uid','=',$branch->id)->where('type','=',RECORD_D_TC)->whereBetween('date',array($date,$upper))->sum('amount');
        }

        return View::make($this->views, compact('branchs'));

    }

}