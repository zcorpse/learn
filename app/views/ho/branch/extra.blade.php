@extends('layout.default')

@section('layout.content')

   <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              分公司管理
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                分公司列表
              </small>
            </h1>
          </div><!-- /.page-header -->
          

          <div class="row">
            <div class="col-xs-12">              
              <!-- PAGE CONTENT BEGINS -->     
              <div class="widget-box">
                <div class="widget-header">
                  <h4 class="widget-title">条件查询</h4>
                </div>

                <div class="widget-body">
                  <div class="widget-main">
                    <form action="" method="get" class="form-inline">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="blue fa fa-calendar"></i></span>
                          <input class="form-control date-picker " id="date" name="date" type="text" data-date-format="yyyy-mm-dd" value=""/>
                        </div>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="red fa fa-share"></i></span>
                          <input class="form-control col-xs-2" id="qtr" name="qtr" type="text" placeholder="帐号/手机号码/电子邮件" value=""/>
                        </div>
                        <button type="submit" class="btn btn-purple btn-sm">
                          查询<i class="ace-icon fa fa-search icon-on-right"></i>
                        </button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="space-6"></div>
              <table id="sample-table-2" class="table table-hover {{ Config::get('view.table-border', '') }}">
                <thead>
                  <tr>                                                  
                    <th>名称</th>
                    <th class="hidden-480">帐号</th>
                    <th>区域</th>                          
                    <th class="hidden-480">账户余额</th>  
                    <th>业绩</th>
                    <th>业绩奖</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($branchs as $branch)
                  <tr>
                    <td>{{ $branch->name}}</td>
                    <td class="hidden-480">{{ $branch->login}}</td>
                    <td>{{ $branch->city }}{{ $branch->county }}</td>
                    <td class="hidden-480">{{ number_format($branch->balance,2) }}</td>
                    <td>{{ number_format($branch->yj,2) }}</td>
                    <td><span class="green">{{ number_format($branch->tc,2) }}</span></td>
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

@section('javascript')
{{HTML::script('assets/js/jquery.dataTables.min.js')}}
{{HTML::script('assets/js/jquery.dataTables.bootstrap.js')}}

    
@stop