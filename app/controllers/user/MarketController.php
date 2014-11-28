<?php

class MarketController extends AppController {

	public function getReferee()
	{
		/*$referees = Auth::user()->referees;
		foreach($referees as $referee){
			$referee['user'] = User::find($referee['uid']);
		}*/
		$referees = Referee::with('referee')->where('pid','=',Auth::user()->id)->get();
		//dd($referees);
		return View::make($this->views, compact('referees'));
	}



	public function getView()
	{	
		$kha=$khb=$zta=$ztb=$lda=$ldb=$cxa=$cxb=0;
		//个人
		$q = Auth::user()->id;
		$kh = Record::where('uid','=',$q)->where('type','=',RECORD_D_KH)->sum('amount');		
		$zt = Record::where('uid','=',$q)->where('type','=',RECORD_D_ZT)->sum('amount');		
		$ld = Record::where('uid','=',$q)->where('type','=',RECORD_D_LD)->sum('amount');		
		$cx = Record::where('uid','=',$q)->where('type','=',RECORD_D_CX)->sum('amount');
		
		//团队
		/*$qa = $this->getQuarterList(Auth::user()->id,CONST_1);
		$qb = $this->getQuarterList(Auth::user()->id,CONST_2);
				
		if (!empty($qa)){
			$kha = Record::whereIn('uid',$qa)->where('type','=',RECORD_D_KH)->sum('amount');
			$zta = Record::whereIn('uid',$qa)->where('type','=',RECORD_D_ZT)->sum('amount');
			$lda = Record::whereIn('uid',$qa)->where('type','=',RECORD_D_LD)->sum('amount');
			$cxa = Record::whereIn('uid',$qa)->where('type','=',RECORD_D_CX)->sum('amount');
		}
		if (!empty($qb)){
			$khb = Record::whereIn('uid',$qb)->where('type','=',RECORD_D_KH)->sum('amount');		
			$ztb = Record::whereIn('uid',$qb)->where('type','=',RECORD_D_ZT)->sum('amount');		
			$ldb = Record::whereIn('uid',$qb)->where('type','=',RECORD_D_LD)->sum('amount');		
			$cxb = Record::whereIn('uid',$qb)->where('type','=',RECORD_D_CX)->sum('amount');
		}
		return View::make($this->views, compact('kh','zt','ld','cx','kha','khb','zta','ztb','lda','ldb','cxa','cxb'));*/
		return View::make($this->views, compact('kh','zt','ld','cx'));
	}




	/**
	 * 按A、B区查找子节点
	 * @param  [type] $uid     [description]
	 * @param  [type] $quarter [description]
	 * @param  array  $result  [description]
	 * @return [type]          [description]
	 */
	protected function getQuarterList($uid,$quarter,&$result = array())
	{
		$user = Accepter::where('pid','=',$uid)->where('quarter','=',$quarter)->first();

		if( $user){			
			$result[] = $user->uid;			
			return $this->getQuarterList($user->uid, $quarter, $result);
		}

		return $result;
	}


}