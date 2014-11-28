@extends('layout.default')

@section('layout.content')

	 <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              业绩管理
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                我的推荐
              </small>
            </h1>
          </div><!-- /.page-header -->

          <div class="row">

            <div class="col-sm-6 col-sm-offset-3">              
              <!-- PAGE CONTENT BEGINS -->
                
                <table id="records-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>姓名</th>                          
                      <th>类型</th>
                      <th>联系电话</th>
                      
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($referees as $referee)
                    <tr>
                      <td>{{ $referee->referee->name }}</td>
                      <td>{{ $referee->referee->present()->userType}}</td>  
                      <td>{{ $referee->referee->mobile }}</td>  
                                        
                      
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

