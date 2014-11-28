@extends('layout.default')

@section('layout.content')

   <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              人员结构
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                股东/会员查询
              </small>
            </h1>
          </div><!-- /.page-header -->

          <div class="row">
            <div class="col-xs-12">              
              <!-- PAGE CONTENT BEGINS -->
                @include('flash::message')
              <!-- #section:elements.tab -->
                 
                     <form class="form-horizontal" method="post" action="" id="form-query" name="form-query" autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                          <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="login"> 账户名： </label>
                            <div class="col-sm-3">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="blue fa fa-user"></i></span>
                                <input type="text" class="form-control" id="login" name="login" value="{{ Input::old('login') }}" placeholder="账户名"/>
                              </div>
                            </div>
                            <div class="col-sm-3">                      
                              {{ $errors->first('login', '<label class="help-block red">:message</label>') }}
                            </div>
                          </div> 

                      <div class="space-12"></div>

                        <div class="clearfix form-group">
                          <div class="col-md-offset-4 col-md-9">
                           <button class="btn btn-info" id="bootbox-confirm" type="submit">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                              查询
                           </button>
                            &nbsp; &nbsp;
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