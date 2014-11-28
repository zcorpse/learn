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
                          <th class="hidden-480">手机号码</th>
                          <th class="hidden-480">登记日期</th>
                          <th>区域</th>
                          <th>账户余额</th>  
                          <th class="hidden-480">操作</th>                        
                          <th class="hidden-480">备注</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach ($users as $user)
                        <tr>                                              
                          <td>
                            <a href="">{{ $user->name }} </a>
                          </td>
                          <td class="hidden-480">{{ $user->login }}</td>
                          <td class="hidden-480">{{ $user->mobile }}</td>
                          <td class="hidden-480">{{ date('Y-m-d',$user->date) }}</td>
                          <td>{{ $user->province }}{{ $user->city }}{{ $user->county }}</td>
                          <td>{{ number_format($user->balance,2) }}</td>
                          <td class="hidden-480"><a href="">编辑</a></td>
                          <td class="hidden-480"> 
                            {{ $user->memo }}                                                 
                          </td>
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
          "aaSorting": [            
            [ 3, "desc" ]
            ],
            
          "aoColumns": [            
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            null, 
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