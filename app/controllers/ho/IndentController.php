<?php
use Laracasts\Validation\FormValidationException;

class IndentController extends AppController {

    public function getEdit($id = null)
    {        
        $order = Order::find($id);
        if($order->status == ORDER_NORMAL){
            return View::make($this->views, compact('order'));
        }
        else{
            
        }
    }


    public function postCheck()
    {
        $input = Input::all();
        $orderCheckValidator = App::make('ExpressOrderCheckValidator');
        try{
            $orderCheckValidator->validate($input);
        }
        catch (FormValidationException $e){
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

        $order = Order::find(Input::get('id'));
        if($order){
            $order->express = $input['express'];
            $order->ticket = $input['ticket'];
            $order->status = ORDER_PROCESS;            
            if($order->update()){

                $user = User::find($order->uid);   

                $region = User::find($user->region);

                //区域奖
                $record = Record::setRecord($region,$user,FLAG_DEBIT,RECORD_D_QY,$order->amount,RATE_4,false);

                //不是首单，则计算重消
                if( $user->first == STATUS_NORMAL){
                    Record::setParentRefereeExpends($user, $order->amount, RECORD_D_CX,$user);
                }
                else{                    
                    $user->first = STATUS_NORMAL;
                    $user->update();
                }
                
                return Redirect::route('ho.indent.express')->with(Flash::success(Lang('The order checked successful.')));
            }
        }
    }


    public function postCancel()
    {
        $order = Order::find(Input::get('orderid'));
        
        if($order){          
            $user = User::find($order->uid);
            $region = User::find($user->region);
            if($order->status == ORDER_NORMAL){
                //已付款订单需退还
                Record::setRecord($user, Auth::user(), FLAG_DEBIT,RECORD_D_TH,$order->amount,RATE_100,true); 
                //区域奖扣除               
                //Record::setRecord($region, $user(), FLAG_CREDIT,RECORD_C_KC,$order->amount,RATE_4,true); 
            }

            $order->status = ORDER_CANCEL;
            if($order->update()){
                return Redirect::route('ho.indent.express')->with(Flash::warning(Lang('The order has canceled.')));
            }
        }
    }


    public function getExpress()
    {
        $unpayorders = Order::where('invoice','=',INVOICE_EXPRESS)
                            ->whereIn('status',array(ORDER_UNPAY,ORDER_NORMAL))
                            ->orderBy('id','DESC')
                            ->take(50)
                            ->get();
        $processorders = Order::where('invoice','=',INVOICE_EXPRESS)
                            ->whereIn('status',array(ORDER_PROCESS,ORDER_END,ORDER_CANCEL))
                            ->orderBy('id','DESC')
                            ->take(50)
                            ->get();
        return View::make($this->views, compact('unpayorders','processorders'));
    }


    public function getShop()
    {
        $shoporders1 = Order::where('invoice','=',INVOICE_SHOP)  
                            ->whereIn('status',array(ORDER_UNPAY,ORDER_NORMAL))                         
                            ->orderBy('id','DESC')
                            ->take(50)
                            ->get();  
        $shoporders2 = Order::where('invoice','=',INVOICE_SHOP)  
                            ->whereIn('status',array(ORDER_PROCESS,ORDER_END,ORDER_CANCEL))                         
                            ->orderBy('id','DESC')
                            ->take(50)
                            ->get();      
        return View::make($this->views, compact('shoporders1','shoporders2'));
    }

   
    public function getFirst()
    {        
        $users = User::getUserRelationsFrist(STATUS_FREEZE);    
        $fusers = User::getUserRelationsFrist(STATUS_NORMAL);   

        return View::make($this->views, compact('users','fusers'));        
    }


    public function postCheckfirst()
    {
        $user = User::find(Input::get('id'));
        if($user){
            $user->first = STATUS_NORMAL;
            $user->update();
            User::updateUserRelationsFristCache();
            return Redirect::route('ho.indent.first')->with(Flash::success(Lang('The first payment has adjusted.')));
        }
    }



}
