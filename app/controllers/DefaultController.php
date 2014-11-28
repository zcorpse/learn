<?php

use Laracasts\Validation\FormValidationException;

class DefaultController extends AppController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    

	public function index()
	{  
		return View::make('default.index');
	}

	public function portal()
    {
        $user = Auth::user();
		return View::make($this->views, compact('user'));
	}

   
    public function postLogin()
    {
        $input = Input::all();

        $loginValidator = App::make('LoginValidator');
        try{
            $loginValidator->validate($input);
        }
        catch (FormValidationException $e){
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }  

        if (Auth::attempt(array('login'=> $input['login'],'password' => $input['password'], 'status' => 1 ))){ 
            return Redirect::route('default.portal');
        }
        else{
            return Redirect::back()->withInput()->with(Flash::error(Lang('Username or password incorrect, or Unauthorized.')));
        } 
        
    }



	public function logout()
	{		
        Cache::forget('menu_nodes');
		Auth::logout();
		return Redirect::route('default.index');
	}


    public function getRegister()
    { 
        //$regions[] = lang('Please select region.');
        $items = User::userRole(FLAG_BO)->orderBy('id','ASC')->select('id','city','county')->get();
        foreach($items as $item){
            $regions[$item->id] = $item->city.$item->county;
        }

        $sql = 'SELECT `code` FROM hms_users WHERE `flag` = 0 AND `type`=1 ORDER BY RAND() LIMIT 1';
        
        
        /*$sql = 'SELECT `code` FROM `hms_users` AS t1 
                    JOIN (SELECT ROUND(RAND() * ((SELECT MAX(id) FROM `hms_users`)-(SELECT MIN(id) FROM `hms_users`))+(SELECT MIN(id) FROM `hms_users`)) AS id) AS t2 
                    WHERE t1.id >= t2.id 
                    AND t1.flag = 0
                    AND t1.type = 1
                    ORDER BY t1.id LIMIT 1';*/
        //dd($sql);
        $user = DB::select($sql);
        
        return View::make($this->views, compact('regions','user'));
    }


    public function postRegister()
    { 
        global $email;
        $input = Input::all();
        $input['login'] = $input['email'];
        $email = $input['email'];
        $registerValidator = App::make('RegisterValidator');
        try{
            $registerValidator->validate($input);
        }
        catch (FormValidationException $e){
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        } 

        //检测用户名
        if ( User::loginName($input['email'])->first() ){           
            return Redirect::back()->withInput()->with(Flash::error(Lang('Duplicate email.')));
        }
             
        if ( User::emailName($input['email'])->first() ){           
            return Redirect::back()->withInput()->with(Flash::error(Lang('Duplicate email.')));
        }

        $referee = User::userCode($input['code'])->first();       
        if ( !$referee ){
            return Redirect::back()->withInput()->with(Flash::error(Lang('Invitation code wrong.')));
        }
        
        $user = User::register($input, $referee, STATUS_FREEZE);
        if($user){
           
            $data = array('code'=>$user->code,'session'=>md5($user->password));
            
            Mail::send('emails.active', $data, function ($message)  {
                $message->to($GLOBALS['email']);
                $message->subject(lang('User activate email.'));
            });

            return Redirect::route('default.register')->with(Flash::warning(Lang('User registered, activate email.')));
        }
    }


    public function getActive()
    {        
        $input = Input::only('uid','session');
        $code = array_get($input,'uid');
        $session = array_get($input, 'session');

        $user = User::where('code','=',$code)->first();

        if(!$user){
            return View::make($this->views)->with(Flash::error(Lang('Incorrect user.')));
        }

        $result = User::checkSession($user, $session);
        if(!$result){
            return View::make($this->views)->with(Flash::error(Lang('Incorrect user cipher code.')));
        }

        return View::make($this->views)->with('user',$user);
    }


    public function postActived()
    {        
        $user = User::find(Input::only('id'))->first(); 
        $record = Record::userRecord($user->id,RECORD_D_KH,STATUS_FREEZE)->first();
        if( $user && $record){
            $user->status = STATUS_NORMAL;            
            $user->update();
            $record->status = STATUS_NORMAL;
            $record->update();
            return View::make('default.actived')->with(Flash::success(Lang('User actived successful.')));
        }
    }

    public function postInvate()
    {
        $sql = 'SELECT `code` FROM hms_users WHERE `flag` = 0 AND `type`=1 ORDER BY RAND() LIMIT 1'; 
        $user = DB::select($sql);        
        return json_encode($user[0]);
    }


    public function getSendemail()
    {
        return View::make($this->views);
    }



    public function postSendemail()
    {
        global $email;
        $input = Input::all();        
        $email = $input['email'];

        $sendemailValidator = App::make('SendemailValidator');
        try{
            $sendemailValidator->validate($input);
        }
        catch (FormValidationException $e){
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        } 

        $user = User::emailName($input['email'])->first();
        if ( !$user ){           
            return Redirect::back()->withInput()->with(Flash::error(Lang('Unregistered email.')));
        }

        if ( $user->status == STATUS_NORMAL ){           
            return Redirect::back()->withInput()->with(Flash::error(Lang('User already actived.')));
        }
        
        $data = array('code'=>$user->code,'session'=>md5($user->password));
        Mail::send('emails.active', $data, function ($message)  {
            $message->to($GLOBALS['email']);
            $message->subject(lang('User activate email.'));
        });

        return Redirect::back()->with(Flash::success(Lang('Actived email sended successful.')));
    }
	
}
