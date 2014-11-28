<?php

class BatchController extends AppController {

    public function getDaily()
    {        
        $isSettle = false;
        $date = Configure::where('key','=','sysdate')->first()->value;
        $sysdate = date('Y-m-d',$date); 
        $upper = $date + 86400 ;
        $current = strtotime(Date('Y-m-d'));

        if($current >= $upper)
            $isSettle = true; 

        $records = Record::with('user')
                        ->whereBetween('date',array($date,$upper))
                        ->where('status','=',STATUS_FREEZE)
                        ->orderBy('date','ASC')
                        ->orderBy('id','ASC')
                        ->get();  

        return View::make($this->views, compact('records','sysdate','isSettle'));

    }

    public function postDaily()
    {
        $sysdate = Configure::where('key','=','sysdate')->first();
        $date = $sysdate->value;
        $upper = $date + 86400 ;
        $current = strtotime(Date('Y-m-d'));

        if($current < $upper)
            return Redirect::back()->withInput()->with(Flash::warning(Lang('Undue date.'))); 

        //容错检测，如有帐务日期之前的流水未处理，直接退出
        $beforeRecords = Record::where('date','<',$date)->where('status','=',STATUS_FREEZE)->get();
        //dd($beforeRecords);
        if( count($beforeRecords)>0 ){ 
            return Redirect::back()->withInput()->with(Flash::error(Lang('Early records NOT process,settlement failed.')));  
        }

        //取符合帐务日期的流水
        $records = Record::with('user')
                        ->whereBetween('date',array($date,$upper))
                        ->where('uid','<>',Auth::user()->id)
                        ->where('status','=',STATUS_FREEZE)
                        ->orderBy('id','ASC')
                        ->get();
        //批处理入账
        foreach( $records as $record){            
            Record::settleRecord($record->user,$record);
        }
        
        //区域代理计算奖金
        //$this->calculateQuarter($date);

        $sysdate->value = $date + 86400;
        if ($sysdate->save()){
            return Redirect::route('ho.daily')->with(Flash::success(Lang('Settlement process successful.')));
        }
       
    }




    protected function calculateQuarter($date)
    {
        /*$records = DB::table('hms_record')
                    ->leftJoin('hms_user', 'hms_record.uid', '=', 'hms_user.id')
                    ->whereIn('hms_user.region',function($query)
                        {
                            $query->select(DB::raw('hms_user.id'))
                                  ->from('hms_user')
                                  ->where('hms_user.flag', '=', 2);
                        })
                    ->where('hms_record.type','=',0)
                    ->groupBy('hms_user.region');
        */
        
        $upper = $date + 86400 ;

        $regions = User::where('flag','=',2)->lists('id');
        
        foreach($regions as $region){
            $amount = Record::leftjoin('hms_user', 'hms_user.id', '=', 'hms_record.uid')  
                    ->where('hms_user.region','=',$region) 
                    ->where('hms_record.type','=',RECORD_D_KH)
                    ->whereBetween('hms_record.date',array($date,$upper))
                    ->sum('hms_record.amount');
            if ($amount > 0) {                
                $this->setRecord($region,$region,FLAG_DEBIT,RECORD_D_QY,$amount,RATE_4,true);
            }
        }
        
    }

    public function getTruncate()
    {
        //DB::table('hms_record')->truncate();
        DB::table('hms_order')->truncate();
        DB::table('hms_orderitem')->truncate();
    }


    public function getInitMenus()
    {  
        
        //DB::table('hms_menut')->truncate();
        DB::statement('CREATE TEMPORARY TABLE hms_tmp_table SELECT * FROM hms_menus');
        DB::table('menus')->truncate();
        
        $flags = $this->flags();
        
        
        foreach($flags as $flag){
            $tops = $this->TParent($flag);
            foreach($tops as $top){
                
                    $id = DB::table('menus')->insertGetId(
                        array('flag' => $top->flag, 'name' => $top->name,'parent'=>$top->parent,'prefix'=>$top->prefix,'controller'=>$top->controller,'action'=>$top->action,'icon'=>$top->icon,'order'=>$top->order)
                    );

                    $childs = $this->TChild($top->flag,$top->id);
                    foreach($childs as $child){
                    DB::table('menus')->insert(
                        array('flag' => $top->flag, 'name' => $child->name,'parent'=>$id,'prefix'=>$child->prefix,'controller'=>$child->controller,'action'=>$child->action,'icon'=>$child->icon,'order'=>$child->order)
                    );
                }
                
            }
        }
  
        

    }

    private function flags()
    {
        return DB::table('tmp_table')->distinct()->orderBy('flag','asc')->lists('flag');
    }

    private function TParent($flag)
    {
        return DB::table('tmp_table')->where('flag','=',$flag)->where('parent','=',0)->orderBy('parent','ASC')->orderBy('order','ASC')->get();
    }

    private function TChild($flag,$parent)
    {
        return DB::table('tmp_table')->where('flag','=',$flag)->where('parent','=',$parent)->orderBy('parent','ASC')->orderBy('order','ASC')->get();
    }

}
