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
              <div class="img-thumbnail">
                <a href="{{route('ho.product.edit',$product->id)}}"><img class="img-responsive" src="/assets/images/gallery/{{ !$product->image == null?$product->image:'thumb-2.jpg'}}" />
                <div class="caption">
                  <h5 class="text-left">{{ $product->name }}</h5>
                  <p class="text-left grey">{{ $product->specs }}</p>
                  <p class="text-left red inline"><strong>￥{{ number_format($product->price2,1) }}</strong>
                    <i class="ace-icon fa fa-edit bigger-120 blue"></i></p>
                  
                </div>
              </div>
              <div class="space-12"></div>
            </div>
            @endforeach


      


            

            
          </div><!-- /.row -->
        </div><!-- /.page-content -->
      </div><!-- /.main-content -->

@stop


