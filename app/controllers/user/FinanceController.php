<?php
use Laracasts\Validation\FormValidationException;

class FinanceController extends AppController {

	public function getDetail()
	{	 	
		$records = Record::where('uid','=',Auth::user()->id)->orderBy('id','DESC')->get();
		return View::make($this->views, compact('records'));
	}




	public function getBalance()
	{	 	
		//$lastBalance = $this->getLastBalance(Auth::user()->id);
		$balance = Auth::user()->balance;
		$records = Record::where('uid','=',Auth::user()->id)->where('status','=',STATUS_FREEZE)->sum('amount');
		return View::make($this->views, compact('records','balance'));
	}
	



	public function getTransfer()
	{
		$user = Auth::user();		
		$records = Record::where('uid','=',Auth::user()->id)
						->whereIn('type',array(6,7))
						->orderBy('id','DESC')
						->get();
						
		return View::make($this->views, compact('user','records'));
	}




	public function postTransfer()
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
			return Redirect::route('user.finance.transfer')->with(Flash::success(Lang('Account transfer success.')));

		return Redirect::back()->withInput()->with(Flash::error(Lang('SYSTEM ERROR:Transfer failed.')));


	}

	
}