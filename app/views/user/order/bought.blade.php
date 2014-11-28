@extends('layout.default')

@section('layout.content')

   <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              产品订购
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                我的订单 
              </small>
            </h1>
          </div><!-- /.page-header -->
          

          <div class="row">
            <div class="col-xs-12">              
              <!-- PAGE CONTENT BEGINS -->     
              @include('flash::message')
               <!-- <div class="dataTables_borderWrap"> -->
                  <form method="post" action="" id="formProduct">
                    <input type="hidden" name="id" id="id" value="">
                    <table id="sample-table-2" class="table table-hover {{ Config::get('view.table-border', '') }}">
                      <thead>
                        <tr>                                                  
                          <th>日期</th>
                          <th>订单编号</th>
                          <th>金额</th>     
                          <th>状态</th>                     
                          <th class="hidden-480">发货方式</th>  
                          <th class="hidden-480">快递公司</th>
                          <th class="hidden-480">运单号</th>                          
                          <th class="hidden-480">备注</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach ($orders as $order)
                        <tr>
                          <td>{{ date('Y-m-d',$order->date) }}</td>
                          <td>
                            @if (($order->status) == 0)
                              <a href="{{URL::route('user.order.edit',$order->id)}}">{{ $order->serial }}</a>
                            @else 
                              <a href="{{URL::route('user.order.view',$order->id)}}">{{ $order->serial }}</a>
                            @endif
                          </td>
                          <td>{{ number_format($order->amount,1) }}</td>
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
                          <td class="hidden-480">
                            @if (($order->invoice) == 1)
                              快递
                            @elseif (($order->invoice) == 2)
                              自提                      
                            @endif
                          </td>
                          <td class="hidden-480">{{ $order->express }}</td>
                          <td class="hidden-480">{{ $order->ticket }}</td>
                          <td class="hidden-480">{{ $order->memo }}</td>
                          
                        </tr>  
                        @endforeach                
                      </tbody>
                    </table>

               </form>
                

            
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
        var oTable1 = 
        $('#sample-table-2')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .dataTable( {
          bAutoWidth: false,         
            
          "aoColumns": [            
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },          
            { "bSortable": false }           
          ]
      
          
          //,
          //"sScrollY": "200px",
          //"bPaginate": false,
      
          //"sScrollX": "100%",
          //"sScrollXInner": "120%",
          //"bScrollCollapse": true,
          //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
          //you may want to wrap the table inside a "div.dataTables_borderWrap" element
      
          //"iDisplayLength": 50
          } );
        
      
      
        $(document).on('click', 'th input:checkbox' , function(){
          var that = this;
          $(this).closest('table').find('tr > td:first-child input:checkbox')
          .each(function(){
            this.checked = that.checked;
            $(this).closest('tr').toggleClass('selected');
          });
        });
           
        $("button").click(function(){            
            var id = $(this).attr("id");
            var value = id.replace(/[^0-9]/ig,'');
            if(id.match('cart')){
              document.getElementById("id").value= value;
              $("#formProduct").attr("action","{{route('user.order.item')}}");
              $("#formProduct").submit();
            }                     
        });
      
      })
    </script>
@stop