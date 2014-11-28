<?php

use Laracasts\Validation\FormValidationException;

class SetupController extends AppController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	public function getProfile()
	{
		$user = Auth::user();
        $user->userReferee = User::find($user->referee->pid);

        /*if($user->accepter)
            $user->userAccepter = User::find($user->accepter->pid);
        */
        
		$region = User::find($user->region);
		return View::make($this->views, compact('user','region'));
	}

	public function postProfile()
	{
		$input = Input::all();
    	$user = Auth::user();

        $profileValidator = App::make('ProfileValidator');
        try{
            $profileValidator->validate($input);
        }
        catch (FormValidationException $e){
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

    	$user->mobile      = array_get($input, 'mobile');
    	$user->email       = array_get($input, 'email');
    	$user->idcard      = array_get($input, 'idcard');
        $user->postcode    = array_get($input, 'postcode');
    	$user->address     = array_get($input, 'address');
    	$user->memo        = array_get($input, 'memo');

    	if($user->update()){
    		return Redirect::back()->with(Flash::success(Lang('Profile changed.')));
    	}
       
	}




	public function getPassword()
	{				
		return View::make($this->views);
	}

	public function postPassword()
	{		
        $user = Auth::user();
		$input = Input::all();
        
		$passwordValidator = App::make('PasswordValidator');
        try{
            $passwordValidator->validate($input);
        }
        catch (FormValidationException $e){
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

        if ( !Hash::check($input['oldpassword'], $user->password) ){
            return Redirect::back()->with(Flash::error(Lang('Incorrect old password.')));
        }
        
        $user->password = Hash::make($input['password']);
        if($user->update())
            return Redirect::back()->with(Flash::success(Lang('Password changed.')));
	}




	public function getPassword2()
	{				

		return View::make($this->views);
	}

	public function postPassword2()
	{		
		$user = Auth::user();
        $input = Input::all();
        
        $passwordValidator = App::make('PasswordValidator');
        try{
            $passwordValidator->validate($input);
        }
        catch (FormValidationException $e){
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

        if ( !Hash::check($input['oldpassword'], $user->password2) ){
            return Redirect::back()->with(Flash::error(Lang('Incorrect old password2.')));
        }
        
        $user->password2 = Hash::make($input['password']);
        if($user->update())
            return Redirect::back()->with(Flash::success(Lang('Password2 changed.')));
		
	}
	


}
