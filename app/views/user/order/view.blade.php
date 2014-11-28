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
                  <h5 class="header smaller lighter blue">
                    订单信息
                  </h5>
                  
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
                              订单取消
                            @endif
                        </strong>
                      </label>
                    </div>
                  </div>
                              
                  <h5 class="header smaller lighter blue">
                    发货信息
                  </h5>

                  @if (($order->invoice) == 1)
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 发货方式： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left">快递公司邮寄</label>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 快递公司： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left">{{$order->express}}</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 运单号： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left">{{$order->ticket}}</label>
                    </div>
                  </div>

                  @elseif (($order->invoice) == 2) 

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 发货方式： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left">家庭超市自提</label>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 超市名称： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left">{{$order->shop->name}}</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 联系地址： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left">{{$order->shop->address}}</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 联系电话： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left">{{$order->shop->mobile}}</label>
                    </div>
                  </div>

                  @endif

                  <h5 class="header smaller lighter blue">
                    收货信息
                  </h5>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 收货人： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left">{{$order->name}}</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 联系电话： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left">{{$order->mobile}}</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 邮编： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left">{{$order->postcode}}</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 收货地址： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left">{{$order->address}}</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 备注： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left">{{$order->memo}}</label>
                    </div>
                  </div>


                  <h5 class="header smaller lighter green">
                    产品信息
                  </h5>

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


                 

              </form>           

            
              <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.page-content -->
      </div><!-- /.main-content -->

@stop
