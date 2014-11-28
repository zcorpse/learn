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
              @include('flash::message')     
               <!-- <div class="dataTables_borderWrap"> -->
                  <form method="post" action="">
                    <table id="sample-table-2" class="table table-hover {{ Config::get('view.table-border', '') }}">
                      <thead>
                        <tr>                                                  
                          <th>名称</th>
                          <th class="hidden-480">帐号</th>
                          <th>区域</th>                          
                          <th class="hidden-480">账户余额</th>  
                          <th>业绩</th>
                          <th>直推奖</th>
                          <th>领导奖</th>
                          <th>重消奖</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach ($branchs as $branch)
                        <tr>
                          <td>{{ $branch->name}}</td>
                          <td class="hidden-480">{{ $branch->login}}</td>
                          <td>{{ $branch->province }}{{ $branch->city }}{{ $branch->county }}</td>
                          <td class="hidden-480">{{ number_format($branch->balance,2) }}</td>
                          <td>{{ number_format($branch->kh,2) }}</td>
                          <td>{{ number_format($branch->zt,2) }}</td>
                          <td>{{ number_format($branch->ld,2) }}</td>
                          <td>{{ number_format($branch->cx,2) }}</td>
                        </tr>  
                        @endforeach                      
                      </tbody>
                    </table>

               </form>
                

            
              <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </div><!-- /.page-content -->
      </div><!-- /.main-content -->
@stop

@section('javascript')
{{HTML::script('assets/js/jquery.dataTables.min.js')}}
{{HTML::script('assets/js/jquery.dataTables.bootstrap.js')}}

    <script type="text/javascript">
      jQuery(function($) {
        var oTable1 = 
        $('#sample-table-2')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .dataTable( {
          bAutoWidth: false,         
            
          "aoColumns": [            
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },          
            { "bSortable": false }           
          ]
      
          
          //,
          //"sScrollY": "200px",
          //"bPaginate": false,
      
          //"sScrollX": "100%",
          //"sScrollXInner": "120%",
          //"bScrollCollapse": true,
          //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
          //you may want to wrap the table inside a "div.dataTables_borderWrap" element
      
          //"iDisplayLength": 50
          } );
        
      
      
        $(document).on('click', 'th input:checkbox' , function(){
          var that = this;
          $(this).closest('table').find('tr > td:first-child input:checkbox')
          .each(function(){
            this.checked = that.checked;
            $(this).closest('tr').toggleClass('selected');
          });
        });
           
        
      
      })
    </script>
@stop