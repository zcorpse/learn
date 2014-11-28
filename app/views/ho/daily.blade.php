@extends('layout.default')

@section('layout.content')

	 <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              帐务结算
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                结算批处理
              </small>
            </h1>
          </div><!-- /.page-header -->

          <div class="row">
            <div class="col-xs-12">
              <!-- PAGE CONTENT BEGINS -->
              @include('flash::message')

              <!-- PAGE CONTENT BEGINS -->               
               <form class="form-horizontal" method="post" action="" autocomplete="off">                
               
                  <!-- #section:elements.form -->
                  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                  
                  <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right"> 帐务日期： </label>
                    <div class="col-sm-4">                      
                      <label class="control-label no-padding-left"><strong>{{ $sysdate }}</strong></label>
                    </div>                                     
                    
                  </div>


                  <div class="space-12"></div>
                  @if ($isSettle)
                  <div class="clearfix form-group">
                    <div class="col-md-offset-4 col-md-9">
                      <button class="btn btn-info" type="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        确定
                      </button>
                      &nbsp; &nbsp; &nbsp;&nbsp;
                      <button class="btn" type="reset">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        取消
                      </button>
                    </div>
                  </div>
                  @endif

              </form>           

              <div class="space-6"></div>

              <h5 class="header lighter blue">
              当天应结算流水一览
              </h5>
                <table id="sample-table-2" class="table table-bordered table-hover">
                      <thead>
                        <tr>                          
                          <th>日期</th>
                          <th>姓名</th>                          
                          <th>基数</th>                          
                          <th>类型</th>             
                          <th>发生额</th>
                          <th>状态</th>
                          <th>备注</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                        @foreach ($records as $record)
                        <tr>       
                          <td>{{ date('Y-m-d H:i:s',$record->date) }}</td>                   
                          <td>{{ $record->user->name }}</td>                          
                          <td>{{ number_format($record->cost,2) }}</td>
                          <td>{{ $record->present()->recordType }}</td>                          
                          <td>{{ $record->present()->recordFlag($record->amount) }}</td>
                          <td>{{ $record->present()->recordStatus }}</td>
                          <td>
                            @if ($record->uid != $record->bid)
                              【{{$record->buser->name}}】
                            @endif
                          </td>
                        </tr>
                        @endforeach
                        
                        
                      </tbody>
                    </table>

              <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.page-content -->
      </div><!-- /.main-content -->

@stop