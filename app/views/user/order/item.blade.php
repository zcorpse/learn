@extends('layout.default')

@section('layout.content')

  <div class="main-content">
       
    <div class="page-content">
        
      <div class="page-header">
        <h1>
          产品订购
          <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            产品列表 
          </small>              
        </h1>
      </div><!-- /.page-header -->
          
     
          
      <div class="row">

        <div class="col-xs-12">
          <label class="label label-primary arrowed-right">筛选</label>
          @foreach ($productType as $types)
          <a href="{{$products->appends(array('sort' => $sort,'type' => $types->key,'order'=>'asc'))->getUrl(1)}}"><span class="btn btn-xs btn-white btn-primary">{{$types->value}}</span></a>&nbsp;
          @endforeach   
          <div class="space-4"></div>       
        </div>
        
        <div class="col-xs-12">
          <label class="label label-danger arrowed-right">排序</label>
          <a href="{{$products->appends(array('sort' => 'price2','type' => $ptype,'order'=>'desc'))->getUrl(1)}}"><span class="btn btn-xs btn-white btn-yellow">价格从高到低</span></a>&nbsp;
          <a href="{{$products->appends(array('sort' => 'price2','type' => $ptype,'order'=>'asc'))->getUrl(1)}}"><span class="btn btn-xs btn-white btn-yellow">价格从低到高</span></a>&nbsp;
          <a href="{{$products->appends(array('sort' => 'id','type' => $ptype,'order'=>'desc'))->getUrl(1)}}"><span class="btn btn-xs btn-white btn-yellow">上架时间</span></a>&nbsp;
          <div class="space-4"></div> 
        </div>
        
        <div class="col-xs-12">
          <div class="dataTables_paginate paging_bootstrap">
          当前第<span class="red">{{$products->getCurrentPage()}}</span>页/总共{{$products->getLastPage()}}页
          {{$products->appends(array('sort' => $sort,'type' => $ptype,'order'=>$order))->links()}}
          </div>

        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-xs-12 no-padding">              
          <!-- PAGE CONTENT BEGINS -->
           <form method="post" action="" id="formProduct">
           <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"/>
           <input type="hidden" name="id" id="id" value="">      
           <!-- <div class="dataTables_borderWrap"> -->
           <div id="switchlist" class="hide">                  
            <table id="sample-table-2" class="table table-hover {{ Config::get('view.table-border', '') }}">
              <thead>
                <tr>                                                  
                  <th class="hidden-480">编号</th>
                  <th>名称</th>
                  <th class="hidden-480">系列</th>     
                  <th class="hidden-480">分类</th>                     
                  <th>零售价</th>  
                  <th>会员价</th>
                  <th class="hidden-480">规格</th>
                  <th>订购</th>
                  <th class="hidden-480">备注</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($products as $product)
                <tr>
                  <td class="hidden-480">{{ $product->code }}</td>
                  <td>
                    @if ($product->badge == 1)
                    <span class="badge badge-yellow">荐</span>
                    @elseif ($product->badge == 2)
                    <span class="badge badge-danger">热</span>
                    @elseif ($product->badge == 3)
                    <span class="badge badge-success">降</span>
                    @endif
                    {{ $product->name }}
                  </td>
                  <td class="hidden-480">{{ $product->category }}</td>
                  <td class="hidden-480">{{ $product->type }}</td>
                  <td>{{ number_format($product->price1,1) }}</td>
                  <td>{{ number_format($product->price2,1) }}</td>
                  <td class="hidden-480">{{ $product->specs }}</td>
                  <td>
                    <button type="button" id="cart{{$product->id}}" class="btn btn-pink btn-minier" >+</button>
                  </td>
                  <td class="hidden-480">{{ $product->memo }}</td>
                </tr>  
                @endforeach                
              </tbody>
            </table>
          </div>



          <div id="switchimage" class="">
            @foreach ($products as $product)
            <div class="col-xs-6 col-sm-3 center">              
              <div class="thumbnail no-border">
                <a href="{{route('user.item.view',$product->id)}}"><img class="img-responsive img-rounded" src="/assets/images/gallery/{{ !$product->image == null?$product->image:'image-2.jpg'}}" /></a></li>                
                <div class="caption">
                  <h5 class="text-left lighter blue" style="height:35px;">{{ $product->name }}</h5>
                  <p class="text-left grey">{{ $product->specs }}</p>
                  <p class="text-left"><span class="red bigger-110"><strong>￥{{ number_format($product->price2,1) }}</strong></span></p>
                  <p>
                    <button class="btn btn-xs btn-warning no-border" id="get{{$product->id}}" type="button">
                      <i class="ace-icon fa fa-shopping-cart bigger-110"></i>
                      <span>加入购物车</span>
                    </button>
                  </p>
                </div>

              </div>
              <div class="space-12"></div>
            </div>
            @endforeach              
           
          </div>
          </form>        
          <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
      </div><!-- /.row -->

      <div class="row">        
        <div class="col-xs-12">
          <div class="dataTables_paginate paging_bootstrap">
          {{$products->appends(array('sort' => $sort,'type' => $ptype,'order'=>$order))->links()}}
          </div>
        </div>
      </div>

    </div><!-- /.page-content -->
  </div><!-- /.main-content -->
@stop

@section('javascript')
{{HTML::script('assets/js/jquery.gritter.min.js')}}

    <script type="text/javascript">
      jQuery(function($) {        

        $("button").on('click',function(){            
            var id = $(this).attr("id");
            var value = id.replace(/[^0-9]/ig,'');
            if( id.match('cart') || id.match('get')){              
              document.getElementById("id").value= value;              
              $.ajax({     
                  url:'{{route('user.order.item')}}',     
                  type:'post', 
                  data:{id:value, _token:$("#_token").val()},                   
                  dataType: "json", 
                  complete:function(data){
                    //alert(data.responseText);
                    jsonData = eval("("+data.responseText+")");
                    $.gritter.add({
                      title: '产品订购信息',
                      text: '您选择的【'+jsonData.name+'】，商品编号'+jsonData.code+' 已经添加到购物车，<a href="{{URL::route('user.order.cart')}}" class="orange">点击查看购物车</a>',            
                      time: 2000,
                      speed:10,    
                      class_name: 'gritter-info gritter-center'
                    });
                
                    return false;
                  }  
              }); 
              
              
            }                     
        });
      
      })
    </script>
@stop