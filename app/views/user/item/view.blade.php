@extends('layout.default')

@section('layout.content')

	 <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              产品列表
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                查看产品信息
              </small>
            </h1>
          </div><!-- /.page-header -->

          <div class="row">
            <div class="col-xs-12">
              @include('flash::message')
            </div>
            <div class="col-xs-12 col-sm-3 center">
              <span class="profile-picture">
                <img class="editable img-responsive" alt="150x150" src="/assets/images/gallery/{{ !$product->image == null?$product->image:'thumb-2.jpg'}}" />
              </span>

              <div class="space space-4"></div>                                         
              
            </div><!-- /.col -->

            <div class="col-xs-12 col-sm-9">
              <form class="form-horizontal" method="post" action="" autocomplete="off">   
              <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"/>
              <input type="hidden" name="id" id="id" value="{{ $product->id }}"> 

              <div class="profile-user-info">

                <div class="profile-info-row">
                  <div class="profile-info-name"> 产品名称： </div>

                  <div class="profile-info-value col-sm-5">
                    <span>{{ $product->name }}</span>
                  </div>                  
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name"> 产品编号： </div>

                  <div class="profile-info-value col-sm-4">
                    <span>{{ $product->code }}</span>
                  </div>                  
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name"> 系列： </div>

                  <div class="profile-info-value col-sm-4">
                    <span>{{ $product->category }}</span>
                  </div>
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name"> 分类： </div>

                  <div class="profile-info-value col-sm-2">
                    <span>{{ $product->type }}</span>
                  </div>
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name"> 零售价： </div>

                  <div class="profile-info-value col-sm-2">
                    <span>{{ number_format($product->price1,1) }}</span>
                  </div>
                  
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name"> 会员价： </div>

                  <div class="profile-info-value col-sm-2">
                    <span>{{ number_format($product->price2,1) }}</span>
                  </div>
                  
                </div>
                

                <div class="profile-info-row">
                  <div class="profile-info-name"> 规格： </div>

                  <div class="profile-info-value col-sm-6">
                    <span>{{ $product->specs }}</span>
                  </div>
                </div>


                <div class="profile-info-row">
                  <div class="profile-info-name"> 备注： </div>

                  <div class="profile-info-value col-sm-6">
                    <span>{{ $product->memo }}</span>
                  </div>
                </div>

              </div>  

              <div class="space-12"></div>

              <div class="clearfix form-group">
                <div class="col-xs-offset-2 col-md-9">
                  <button class="btn btn-info" id="get{{$product->id}}" type="button">
                    <i class="ace-icon fa fa-shopping-cart bigger-110"></i>
                    加入购物车
                  </button>
                  &nbsp; &nbsp; &nbsp;&nbsp;
                  <button class="btn" type="reset">
                    <i class="ace-icon fa fa-undo bigger-110"></i>
                    取消
                  </button>
                </div>
              </div>
            </form>

            </div><!-- /.col -->

            
          </div><!-- /.row -->
        </div><!-- /.page-content -->
      </div><!-- /.main-content -->

@stop


@section('javascript')
{{HTML::script('assets/js/jquery.gritter.min.js')}}

    <script type="text/javascript">
      jQuery(function($) {
        $("button").on('click',function(){          
          var value = document.getElementById("id").value;
          //alert(value);

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
                          
        });
      
      })
    </script>
@stop