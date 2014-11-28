@extends('layout.default')

@section('layout.content')

	 <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              分公司管理
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                新设分公司
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
                <input type="hidden" name="flag" value="2"/>
                <input type="hidden" name="type" value="1"/>
                  <!-- #section:elements.form -->
                  <h5 class="header smaller lighter blue">帐号设定</h5>
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="login"> *帐号名称： </label>
                    <div class="col-sm-3">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="blue fa fa-tag"></i></span>
                        <input type="text" class="form-control" id="login" name="login" value="{{ Input::old('login') }}" placeholder="帐号" />                        
                      </div>
                    </div>
                    <div class="col-sm-4">                      
                      {{ $errors->first('login', '<label class="help-block red">:message</label>') }}
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 初始密码： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left"><strong>888888</strong></label>
                    </div>
                  </div>
                              
                  

                  <h5 class="header smaller lighter blue">基础信息</h5>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="name"> *名称： </label>
                    <div class="col-sm-3">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="blue fa fa-user"></i></span>
                        <input type="text" class="form-control" id="name" name="name" value="{{ Input::old('name') }}" placeholder="名称"/>                        
                      </div>
                    </div>
                    <div class="col-sm-4">                      
                      {{ $errors->first('name', '<label class="help-block red">:message</label>') }}
                    </div>
                  </div>                 

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="mobile"> *手机号码： </label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="mobile" name="mobile" value="{{ Input::old('mobile') }}" placeholder="手机号码"/>
                    </div> 
                    <div class="col-sm-4">                      
                      {{ $errors->first('mobile', '<label class="help-block red">:message</label>') }}
                    </div>                   
                  </div>

                  <div class="form-group">
          					<label class="col-sm-4 control-label no-padding-right" > *所属区域： </label>
          					<div class="col-sm-5">                      
          					  <div class="input-group">                        
          						  <div id="test"></div>
          					  </div>                         
          					</div>
                    <div class="col-sm-3">                      
                      {{ $errors->first('province', '<label class="help-block red">:message</label>') }}
                      {{ $errors->first('city', '<label class="help-block red">:message</label>') }}
                      {{ $errors->first('county', '<label class="help-block red">:message</label>') }}
                    </div>                                  
        				  </div>

                  

                  <h5 class="header smaller lighter blue">账户设置</h5>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> *设立日期： </label>
                    <div class="col-sm-3">
                      <!-- #section:plugins/date-time.datepicker -->
                      <div class="input-group">
                        <span class="input-group-addon"><i class="blue fa fa-calendar"></i></span>
                        <input class="form-control date-picker" id="date" name="date" type="text" data-date-format="yyyy-mm-dd" value="{{ date('Y-m-d') }}"/>
                      </div>
                      <div class="col-sm-4">                      
                      {{ $errors->first('date', '<label class="help-block red">:message</label>') }}
                    </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="amount"> *初始金额： </label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="amount" name="amount" value="{{ Input::old('amount') }}" placeholder="初始金额"/>
                    </div>
                    <div class="col-sm-3">                      
                      {{ $errors->first('amount', '<label class="help-block red">:message</label>') }}
                    </div>                
                  </div>
                  

                  <h5 class="header smaller lighter blue">身份资料</h5>                 

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="address"> 联系地址： </label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="address" name="address" value="{{ Input::old('address') }}" placeholder="联系地址"/>
                    </div>                    
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="memo"> 备注： </label>
                    <div class="col-sm-4">
                      <textarea class="form-control" rows="4" id="memo" name="memo" value="{{ Input::old('memo') }}" placeholder="备注信息"></textarea>                      
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

        $('#date').datepicker({
          autoclose: true,
          todayHighlight: true,
          language: 'zh-CN'
        })
  </script>  



   
@stop
