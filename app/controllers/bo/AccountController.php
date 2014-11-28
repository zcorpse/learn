<?php

use Laracasts\Validation\FormValidationException;

class AccountController extends AppController {

	public function getRegister()
	{
		$region = Auth::user();		
		return View::make($this->views, compact('region'));
	}

	public function postRegister()
	{	
		$input = Input::all();

		$registerValidator = App::make('UserRegisterValidator');
		try{
	        $registerValidator->validate($input);
	    }
	    catch (FormValidationException $e){
	        return Redirect::back()->withInput()->withErrors($e->getErrors());
	    }
        
		//检测用户名    	
    	if ( User::loginName($input['login'])->first() ){    		
			return Redirect::back()->withInput()->with(Flash::error(Lang('Duplicate user.')));
		} 
		
		//检测推荐人
		$referee = User::loginName($input['referee'])->first();
		if ( !$referee ){ 			
			return Redirect::back()->withInput()->with(Flash::error(Lang('The referee account is not correct.')));
		} 
		
		/*
		//检测接点人
		$accepter = User::loginName($input['accepter'])->first();
		if ( !$accepter ){ 			
			return Redirect::back()->withInput()->with(Flash::error(Lang('The accepter account is not correct.')));
		}
		
		//接点人A区或B区必须为空		
		if( Accepter::accepterQuarter($accepter->id,$input['accepterquarter'])->first() ){			
			return Redirect::back()->withInput()->with(Flash::error(Lang('Quarter A or B is NOT empty.')));
		}
		*/

		$input['region'] = Auth::user()->id;
		$user = User::register($input, $referee, STATUS_FREEZE);
				
		if( $user ){

			return Redirect::route('bo.account.register')->with(Flash::warning(Lang('User registered, activate it.')));
			
		}
		
       
        
	}


	public function getActive()
	{
		$users = User::getSpecificUser(FLAG_USER, STATUS_FREEZE, Auth::user()->id);
			
		return View::make($this->views, compact('users'));
	}


	public function postActive()
	{
		$user = User::userRole(FLAG_USER)
					->userStatus(STATUS_FREEZE)
					->userRegion(Auth::user()->id)
					->where('id','=',Input::get('uid'))
					->first();
		if ($user){

			$record = Record::userRecord($user->id,RECORD_D_KH,STATUS_FREEZE)->first();
			
			if ($record){
				
				if( Auth::user()->balance < $record->amount){
					return Redirect::back()->withInput()->with(Flash::error(Lang('Insufficient account balance,can NOT actived.')));    	
				}
				
				User::setTransfer(Auth::user(), $user, $record->amount);

				Record::setRecord(Auth::user(),$user,FLAG_DEBIT,RECORD_D_QY,$record->amount,RATE_4,false);

				Record::setRefereeBouns($user,$record);

				$parent =  Referee::findRefereeParent($user);
				if( $parent)
					Record::setParentRefereeBouns($parent,$record,$user);				

				$record->status = STATUS_NORMAL;
				$record->update();	

				$user->status = STATUS_NORMAL;
				$user->update();

				return Redirect::route('bo.account.active')->with(Flash::success(Lang('User actived successful.')));		
				
			}
						
		}

	}


	public function getCharge()
	{
		$user = Auth::user();		
		$records = Record::where('uid','=',Auth::user()->id)
						->whereIn('type',array(6,7))
						->orderBy('id','DESC')
						->get();
						
		return View::make($this->views, compact('user','records'));
	}




	public function postCharge()
	{
		$input = Input::all();
		
		$transferValidator = App::make('TransferValidator');
		try{
	        $transferValidator->validate($input);
	    }
	    catch (FormValidationException $e){
	        return Redirect::back()->withInput()->withErrors($e->getErrors());
	    }

	    if ( !Hash::check($input['password2'], Auth::user()->password2) ){
	    	return Redirect::back()->with(Flash::error(Lang('Incorrect cipher code.')));
	    }
        
		if( Auth::user()->balance < $input['amount']){
			return Redirect::back()->withInput()->with(Flash::error(Lang('Insufficient account balance.')));	    	
		}	
							
		$recv = User::loginName($input['login'])->userStatus(STATUS_NORMAL)->where('name','=',$input['name'])->first();
		if( !$recv ){
			return Redirect::back()->withInput()->with(Flash::error(Lang('Incorrect receive user.')));	    	
		}
				
		if(User::setTransfer(Auth::user(), $recv, $input['amount']))			
			return Redirect::route('bo.account.charge')->with(Flash::success(Lang('Account transfer success.')));

		return Redirect::back()->withInput()->with(Flash::error(Lang('SYSTEM ERROR:Transfer failed.')));
	}

	


	public function getSearch()
	{		
		$users = User::getSpecificUser(FLAG_USER, STATUS_NORMAL, Auth::user()->id);

		return View::make($this->views)->with('users', $users);
	}


	public function getModify($uid = NULL)
	{
		$user = User::find($uid);
		$user->userReferee = User::find($user->referee->pid); 
		$region = Auth::user();

		return View::make($this->views,compact('user','region'));
	}




	public function postModify($uid = NULL)
	{
		$input = Input::all();

        $modifyValidator = App::make('RefereeModifyValidator');
        try{
            $modifyValidator->validate($input);
        }
        catch (FormValidationException $e){
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }		
		
		$user = User::find($uid);

		//检测是否有重消
		$orders = $user->orders;
		if($orders->count() > 0){ 			
			return Redirect::back()->withInput()->with(Flash::error(Lang('User has orders.')));
		}
		//检测推荐人
		$referee = User::loginName($input['referee'])->first();
		if ( !$referee ){ 			
			return Redirect::back()->withInput()->with(Flash::error(Lang('The referee account is not correct.')));
		}

		User::updateUser($user, $input);		
		Referee::deleteRefereeRelation($user);	
		Referee::setRefereeRelation($user, $referee);
		
		return Redirect::back()->with(Flash::success(Lang('User and referee relation has changed.')));
	}

}