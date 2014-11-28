<?php

use Laracasts\Validation\FormValidationException;

class BusinessController extends AppController {

	
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
            return Redirect::route('ho.business.transfer')->with(Flash::success(Lang('Account transfer success.')));

        return Redirect::back()->withInput()->with(Flash::error(Lang('SYSTEM ERROR:Transfer failed.')));

    }


    public function getStatement()
    {       
        $records = Record::where('uid','=',Auth::user()->id)->orderBy('id','DESC')->get();
        return View::make($this->views, compact('records'));
    }


    public function getSettle()
    {       
        $records = Record::with('user')->where('uid','<>',Auth::user()->id)->where('status','=',STATUS_FREEZE)->orderBy('id','DESC')->get();
        
        return View::make($this->views, compact('records'));
    }


    public function getReserve()
    {
        $user = Auth::user();
        return View::make($this->views, compact('user'));
    }


    public function postReserve()
    {
        $input = Input::all();

        $reserveValidator = App::make('ReserveValidator');
        try{
            $reserveValidator->validate($input);
        }
        catch (FormValidationException $e){
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

        $user = Auth::user();

        if ( !Hash::check($input['password2'], $user->password2) ){
            return Redirect::back()->with(Flash::error(Lang('Incorrect cipher code.')));
        }

        Record::setRecord($user,$user,FLAG_DEBIT,RECORD_D_CZ, $input['amount'], RATE_100, true); 

        return Redirect::back()->with(Flash::success(Lang('Funds append successful.')));
            
      
       
       
        
    }
}
