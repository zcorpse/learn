@extends('layout.default')

@section('layout.content')

   <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              订购系统
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                订单管理
              </small>
            </h1>
          </div><!-- /.page-header -->
          

          <div class="row">
            <div class="col-xs-12">              
              <!-- PAGE CONTENT BEGINS -->     
              @include('flash::message')          
               
                <div class="tabbable">
                  <ul class="nav nav-tabs" id="myTab">

                    <li class="active">
                      <a data-toggle="tab" href="#express">
                        <i class="red ace-icon fa fa-sign-in bigger-120"></i>
                        未处理订单
                      </a>
                    </li>

                    <li>
                      <a data-toggle="tab" href="#shop">
                        <i class="green ace-icon fa fa-check-square-o bigger-120"></i>
                        已处理订单
                        <!--<span class="badge badge-danger">4</span>-->
                      </a>
                    </li>

                    
                  </ul>

                  <div class="tab-content">
                    <div id="express" class="tab-pane in active">
                      <form id="formOrder" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <input type="hidden" name="orderid" id="orderid" value="">
                        <table id="records-table" class="table table-hover {{ Config::get('view.table-border', '') }}">
                          <thead>
                            <tr>
                              <th>日期</th>
                              <th>订单编号</th>
                              <th>金额</th>
                              <th>订购人</th> 
                              <th>状态</th>
                              <th class="hidden-480">快递公司</th>
                              <th class="hidden-480">运单号</th>                          
                              <th class="hidden-480">操作</th>
                            </tr>
                          </thead>

                          <tbody>
                              @foreach ($unpayorders as $order)                              
                              <tr>                         
                                <td>{{ date('Y-m-d',$order->date) }}</td>
                                <td>{{ $order->serial }}</td>
                                <td><span class="green">{{ number_format($order->amount,2) }}</span></td>
                                <td>{{ $order->user->name }}</td>
                                <td>
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
                                  
                                </td>
                                <td class="hidden-480">{{ $order->express }}</td>
                                <td class="hidden-480">{{ $order->ticket }}</td>                       
                                <td class="hidden-480">
                                  <button type="button" id="edit{{$order->id}}" class="btn btn-primary btn-minier" {{$order->status == 0?'disabled':''}}>审核</button>
                                  <button type="button" id="cancel{{$order->id}}" class="btn btn-danger btn-minier" >取消</button>
                                </td>  
                              </tr>                             
                              @endforeach                            
                            </tbody>                       
                        </table>
                      </form>
                    </div>

                    <div id="shop" class="tab-pane">
                      <table id="records-table" class="table table-hover">
                        <thead>
                          <tr>
                            <th>日期</th>
                            <th>订单编号</th>
                            <th>金额</th>
                            <th>订购人</th> 
                            <th>状态</th>
                            <th class="hidden-480">快递公司</th>
                            <th class="hidden-480">运单号</th>                          
                            <th class="hidden-480">备注</th>
                          </tr>
                        </thead>

                        <tbody>
                            @foreach ($processorders as $order)                              
                            <tr>                         
                              <td>{{ date('Y-m-d',$order->date) }}</td>
                              <td>{{ $order->serial }}</td>
                              <td><span class="green">{{ number_format($order->amount,2) }}</span></td>
                              <td>{{ $order->user->name }}</td>
                              <td>
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
                                
                              </td>
                              <td class="hidden-480">{{ $order->express }}</td> 
                              <td class="hidden-480">{{ $order->ticket }}</td>                    
                              <td class="hidden-480">{{ $order->memo }}</td>  
                            </tr>                             
                            @endforeach                            
                          </tbody>
                      </table>
                    </div>
                  </div>

                </div>


                  
                

            
              <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </div><!-- /.page-content -->
      </div><!-- /.main-content -->
@stop

@section('javascript')
{{HTML::script('assets/js/jquery.dataTables.min.js')}}
{{HTML::script('assets/js/jquery.dataTables.bootstrap.js')}}

    <script type="text/javascript">
      jQuery(function($) {       
           
        $("button").on(ace.click_event,function(){            
            var id = $(this).attr("id");
            var value = id.replace(/[^0-9]/ig,'');
            if(id.match('edit')){
              window.location.href = "/ho/indent/edit/"+value;            
            } 
            if(id.match('cancel')){
              document.getElementById("orderid").value= value;
              $("#formOrder").attr("action","{{route('ho.indent.cancel')}}");              
              $("#formOrder").submit();            
            }                    
        });
      
      })
    </script>
@stop