@extends('layout.default')

@section('layout.content')

   <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              订购系统
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                首单调整
              </small>
            </h1>
          </div><!-- /.page-header -->
          

          <div class="row">
            <div class="col-xs-12">              
              <!-- PAGE CONTENT BEGINS -->     
              @include('flash::message')          
               
                <div class="tabbable">
                  <ul class="nav nav-tabs" id="myTab">

                    <li class="active">
                      <a data-toggle="tab" href="#express">
                        <i class="red ace-icon fa fa-sign-in bigger-120"></i>
                        首单未消费
                      </a>
                    </li>

                    <li>
                      <a data-toggle="tab" href="#shop">
                        <i class="green ace-icon fa fa-check-square-o bigger-120"></i>
                        首单已消费
                        <!--<span class="badge badge-danger">4</span>-->
                      </a>
                    </li>

                    
                  </ul>

                  <div class="tab-content">
                    <div id="express" class="tab-pane in active">
                      <form id="formOrder" method="post">
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"/>
                        <input type="hidden" name="id" id="id" value="">
                        <table id="records-table" class="table table-hover {{ Config::get('view.table-border', '') }}">
                          <thead>
                            <tr>                      
                              <th>姓名</th>
                              <th>帐号</th>                          
                              <th>类型</th>
                              <th>开户日期</th>
                              <th>余额</th>
                              <th>推荐人</th>
                              <th></th>
                            </tr>
                          </thead>

                          <tbody>
                            @foreach ($users as $user)
                            <tr>                    
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->login }}</td>
                              <td>
                                {{ $user->present()->userType }}
                              </td>
                              <td>{{ date('Y-m-d',$user->date) }}</td>
                              <td>{{ number_format($user->balance,2) }}</td>                          
                              <td>
                                {{$user->userReferee->name}}
                              </td>
                                                     
                              <td>
                                <button type="button" id="first{{$user->id}}" class="btn btn-primary btn-minier" >调整</button>                            
                              </td>
                            </tr>
                            @endforeach                            
                          </tbody>                       
                        </table>
                      </form>
                    </div>

                    <div id="shop" class="tab-pane">
                      <table id="records-table2" class="table table-hover {{ Config::get('view.table-border', '') }}">
                        <thead>
                          <tr>
                            <th>姓名</th>
                              <th>帐号</th>                          
                              <th>类型</th>
                              <th>开户日期</th>
                              <th>余额</th>
                              <th>推荐人</th>
                          </tr>
                        </thead>

                        <tbody>
                            @foreach ($fusers as $user)
                            <tr>                    
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->login }}</td>
                              <td>{{$user->present()->userType}}</td>
                              <td>{{ date('Y-m-d',$user->date) }}</td>
                              <td>{{ number_format($user->balance,2) }}</td>                          
                              <td>
                                {{$user->userReferee->name}}
                              </td>
                              
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
{{HTML::script('assets/js/jquery.dataTables.min.js')}}
{{HTML::script('assets/js/jquery.dataTables.bootstrap.js')}}
{{HTML::script('/assets/js/bootbox.min.js')}}

    <script type="text/javascript">      

      jQuery(function($) {

        $("button").click(function(){            
            var id = $(this).attr("id");
            var value = id.replace(/[^0-9]/ig,'');          
            if(id.match('first')){              
              document.getElementById("id").value= value;              
              $("#formOrder").attr("action","{{route('ho.indent.checkfirst')}}");              
              $("#formOrder").submit();            
            }                    
        });

        var oTable1 = 
        $('#records-table').dataTable( {
          bAutoWidth: false,
          "aoColumns": [            
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },          
            { "bSortable": false }           
          ],
      
          "iDisplayLength": 10
        });

        
        var oTable2 = 
        $('#records-table2').dataTable( {
          bAutoWidth: false,
          "aoColumns": [            
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },          
            { "bSortable": false }           
          ],
      
          "iDisplayLength": 10
        });

        
      
      })

    </script>

@stop