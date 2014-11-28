@extends('layout.default')

@section('layout.content')

   <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              系统设置
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                个人资料修改
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
                <input type="hidden" name="uid" value="{{$user->id}}"/>
                  <!-- #section:elements.form -->

                  <h5 class="header smaller lighter blue">基础信息</h5>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 帐号： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left"><strong>{{ $user->login }}</strong></label>
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 姓名： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left"><strong>{{ $user->name }}</strong></label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 类型： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left"><strong>{{ $user->type == 1 ? '股东':'会员' }}</strong></label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 邀请码： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left"><strong>{{ $user->code }}</strong></label>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 推荐人： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left"><strong>{{$user->userReferee->name}}</strong></label>
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
                 
                  

                  <h5 class="header smaller lighter blue">资料信息</h5>


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
                    <label class="col-sm-4 control-label no-padding-right" for="idcard"> *身份证： </label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="idcard" name="idcard" value="{{ $user->idcard }}" placeholder="身份证"/>
                    </div>      
                    <div class="col-sm-4">                      
                      {{ $errors->first('idcard', '<label class="help-block red">:message</label>') }}
                    </div>              
                  </div>


                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="postcode"> 邮编： </label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="postcode" name="postcode" value="{{ $user->postcode }}" placeholder="邮编"/>
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
