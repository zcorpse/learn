@extends('layout.default')

@section('layout.content')

	 <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              账户管理
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                账户开户
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
                <input type="hidden" name="status" value="0"/>
                <input type="hidden" name="flag" value="0"/>
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
                    <label class="col-sm-4 control-label no-padding-right" for="name"> *姓名： </label>
                    <div class="col-sm-3">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="blue fa fa-user"></i></span>
                        <input type="text" class="form-control" id="name" name="name" value="{{ Input::old('name') }}" placeholder="姓名"/>                        
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="radio-inline">
                        <label>
                          <input name="type" value="1" type="radio" class="ace" {{ Input::old('type') == 1 ? 'checked':'' }}/> 
                          <span class="lbl">股东</span>
                        </label>
                        <label>
                          <input name="type" value="2" type="radio" class="ace" {{ Input::old('type') == 2 ? 'checked':'' }}/> 
                          <span class="lbl">会员</span>
                        </label>
                      </div> 
                    </div>
                    <div class="col-sm-3">                      
                      {{ $errors->first('name', '<label class="help-block red">:message</label>') }}
                      {{ $errors->first('type', '<label class="help-block red">:message</label>') }}
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="referee"> *推荐人帐号： </label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="referee" name="referee" value="{{ Input::old('referee') }}" placeholder="推荐人帐号"/>
                    </div>                    

                    <div class="col-sm-4">                      
                      {{ $errors->first('referee', '<label class="help-block red">:message</label>') }}
                    </div>                   
                  </div>

                  <!--<div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="accepter"> *接点人帐号： </label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="accepter" name="accepter" value="{{ Input::old('accepter') }}" placeholder="接点人帐号"/>
                    </div> 
                    <div class="col-sm-2">
                      <div class="radio-inline">
                        <label>
                          <input name="accepterquarter" value="1" type="radio" class="ace" {{ Input::old('accepterquarter') == 1 ? 'checked':'' }}/> 
                          <span class="lbl">A区</span>
                        </label>
                        <label>
                          <input name="accepterquarter" value="2" type="radio" class="ace" {{ Input::old('accepterquarter') == 2 ? 'checked':'' }}/> 
                          <span class="lbl">B区</span>
                        </label>
                      </div> 
                    </div>

                    <div class="col-sm-4">                      
                      {{ $errors->first('accepter', '<label class="help-block red">:message</label>') }}
                      {{ $errors->first('accepterquarter', '<label class="help-block red">:message</label>') }}
                    </div>                   
                  </div>-->

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
          					<label class="col-sm-4 control-label no-padding-right" > 所属区域： </label>
          					<div class="col-sm-5">                      
          					  <div class="input-group">                        
          						  <label class="control-label no-padding-left"><strong>{{$region->province}}{{$region->city}}{{$region->county}}</strong></label>
          					  </div>                         
          					</div>                         
        				  </div>

                  

                  <h5 class="header smaller lighter blue">账户设置</h5>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> *开户日期： </label>
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
                    <label class="col-sm-4 control-label no-padding-right" for="amount"> *开户金额： </label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="amount" name="amount" value="{{ Input::old('amount') }}" placeholder="开户金额"/>
                    </div>
                    <div class="col-sm-3">                      
                      {{ $errors->first('amount', '<label class="help-block red">:message</label>') }}
                    </div>                
                  </div>
                  

                  <h5 class="header smaller lighter blue">身份资料</h5>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="email"> 电子邮件： </label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="email" name="email" value="{{ Input::old('email') }}" placeholder="电子邮件"/>
                    </div>
                    <div class="col-sm-3">                      
                      {{ $errors->first('email', '<label class="help-block red">:message</label>') }}
                    </div>                
                  </div>

                  

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="idcard"> 身份证： </label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="idcard" name="idcard" value="{{ Input::old('idcard') }}" placeholder="身份证"/>
                    </div>                    
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="address"> 联系地址： </label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="address" name="address" value="{{ Input::old('address') }}" placeholder="联系地址"/>
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
{{HTML::script('assets/js/jquery.maskedinput.min.js')}}

  <script type="text/javascript">

        $('#date').datepicker({
          autoclose: true,
          todayHighlight: true,
          language: 'zh-CN'
        });
        
  </script>  



   
@stop
