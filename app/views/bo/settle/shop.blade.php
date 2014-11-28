@extends('layout.default')

@section('layout.content')

   <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              账户结算
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                流水查询
              </small>
            </h1>
          </div><!-- /.page-header -->

          <div class="row">
            

            <div class="col-xs-12">
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

                      <button type="submit" class="btn btn-purple btn-sm">
                        查询<i class="ace-icon fa fa-search icon-on-right"></i>
                      </button>


                    </form>
                  </div>
                </div>
              </div>

             </div>


           <div class="space-6"></div>
                
            <div class="col-xs-12 table-responsive">              
              <!-- PAGE CONTENT BEGINS -->     
              @include('layout.notification')          
               <!-- <div class="dataTables_borderWrap"> -->
                    <table id="sample-table-2" class="table table-hover {{ Config::get('view.table-border', '') }}">
                      <thead>
                        <tr>                          
                          <th>日期</th>
                          <th>家庭超市名称</th>                          
                          <th class="hidden-480">基数</th>                          
                          <th>类型</th>             
                          <th>发生额</th>
                          <th class="hidden-480">状态</th>
                          <th class="hidden-480">备注</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      @if (!is_null($records))
                        @foreach ($records as $record)
                        <tr>       
                          <td>{{ date('Y-m-d',$record->date) }}</td>                   
                          <td>{{ $record->user->name }}</td>                          
                          <td class="hidden-480">                            
                            {{ number_format($record->cost,2) }}</td>
                          </td>
                          <td>{{ $record->present()->recordType }}</td>                         
                          <td class="text-right">{{ $record->present()->recordFlag($record->amount) }}</td>
                          <td class="hidden-480">{{ $record->present()->recordStatus }}</td>
                          <td class="hidden-480">
                            @if ( $record->buser->id != $record->user->id)
                            【{{ $record->buser->name }}】
                            @endif
                          </td>
                        </tr>
                        @endforeach
                        @endif
                        
                      </tbody>
                    </table>
                                
                

            
              <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </div><!-- /.page-content -->
      </div><!-- /.main-content -->
@stop





@section('javascript')
{{HTML::script('assets/js/bootstrap-datepicker.min.js')}}
{{HTML::script('assets/js/bootstrap-datepicker.zh-CN.js')}}
{{HTML::script('assets/js/jquery.dataTables.min.js')}}
{{HTML::script('assets/js/jquery.dataTables.bootstrap.js')}}

  <script type="text/javascript">
        $('#date').datepicker({
          autoclose: true,
          todayHighlight: true,
          language: 'zh-CN'
        })
  </script>  

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
          ],
      
          
          //,
          //"sScrollY": "200px",
          //"bPaginate": false,
      
          //"sScrollX": "100%",
          //"sScrollXInner": "120%",
          //"bScrollCollapse": true,
          //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
          //you may want to wrap the table inside a "div.dataTables_borderWrap" element
      
          "iDisplayLength": 50

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