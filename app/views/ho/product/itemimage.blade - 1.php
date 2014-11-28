@extends('layout.default')

@section('layout.content')

   <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              产品管理
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                产品列表 
              </small>
            </h1>
          </div><!-- /.page-header -->
          

          <div class="row">
            <div class="col-xs-12">              
              <!-- PAGE CONTENT BEGINS -->     
              @include('flash::message')       
               <!-- <div class="dataTables_borderWrap"> -->
                 
                    <ul class="ace-thumbnails clearfix">
                      @foreach ($products as $product)
                      <li>
                        <a href="{{route('ho.product.edit',$product->id)}}" data-rel="colorbox">
                          <img alt="150x150" src="/assets/images/gallery/{{ !$product->image == null?$product->image:'thumb-2.jpg'}}" />                          
                        </a>
                        <div class="tags">
                          <span class="label-holder">                            
                            <span class="label label-inverse arrowed">                                                           
                              {{ $product->name }}
                            </span>                            
                          </span>                          
                          <span class="label-holder">
                            <span class="label label-danger arrowed">{{ $product->specs }}</span>
                          </span>
                          <span class="label-holder">
                            <span class="label label-info arrowed">{{ number_format($product->price2,1) }}</span>
                          </span>
                        </div>
                        <div class="tools tools-left">
                          <a href="#">
                            <i class="ace-icon fa fa-search-plus"></i>
                          </a>
                          <a href="#">
                            <i class="ace-icon fa fa-plus"></i>
                          </a>
                          <a href="{{route('ho.product.edit',$product->id)}}">
                            <i class="ace-icon fa fa-pencil"></i>
                          </a>
                        </div>
                      </li>
                      @endforeach
                    </ul>

                

            
              <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </div><!-- /.page-content -->
      </div><!-- /.main-content -->
@stop

