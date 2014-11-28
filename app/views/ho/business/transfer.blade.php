@extends('layout.default')

@section('layout.content')

   <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              帐务处理
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                内部转账
              </small>
            </h1>
          </div><!-- /.page-header -->

          <div class="row">
            <div class="col-xs-12">              
              <!-- PAGE CONTENT BEGINS -->
                @include('flash::message')
              <!-- #section:elements.tab -->
                  <div class="tabbable">
                    <ul class="nav nav-tabs" id="myTab">

                      <li class="active">
                        <a data-toggle="tab" href="#records">
                          <i class="blue ace-icon fa fa-sign-in bigger-120"></i>
                          转账登记
                        </a>
                      </li>

                      <li>
                        <a data-toggle="tab" href="#deposits">
                          <i class="green ace-icon fa fa-check-square-o bigger-120"></i>
                          转账记录
                          <!--<span class="badge badge-danger">4</span>-->
                        </a>
                      </li>

                      
                    </ul>

                    <div class="tab-content">
                      <div id="records" class="tab-pane in active">


                        <form class="form-horizontal" method="post" action="" id="form-transfer" name="form-transfer" autocomplete="off">                

                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                          <!-- #section:elements.form -->
                          <h5 class="header smaller lighter blue">转出方</h5>

                          <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right"> 转出方： </label>
                            <div class="col-sm-4">                      
                              <label class="control-label no-padding-left"><strong>{{ $user->name }}</strong></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right"> 账户余额： </label>
                            <div class="col-sm-4">                      
                              <label class="control-label no-padding-left green"><strong>{{ number_format($user->balance, 2) }}</strong></label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="password2"> *二级密码： </label>
                            <div class="col-sm-2">
                              <input type="password" class="form-control" id="password2" name="password2" value="{{ Input::old('password2') }}" data-rel="tooltip-name" title="二级密码" data-placement="bottom" placeholder="二级密码"/>
                            </div> 
                            <div class="col-sm-3">                      
                              {{ $errors->first('password2', '<label class="help-block red">:message</label>') }}
                            </div>
                          </div>
                         

                          <h5 class="header smaller lighter blue">转入方</h5> 

                          <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="login"> *对方帐号： </label>
                            <div class="col-sm-3">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="blue fa fa-tag"></i></span>
                                <input type="text" class="form-control" id="login" name="login" value="{{ Input::old('login') }}" data-rel="tooltip-name" title="对方帐号" data-placement="bottom" placeholder="对方帐号" />                        
                              </div>
                            </div>
                            <div class="col-sm-3">                      
                              {{ $errors->first('login', '<label class="help-block red">:message</label>') }}
                            </div>
                          </div>  

                          <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="name"> *对方姓名： </label>
                            <div class="col-sm-3">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="blue fa fa-user"></i></span>
                                <input type="text" class="form-control" id="name" name="name" value="{{ Input::old('name') }}" data-rel="tooltip-name" title="对方姓名" data-placement="bottom" placeholder="对方姓名" />                        
                              </div>
                            </div>
                            <div class="col-sm-3">                      
                              {{ $errors->first('name', '<label class="help-block red">:message</label>') }}
                            </div>
                          </div>                           
                          

                          <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="amount"> *转出金额： </label>
                            <div class="col-sm-3">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="blue fa fa-jpy"></i></span>
                                <input type="text" class="form-control" id="amount" name="amount" value="{{ Input::old('amount') }}" data-rel="tooltip-name" title="转出金额不能超过本人账户余额" data-placement="bottom" placeholder="转出金额"/>                        
                              </div>
                            </div>
                            <div class="col-sm-3">                      
                              {{ $errors->first('amount', '<label class="help-block red">:message</label>') }}
                            </div>
                          </div>                  

                          <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right" for="memo"> 备注： </label>
                            <div class="col-sm-4">
                              <textarea class="form-control" rows="4" id="memo" name="memo" value="{{ Input::old('memo') }}" placeholder="备注信息"></textarea>                      
                            </div>                    
                          </div>

                      </form>   

                      <div class="space-12"></div>

                        <div class="clearfix form-group">
                        <div class="col-md-offset-4 col-md-9">
                         <button class="btn btn-info" id="bootbox-confirm">
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


                      <div id="deposits" class="tab-pane">
                        <table id="records-table" class="table table-hover">
                          <thead>
                            <tr>
                              <th>转账日期</th>
                              <th>对方姓名</th>
                              <th class="hidden-480">类型</th>
                              <th>金额</th> 
                              <th class="hidden-480">状态</th>
                              <th class="hidden-480">备注</th>
                            </tr>
                          </thead>

                          <tbody>
                            @foreach ($records as $record)
                              
                            <tr>                         
                              <td>{{ date('Y-m-d',$record->date) }}</td>
                              <td>{{ $record->buser->name }}</td>
                              <td class="hidden-480">                                
                                @if (($record->type) == 6)
                                  内部转入
                                @elseif (($record->type) == 7)
                                  内部转出
                                @endif
                              </td>
                              <td>
                                @if (($record->flag) == 1)
                                  <span class="green">+{{ number_format($record->amount,2) }}</span>
                                @elseif (($record->flag) == 0)
                                  <span class="red">-{{ number_format($record->amount,2) }}</span>
                                @endif
                              </td>                             
                               
                              <td class="hidden-480">
                                @if (($record->status) == 1 )
                                  <span class="green">转账成功</span>
                                @elseif (($record->status) == 0 )
                                  <span class="red">转账失败</span>
                                @endif
                              </td>
                              <td class="hidden-480"></td>                       
                              
                            </tr>
                             
                            @endforeach

                            
                          </tbody>
                        </table>
                      </div>
                      
                    </div>
                  </div>               

            
              <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          
          
        </div><!-- /.page-content -->
      </div><!-- /.main-content -->

