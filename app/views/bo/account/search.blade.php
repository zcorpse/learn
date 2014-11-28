@extends('layout.default')

@section('layout.content')

   <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              账户管理
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                用户查询
              </small>
            </h1>
          </div><!-- /.page-header -->

          <div class="row">
                
            <div class="col-xs-12 table-responsive">
              <!-- PAGE CONTENT BEGINS -->     
              @include('layout.notification')          
               <!-- <div class="dataTables_borderWrap"> -->
                    <table id="sample-table-2" class="table table-hover {{ Config::get('view.table-border', '') }}">
                      <thead>
                        <tr>                          
                          <th>姓名</th>
                          <th class="hidden-480">帐号</th>                          
                          <th class="hidden-480">手机号码</th>
                          <th class="hidden-480">注册日期</th>
                          <th>余额</th>
                          <th>推荐人</th>
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
                          <td>{{ number_format($user->balance,2) }}</td> 
                          <td>
                           {{$user->userReferee->name}}   
                          </td>
                          <td class="hidden-480"> 
                            {{ $user->memo }}                                                 
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
           
        $('[data-rel=tooltip-name]').tooltip({container:'body'});
        $('[data-rel=tooltip-code]').tooltip({container:'body'});
        $('[data-rel=tooltip-cellphone]').tooltip({container:'body'});
      
      })

    </script>

   
@stop