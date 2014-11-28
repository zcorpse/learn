@extends('layout.default')

@section('layout.content')

   <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              帐务处理
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                补充准备金
              </small>
            </h1>
          </div><!-- /.page-header -->

          <div class="row">
            <div class="col-xs-12">              
              <!-- PAGE CONTENT BEGINS -->
                @include('flash::message')
              <!-- #section:elements.tab -->
                 
                     <form class="form-horizontal" method="post" action="" id="form-transfer" name="form-transfer" autocomplete="off">                

                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        

                          <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right"> 账户： </label>
                            <div class="col-sm-4">                      
                              <label class="control-label no-padding-left"><strong>{{ $user->name }}</strong></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right"> 当前余额： </label>
                            <div class="col-sm-4">                      
                              <label class="control-label no-padding-left green"><strong>{{ number_format($user->balance, 2) }}</strong></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="password2"> *二级密码： </label>
                            <div class="col-sm-2">
                              <input type="password" class="form-control" id="password2" name="password2" value="{{ Input::old('password2') }}" placeholder="二级密码"/>
                            </div> 
                            <div class="col-sm-3">                      
                              {{ $errors->first('password2', '<label class="help-block red">:message</label>') }}
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="amount"> *补充金额： </label>
                            <div class="col-sm-3">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="blue fa fa-jpy"></i></span>
                                <input type="text" class="form-control" id="amount" name="amount" value="{{ Input::old('amount') }}"placeholder="补充金额"/>
                              </div>
                            </div>
                            <div class="col-sm-3">                      
                              {{ $errors->first('amount', '<label class="help-block red">:message</label>') }}
                            </div>
                          </div>                  

                          

                        

                      <div class="space-12"></div>

                        <div class="clearfix form-group">
                          <div class="col-md-offset-4 col-md-9">
                           <button class="btn btn-info" id="bootbox-confirm" type="submit">
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

                      </div>          
                    </form> 
            
              <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          
          
        </div><!-- /.page-content -->
      </div><!-- /.main-content -->

@stop