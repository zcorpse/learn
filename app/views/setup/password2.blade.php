@extends('layout.default')

@section('layout.content')

   <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              系统设置
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                二级密码修改
              </small>
            </h1>
          </div><!-- /.page-header -->

          <div class="row">
            <div class="col-xs-12">
              
              @include('flash::message') 

              <!-- PAGE CONTENT BEGINS -->               
               <form class="form-horizontal" method="post" action="" autocomplete="off">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                  <!-- #section:elements.form -->
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="oldpassword"> *旧密码(二级) </label>
                    <div class="col-sm-4">
                      <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="请输入旧密码" />
                    </div>
                    <div class="col-sm-3">                      
                      {{ $errors->first('oldpassword', '<label class="help-block red">:message</label>') }}
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="form-field-2"> *新密码(二级) </label>
                    <div class="col-sm-4">
                      <input type="password" class="form-control" id="form-field-2" name="password" placeholder="请输入新密码" />                     
                    </div>
                    <div class="col-sm-3">                      
                      {{ $errors->first('password', '<label class="help-block red">:message</label>') }}
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="form-field-3"> *确认密码(二级) </label>
                    <div class="col-sm-4">
                      <input type="password" class="form-control" id="form-field-3" name="password_confirmation" placeholder="再确认一次新密码" />
                    </div>
                    <div class="col-sm-3">                      
                      {{ $errors->first('password_confirmation', '<label class="help-block red">:message</label>') }}
                    </div>
                  </div>
                  
                  <div class="clearfix form-group">
                  <div class="col-sm-offset-4 col-sm-4">
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