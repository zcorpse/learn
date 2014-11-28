@extends('layout.default')

@section('layout.content')

	 <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              业绩管理
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                业绩查看
              </small>
            </h1>
          </div><!-- /.page-header -->

          <div class="row">

            <div class="col-sm-6 col-sm-offset-3">              
              <!-- PAGE CONTENT BEGINS -->
                <h3 class="header smaller lighter blue">
                  <small>个人业绩</small>
                </h3>
                <table id="records-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>业绩</th>                          
                      <th>直推奖</th>
                      <th>领导奖</th>
                      <th>重消奖</th>
                    </tr>
                  </thead>

                  <tbody>
                    
                    <tr>
                      <td>{{ number_format($kh,2) }}</td>
                      <td>{{ number_format($zt,2) }}</td>  
                      <td>{{ number_format($ld,2) }}</td>  
                      <td>{{ number_format($cx,2) }}</td>                    
                      
                    </tr>
                    
                  </tbody>
                </table> 
            
              <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->

          
            
          </div><!-- /.row -->
          

        </div><!-- /.page-content -->
      </div><!-- /.main-content -->

@stop

