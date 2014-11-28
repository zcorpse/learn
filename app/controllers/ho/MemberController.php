<?php

class MemberController extends AppController {

	private $parentReferee = array();
    private $parentBoun    = array();

    public function getQuery()
    {   
        return View::make($this->views);
    }


    public function postQuery()
    {        
        $user = User::loginName(Input::get('login'))->userRole(FLAG_USER)->first();
        
        if(!$user)
            return Redirect::back()->with(Flash::error(Lang('Query failed.')));
        else{

            $user->userReferee = User::find($user->referee->pid);  
            /*if($user->accepter)
                $user->userAccepter = User::find($user->accepter->pid); 
            */

            $this->getParentReferee($user->userReferee);
            $this->getParentBoun($user);

            $referees   = $this->parentReferee;
            $bouns      = $this->parentBoun;
        }

        //return Redirect::route('ho.member.queryresult',array('id'=>$user->id));
        return View::make($this->views,compact('user','referees','bouns'));
    }
    
    private function getParentReferee(User $user)
    {
        static $count = 1;
        
        $parent = Referee::findRefereeParent($user);
        
        if( $parent && ($count++ <=3) && ($parent->flag == FLAG_USER) ){    
            $this->parentReferee[] = $parent;                  
            return $this->getParentReferee($parent);         
        }
    }


    private function getParentBoun(User $user)
    {
        static $count = 1;
        
        $parent = Referee::findRefereeParent($user);
        
        if( $parent && ($count++ <=3) && ($parent->flag == FLAG_USER) ){    
            $this->parentBoun[] = $parent;                  
            return $this->getParentBoun($parent);         
        }
    }



    public function getAdjust()
    {     
        $setkey = 1;

        $regions = User::getUserRegionsCache();
        foreach($regions as $region){
            $regionlist[$region->id] = $region->name;
        }

        $users = User::getUserRelationsCache();

        return View::make($this->views, compact('users','regions','regionlist','setkey'));
    }


    public function postAdjust()
    {
        $input = Input::all();
        $user = User::find($input['uid']);
        if($user){
            $user->region = $input['region'];
            if($user->save()){
                User::updateUserRelationsCache();
                return Redirect::route('ho.member.adjust');
            }
        }

    }

   

}
