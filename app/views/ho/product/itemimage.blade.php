@extends('layout.default')

@section('layout.content')

   <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              产品管理
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                产品编辑
              </small>
            </h1>
          </div><!-- /.page-header -->

          <div class="row">
            <div class="col-xs-12">
              @include('flash::message')
            </div>

            @foreach ($products as $product)
            <div class="col-xs-6 col-sm-3 center">              
              <div class="thumbnail no-border">
                <a href="{{route('ho.product.edit',$product->id)}}"><img class="img-responsive img-rounded" src="/assets/images/gallery/{{ !$product->image == null?$product->image:'image-2.jpg'}}" /></a></li>
                
                <div class="caption">
                  <h5 class="text-left lighter blue" style="height:35px;">{{ $product->name }}</h5>
                  <p class="text-left grey">{{ $product->specs }}</p>
                  <p class="text-left"><span class="red bigger-110"><strong>￥{{ number_format($product->price2,1) }}</strong></span></p>
                  <p>
                    <button class="btn btn-xs btn-warning no-border" id="bootbox-confirm" type="button">
                      <i class="ace-icon fa fa-shopping-cart bigger-110"></i>
                      <span>加入购物车</span>
                    </button>
                  </p>
                </div>

              </div>
              <div class="space-12"></div>
            </div>
            @endforeach


      


            

            
          </div><!-- /.row -->
        </div><!-- /.page-content -->
      </div><!-- /.main-content -->

@stop


