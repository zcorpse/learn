@extends('layout.default')

@section('layout.content')

	 <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              人员结构
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                查询结果
              </small>
            </h1>
          </div><!-- /.page-header -->

          <div class="row">

            <div class="col-sm-6 col-sm-offset-3">              
              <!-- PAGE CONTENT BEGINS -->
                
                <table id="records-table" class="table table-hover {{ Config::get('view.table-border', '') }}">
                  <thead>
                    <tr>
                      <th>姓名</th>                          
                      <th>类型</th>
                      <th>账户余额</th>
                      <th>推荐人</th>
                    </tr>
                  </thead>

                  <tbody>                   
                    <tr>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->present()->userType }}</td>  
                      <td>{{ number_format($user->balance ,2) }}</td>
                      <td>{{ $user->userReferee->name }}</td> 
                     
                    </tr>
                  </tbody>
                </table> 

                <table id="records-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>                      
                      <th>姓名</th>                          
                      <th>领导奖1</th>
                      <th>领导奖2</th>
                      <th>领导奖3</th>
                    </tr>
                  </thead>

                  <tbody> 
                    <tr> 
                      <td>{{ $user->name }}</td>
                    @foreach ($referees as $referee)
                      <td>{{ $referee->name }}</td>  
                    @endforeach
                    </tr>
                  </tbody>
                </table>

                <table id="records-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>                      
                      <th>姓名</th>                          
                      <th>重消奖1</th>
                      <th>重消奖2</th>
                      <th>重消奖3</th>
                    </tr>
                  </thead>

                  <tbody> 
                    <tr> 
                      <td>{{ $user->name }}</td>
                    @foreach ($bouns as $boun)
                      <td>{{ $boun->name }}</td>  
                    @endforeach
                    </tr>
                  </tbody>
                </table>
            
              <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->

          
            
          </div><!-- /.row -->

         

        </div><!-- /.page-content -->
      </div><!-- /.main-content -->

@stop