@stop


@section('javascript')
{{HTML::script('/assets/js/bootbox.min.js')}}

    <script type="text/javascript">
      
      jQuery(function($) {
           
        $('[data-rel=tooltip-name]').tooltip({container:'body'});
        $('[data-rel=tooltip-code]').tooltip({container:'body'});
        $('[data-rel=tooltip-cellphone]').tooltip({container:'body'});
        
        /*$("#bootbox-confirm").on(ace.click_event, function() {
          bootbox.confirm("确认提交转账申请?", function(result) {
            if (result) {
              $("#form-transfer").submit();
            } 
          });
        });*/
        $("#bootbox-confirm").on(ace.click_event, function() {
            var login = $("#login").val();
            var name = $("#name").val();            
            var cost = $("#amount").val();
            var amount = parseFloat(cost).toFixed(2);
            bootbox.confirm({
              message: '<h3 class="header smaller lighter red">转账确认</h3>\
                      <form class="form-horizontal">\
                        <div class="form-group">\
                          <label class="col-sm-4 control-label no-padding-right"> 对方帐号： </label>\
                            <div class="col-sm-4"><label class="control-label no-padding-left"><strong>'+login+'</strong></label>\
                          </div>\
                        </div>\
                        <div class="form-group">\
                          <label class="col-sm-4 control-label no-padding-right"> 对方姓名： </label>\
                            <div class="col-sm-4"><label class="control-label no-padding-left"><strong>'+name+'</strong></label>\
                          </div>\
                        </div>\
                        <div class="form-group">\
                          <label class="col-sm-4 control-label no-padding-right"> 转出金额： </label>\
                            <div class="col-sm-4"><label class="control-label no-padding-left green"><strong>'+amount+'</strong></label>\
                          </div>\
                        </div>\
                        </form>',
              buttons: {
                confirm: {
                 label: "确定提交",
                 className: "btn-danger btn-sm",
                },
                cancel: {
                 label: "取消",
                 className: "btn-sm",
                }
              },
              callback: function(result) {
                if(result) 
                  $("#form-transfer").submit();
                }
              }
            );
          });
       
      })

    </script>

   
@stop