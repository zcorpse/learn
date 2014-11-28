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
                <input type="hidden" name="uid" value="{{$user->id}}"/>
                  <!-- #section:elements.form -->
                  <h5 class="header smaller lighter blue">帐号设定</h5>
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="login"> *帐号名称： </label>
                    <div class="col-sm-3">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="blue fa fa-tag"></i></span>
                        <input type="text" class="form-control" id="login" name="login" value="{{ $user->login }}" disabled />                        
                      </div>
                    </div>
                    <div class="col-sm-4">                      
                      {{ $errors->first('login', '<label class="help-block red">:message</label>') }}
                    </div>
                  </div>

                  <h5 class="header smaller lighter blue">基础信息</h5>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="name"> *姓名： </label>
                    <div class="col-sm-3">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="blue fa fa-user"></i></span>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="姓名"/>                        
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="radio-inline">
                        <label>
                          <input name="type" value="1" type="radio" class="ace" {{ $user->type == 1 ? 'checked':'' }}/> 
                          <span class="lbl">股东</span>
                        </label>
                        <label>
                          <input name="type" value="2" type="radio" class="ace" {{ $user->type == 2 ? 'checked':'' }}/> 
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
                      <input type="text" class="form-control" id="referee" name="referee" value="{{$user->userReferee->login}}" placeholder="推荐人帐号"/>
                    </div>                     
                    <div class="col-sm-4">                      
                      {{ $errors->first('referee', '<label class="help-block red">:message</label>') }}
                    </div>                   
                  </div>                  

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="mobile"> *手机号码： </label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $user->mobile }}" placeholder="手机号码"/>
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
                  

                  <h5 class="header smaller lighter blue">身份资料</h5>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="email"> 电子邮件： </label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="电子邮件"/>
                    </div>
                    <div class="col-sm-3">                      
                      {{ $errors->first('email', '<label class="help-block red">:message</label>') }}
                    </div>                
                  </div>

                  

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="idcard"> 身份证： </label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="idcard" name="idcard" value="{{ $user->idcard }}" placeholder="身份证"/>
                    </div>                    
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="address"> 联系地址： </label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" placeholder="联系地址"/>
                    </div>                    
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="memo"> 备注： </label>
                    <div class="col-sm-4">
                      <textarea class="form-control" rows="4" id="memo" name="memo" placeholder="备注信息">{{ $user->memo }}</textarea>                      
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

  <script type="text/javascript">
        
        $('#date').datepicker({
          autoclose: true,
          todayHighlight: true,
          language: 'zh-CN'
        })
  </script>  



   
@stop
