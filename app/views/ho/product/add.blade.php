@extends('layout.default')

@section('layout.content')

	 <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              产品管理
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                新增产品
              </small>
            </h1>
          </div><!-- /.page-header -->

          <div class="row">
            <div class="col-xs-12">
              <!-- PAGE CONTENT BEGINS -->
              @include('flash::message')

              <!-- PAGE CONTENT BEGINS -->               
               <form class="form-horizontal" method="post" action="" autocomplete="off">                
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="status" value="1"/>
                  <!-- #section:elements.form -->
                  
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="code"> 产品编号： </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="code" name="code" value="{{ Input::old('code') }}" placeholder="产品编号" />
                    </div>
                    <div class="col-sm-4">                      
                      {{ $errors->first('code', '<label class="help-block red">:message</label>') }}
                    </div>
                  </div>

                 
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="name"> 产品名称： </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="name" name="name" value="{{ Input::old('name') }}" placeholder="产品名称"/>
                    </div>
                    <div class="col-sm-3">                      
                      {{ $errors->first('name', '<label class="help-block red">:message</label>') }}
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="category"> 产品系列： </label>
                    <div class="col-sm-2">
                       {{ Form::select('category', $category,'1',array('class'=>'form-control')) }}                      
                    </div>           
                  </div>


                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="type"> 分类： </label>
                    <div class="col-sm-2">
                       {{ Form::select('type', $type,'',array('class'=>'form-control')) }}                      
                    </div>           
                  </div>
                 

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="price1"> 零售价： </label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="price1" name="price1" value="{{ Input::old('price1') }}" placeholder="原价"/>
                    </div> 
                    
                    <div class="col-sm-4">                      
                      {{ $errors->first('price1', '<label class="help-block red">:message</label>') }}
                    </div>                   
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="price2"> 会员价： </label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="price2" name="price2" value="{{ Input::old('price2') }}" placeholder="优惠价"/>
                    </div> 
                    <div class="col-sm-4">                      
                      {{ $errors->first('price2', '<label class="help-block red">:message</label>') }}
                    </div>                   
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="badge"> 标签： </label>
                    <div class="col-sm-6">
                      <div class="radio-inline">
                        <label>
                          <input name="badge" value="1" type="radio" class="ace" /> 
                          <span class="lbl badge badge-yellow">推荐</span>
                        </label>
                        <label>
                          <input name="badge" value="2" type="radio" class="ace" /> 
                          <span class="lbl badge badge-danger">热销</span>
                        </label>
                        <label>
                          <input name="badge" value="3" type="radio" class="ace" /> 
                          <span class="lbl badge badge-success">降价</span>
                        </label>
                        <label>
                          <input name="badge" value="0" type="radio" class="ace" /> 
                          <span class="lbl badge">无标签</span>
                        </label>
                      </div> 
                    </div>                
                  </div>              

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="specs"> 规格： </label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="specs" name="specs" value="{{ Input::old('specs') }}" placeholder="规格"/>
                    </div>
                    <div class="col-sm-3">                      
                      {{ $errors->first('specs', '<label class="help-block red">:message</label>') }}
                    </div>                
                  </div>                 

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="memo"> 备注： </label>
                    <div class="col-sm-4">
                      <textarea class="form-control" rows="4" id="memo" name="memo" placeholder="备注信息">{{ Input::old('memo') }}</textarea>                      
                    </div>                    
                  </div>

                  <div class="space-12"></div>

                  <div class="clearfix form-group">
                  <div class="col-md-offset-4 col-md-9">
                    <button class="btn btn-info" type="submit">
                      <i class="ace-icon fa fa-check bigger-110"></i>
                      确定
                    </button>
                    &nbsp; &nbsp; &nbsp;&nbsp;
                    <button class="btn" type="reset">
                      <i class="ace-icon fa fa-undo bigger-110"></i>
                      重置
                    </button>
                  </div>
                </div>

              </form>           

            
              <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.page-content -->
      </div><!-- /.main-content -->

@stop

@section('javascript')

{{HTML::script('assets/js/bootstrap-datepicker.min.js')}}
{{HTML::script('assets/js/bootstrap-datepicker.zh-CN.js')}}
{{HTML::script('assets/js/jquery.dataTables.min.js')}}
{{HTML::script('assets/js/jquery.dataTables.bootstrap.js')}}
{{HTML::script('assets/js/province.js')}}

  <script type="text/javascript">
        $("#test").province_city_county();

        $('#regdate').datepicker({
          autoclose: true,
          todayHighlight: true,
          language: 'zh-CN'
        })
  </script>  



   
@stop
