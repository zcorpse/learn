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
            <div class="col-xs-12 col-sm-3 center">
              <span class="profile-picture">
                <img class="editable img-responsive" alt="150x150" src="/assets/images/gallery/{{ !$product->image == null?$product->image:'thumb-2.jpg'}}" />
              </span>

              <div class="space space-4"></div>

              <button id="product{{ $product->id }}" class="btn btn-white btn-info btn-bold">
                <i class="ace-icon fa fa-image bigger-120 blue"></i>
                更换产品图片
              </button>                            
              
            </div><!-- /.col -->

            <div class="col-xs-12 col-sm-9">
              <form class="form-horizontal" method="post" action="" autocomplete="off">                
              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
              <input type="hidden" name="id" value="{{ $product->id }}"/>

              <div class="profile-user-info">

                <div class="profile-info-row">
                  <div class="profile-info-name"> 产品名称： </div>

                  <div class="profile-info-value col-sm-5">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" placeholder="产品名称"/>
                  </div>
                  <div class="col-sm-4">                      
                    {{ $errors->first('code', '<label class="help-block red">:message</label>') }}
                  </div>
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name"> 产品编号： </div>

                  <div class="profile-info-value col-sm-4">
                    <input type="text" class="form-control" id="code" name="code" value="{{ $product->code }}" placeholder="产品编号" />
                  </div>
                  <div class="col-sm-4">                      
                    {{ $errors->first('code', '<label class="help-block red">:message</label>') }}
                  </div>
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name"> 系列： </div>

                  <div class="profile-info-value col-sm-4">
                    {{ Form::select('category', $category,$product->category,array('class'=>'form-control')) }}
                  </div>
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name"> 分类： </div>

                  <div class="profile-info-value col-sm-2">
                    {{ Form::select('type', $type,$product->type,array('class'=>'form-control')) }}
                  </div>
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name"> 零售价： </div>

                  <div class="profile-info-value col-sm-2">
                    <input type="text" class="form-control" id="price1" name="price1" value="{{ $product->price1 }}" placeholder="原价"/>
                  </div>
                  <div class="col-sm-4">                      
                    {{ $errors->first('code', '<label class="help-block red">:message</label>') }}
                  </div>
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name"> 会员价： </div>

                  <div class="profile-info-value col-sm-2">
                    <input type="text" class="form-control" id="price2" name="price2" value="{{ $product->price2 }}" placeholder="优惠价"/>
                  </div>
                  <div class="col-sm-4">                      
                    {{ $errors->first('code', '<label class="help-block red">:message</label>') }}
                  </div>
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name"> 标签： </div>

                  <div class="profile-info-value col-sm-6">
                    <div class="radio-inline">
                      <label>
                        <input name="badge" value="1" type="radio" class="ace" {{ $product->badge == 1 ? 'checked':'' }}/> 
                        <span class="lbl badge badge-yellow">推荐</span>
                      </label>
                      <label>
                        <input name="badge" value="2" type="radio" class="ace" {{ $product->badge == 2 ? 'checked':'' }}/> 
                        <span class="lbl badge badge-danger">热销</span>
                      </label>
                      <label>
                        <input name="badge" value="3" type="radio" class="ace" {{ $product->badge == 3 ? 'checked':'' }}/> 
                        <span class="lbl badge badge-success">降价</span>
                      </label>
                      <label>
                        <input name="badge" value="0" type="radio" class="ace" {{ $product->badge == 0 ? 'checked':'' }}/> 
                        <span class="lbl badge">无标签</span>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name"> 规格： </div>

                  <div class="profile-info-value col-sm-6">
                    <input type="text" class="form-control" id="specs" name="specs" value="{{ $product->specs }}" placeholder="规格"/>
                  </div>
                </div>


                <div class="profile-info-row">
                  <div class="profile-info-name"> 备注： </div>

                  <div class="profile-info-value col-sm-6">
                    <textarea class="form-control" rows="4" id="memo" name="memo" placeholder="备注信息">{{ $product->memo }}</textarea>
                  </div>
                </div>

              </div>  

              <div class="space-12"></div>

              <div class="clearfix form-group">
                <div class="col-xs-offset-2 col-md-9">
                  <button class="btn btn-info" type="submit">
                    <i class="ace-icon fa fa-check bigger-110"></i>
                    修改
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


