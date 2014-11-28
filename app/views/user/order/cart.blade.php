@extends('layout.default')

@section('layout.content')

   <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              产品订购
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                购物车 
              </small>
            </h1>
          </div><!-- /.page-header -->
          

          <div class="row">
            <div class="col-xs-12">              
              <!-- PAGE CONTENT BEGINS -->     
              @include('flash::message')        
               <!-- <div class="dataTables_borderWrap"> -->
                  <form method="post" action="" id="formCart">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <table id="sample-table-2" class="table table-hover {{ Config::get('view.table-border', '') }}">
                      <thead>
                        <tr>                                                  
                          <th class="hidden-480">编号</th>
                          <th>名称</th>
                          <th class="hidden-480">系列</th>     
                          <th class="hidden-480">分类</th> 
                          <th class="hidden-480">规格</th>
                          <th>会员价</th>                          
                          <th>数量</th>
                          <th>合计</th>
                        </tr>
                      </thead>

                      
                      

                      <tbody>
                        @foreach ($items as $item)
                        <tr>
                          <td class="hidden-480">{{ $item->code }}</td>
                          <td>{{ $item->name }}</td>
                          <td class="hidden-480">{{ $item->category }}</td>
                          <td class="hidden-480">{{ $item->type }}</td>
                          <td class="hidden-480">{{ $item->specs }}</td>
                          <td>{{ number_format($item->price2,1) }}</td>                          
                          <td>
                            <input type="text" class="" id="number{{ $item->productid }}" name="number{{ $item->productid }}" value="{{ $item->number }}"/>
                          </td>
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
                          <td><span class="green"><strong>{{ number_format($amount,1) }}</strong><span></td>
                        </tr>
                      </tbody>  

                    </table>

                    <div class="space-12"></div>

                    @if (count($items) > 0)
                    <div class="clearfix form-group">
                      <div class="col-xs-12 col-sm-offset-4">
                        <button class="btn btn-info" id="cartUpdate" type="button">
                          <i class="ace-icon fa fa-refresh"></i>
                          更新
                        </button>
                        &nbsp; 
                        <button class="btn btn-warning" id="cartClear" type="button">
                          <i class="ace-icon fa fa-refresh"></i>
                          清空
                        </button>
                        &nbsp; 
                        <button class="btn btn-danger" id="cartCheck" type="button">
                          <i class="ace-icon fa fa-check"></i>
                          结算
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
{{HTML::script('assets/js/jquery.dataTables.min.js')}}
{{HTML::script('assets/js/jquery.dataTables.bootstrap.js')}}
{{HTML::script('assets/js/fuelux.spinner.min.js')}}

    <script type="text/javascript">
      jQuery(function($) {
       
       
           
        $("#cartUpdate").click(function(){ 
              $("#formCart").attr("action","{{route('user.order.update')}}");
              $("#formCart").submit();                          
        });

        $("#cartClear").click(function(){ 
              $("#formCart").attr("action","{{route('user.order.clear')}}");
              $("#formCart").submit();                   
        });

        $("#cartCheck").click(function(){ 
              //$("#formCart").attr("action","{{route('user.order.check')}}");
              $("#formCart").attr("action","{{route('user.order.check')}}");
              $("#formCart").submit();                   
        });

        $("input[name ^='number']").ace_spinner({value:0,min:0,max:100,step:1, on_sides: true, icon_up:'ace-icon fa fa-plus smaller-20', icon_down:'ace-icon fa fa-minus smaller-20', btn_up_class:'btn-success' , btn_down_class:'btn-danger'})
        .on('change', function(){
          //alert(this.value);
        });
      
      })
    </script>
@stop