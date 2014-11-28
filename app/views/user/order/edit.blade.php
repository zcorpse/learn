@extends('layout.default')

@section('layout.content')

	 <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              产品订购
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                订单详情
              </small>
            </h1>
          </div><!-- /.page-header -->

          <div class="row">

            <div class="col-xs-12">
              <!-- PAGE CONTENT BEGINS -->
              @include('flash::message')

              <!-- PAGE CONTENT BEGINS -->               
               <form class="form-horizontal" method="post" action="" id="formOrder" autocomplete="off">                
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="id" value="{{$order->id}}" />
                  <!-- #section:elements.form -->
                  <h5 class="header smaller lighter blue">订单信息</h5>
                  
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 订单编号： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left"><strong>{{$order->serial}}</strong></label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 订单日期： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left"><strong>{{date('Y-m-d',$order->date)}}</strong></label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 订单金额： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left">
                        <span class="green"><strong>{{ number_format($order->amount,1) }}</strong><span>
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 订单状态： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left">
                        <strong>
                          @if (($order->status) == 0)
                              <span class="red">未付款</span>
                            @elseif (($order->status) == 1)
                              <span class="green">已付款</span>
                            @elseif (($order->status) == 2)
                              已审核
                            @elseif (($order->status) == 3)
                              交易完毕
                            @elseif (($order->status) == 4)
                              交易取消
                            @endif
                        </strong>
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> *发货方式： </label>
                    <div class="col-sm-4">                                          
                      <div class="radio">
                        <label>
                          <input name="invoice" value="1" type="radio" id="express" class="ace" {{ $order->invoice == 1 ? 'checked':'' }}/> 
                          <span class="lbl">快递公司发货</span>
                        </label>
                        <label>
                          <input name="invoice" value="2" type="radio" id="shop" class="ace" {{ count($shoplist) > 0?'':'disabled'}} {{ $order->invoice == 2 ? 'checked':'' }}/> 
                          <span class="lbl">家庭超市自提</span>
                        </label>
                      </div> 
                    
                    </div>
                  </div>                  

                  @if (count($shoplist) > 0)
                  <div class="form-group {{ $order->invoice == 1 ? 'hide':'' }}" id="shoplist" >
                    <label class="col-sm-4 control-label no-padding-right" id="shopregion"> 选择家庭超市： </label>
                    <div class="col-sm-6">
                        {{ Form::select('shopid',  $shoplist,$order->invoice == 2?$order->shopid:'', array('class' => 'form-control')) }} 
                    </div>
                  </div>
                  @endif


                  @if ( $having == false)
                  <div class="form-group" >
                    <label class="col-sm-4 control-label no-padding-right" id="shopregion"> 提示： </label>
                    <div class="col-sm-6">
                      <label class="no-padding-left">
                        <span class="label-yellow"><strong>
                          此次订单为【首次消费】订单，股东订单金额需达到14,000；会员订单金额需达到600；上下浮动10！
                        </strong></span>
                      </label>
                        
                    </div>
                  </div>
                  @endif

                  <h5 class="header smaller lighter blue">收货信息</h5>


                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="name"> *收货人： </label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="name" name="name" value="{{$order->name}}" placeholder="收货人"/>
                    </div>                    

                    <div class="col-sm-4">                      
                      {{ $errors->first('name', '<label class="help-block red">:message</label>') }}
                    </div>                   
                  </div>


                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="mobile"> *联系电话： </label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="mobile" name="mobile" value="{{$order->mobile}}" placeholder="联系电话"/>
                    </div>                    

                    <div class="col-sm-4">                      
                      {{ $errors->first('mobile', '<label class="help-block red">:message</label>') }}
                    </div>                   
                  </div>
                  
                  
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="postcode"> *邮编： </label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="postcode" name="postcode" value="{{$order->postcode}}" placeholder="邮编"/>
                    </div>                    

                    <div class="col-sm-4">                      
                      {{ $errors->first('postcode', '<label class="help-block red">:message</label>') }}
                    </div>                   
                  </div>

                 
                 <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="address"> *收货地址： </label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="address" name="address" value="{{$order->address}}" placeholder="收货地址"/>
                    </div>                    

                    <div class="col-sm-2">                      
                      {{ $errors->first('address', '<label class="help-block red">:message</label>') }}
                    </div>                   
                  </div>
                  

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 备注： </label>
                    <div class="col-sm-4">                      
                      <textarea class="form-control" rows="4" id="memo" name="memo" placeholder="备注信息">{{$order->memo}}</textarea>
                    </div>
                  </div>

                 
                 
                  <h5 class="header smaller lighter blue">产品信息</h5>

                  <table id="sample-table-2" class="table table-hover">
                      <thead>
                        <tr>                                                  
                          <th class="hidden-480">编号</th>
                          <th>名称</th>
                          <th class="hidden-480">系列</th>     
                          <th class="hidden-480">分类</th> 
                          <th class="hidden-480">规格</th>
                          <th>优惠价</th>                          
                          <th>数量</th>
                          <th>合计</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach ($order->items as $item)
                        <tr>
                          <td class="hidden-480">{{ $item->code }}</td>
                          <td>{{ $item->name }}</td>
                          <td class="hidden-480">{{ $item->category }}</td>
                          <td class="hidden-480">{{ $item->type }}</td>
                          <td class="hidden-480">{{ $item->specs }}</td>
                          <td>{{ number_format($item->price2,1) }}</td>                          
                          <td>{{ $item->number }}</td>
                          <td>{{ number_format($item->total,1) }}</td>
                        </tr>  
                        @endforeach                                        
                      </tbody>

                      <tbody>
                        <tr>
                          <td class="hidden-480"></td>
                          <td></td>
                          <td class="hidden-480"></td>
                          <td class="hidden-480"></td>
                          <td class="hidden-480"></td>
                          <td></td>                          
                          <td class="text-right">总计：</td>
                          <td><span class="green"><strong>{{ number_format($order->amount,1) }}</strong><span></td>
                        </tr>
                      </tbody> 

                    </table>



                  <div class="space-12"></div>

                  @if (($order->status) == 0)
                  <div class="clearfix form-group">
                    <div class="col-md-offset-4 col-md-9">
                      @if ( !$having && $checking)
                      <button class="btn btn-info" id="orderPay" type="button">
                        <i class="ace-icon fa fa-check"></i>
                        支付订单
                      </button>
                      @elseif ( !$having && !$checking)
                      <button class="btn btn-warning" id="orderCart" type="button">
                        <i class="ace-icon fa fa-undo"></i>
                        继续订购
                      </button>
                      @elseif ($having)
                        <button class="btn btn-info" id="orderPay" type="button">
                        <i class="ace-icon fa fa-check"></i>
                        支付订单
                      </button>
                      @endif
                      
                      <button class="btn btn-danger" id="orderCancel" type="button">
                        <i class="ace-icon fa fa-remove"></i>
                        取消订单
                      </button>
                    </div>
                  </div>
                  @endif

              </form>           

            
              <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.page-content -->
      </div><!-- /.main-content -->

@stop

@section('javascript')

  <script type="text/javascript">
      jQuery(function($) {     

        $( "#shop" ).on('click', function(e) {            
          $( "#shoplist" ).removeClass('hide');
        });

        $( "#express" ).on('click', function(e) {           
          $( "#shoplist" ).addClass('hide');
        });

        $("#orderCancel").click(function(){ 
              $("#formOrder").attr("action","{{route('user.order.cancel')}}");
              $("#formOrder").submit();      
        });

        $("#orderPay").click(function(){ 
              $("#formOrder").attr("action","{{route('user.order.pay')}}");              
              $("#formOrder").submit();                   
        });
        
        $("#orderCart").click(function(){ 
              $("#formOrder").attr("action","{{route('user.order.undo')}}");              
              $("#formOrder").submit();                   
        });
      })
  
  </script>  



   
@stop
