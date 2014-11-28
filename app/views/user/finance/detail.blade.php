@extends('layout.default')

@section('layout.content')

	 <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              交易明细
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                个人账户交易明细
              </small>
            </h1>
          </div><!-- /.page-header -->

          <div class="row">
            <div class="col-xs-12">              
              <!-- PAGE CONTENT BEGINS -->

            


                        <table id="records-table" class="table table-hover {{ Config::get('view.table-border', '') }}" >
                          <thead>
                            <tr>
                              <th>日期</th>
                              <th>类型</th>
                              <th>发生额</th>                              
                              <th class="hidden-480">状态</th>
                              <th class="hidden-480">备注</th>
                            </tr>
                          </thead>

                          <tbody>
                            @foreach ($records as $record)
                            <tr>                         
                              <td>{{ date('Y-m-d',$record->date) }}</td>                              
                              <td>{{ $record->present()->recordType }}</td>
                              <td>{{ $record->present()->recordFlag($record->amount) }}</td>
                              <td class="hidden-480">{{ $record->present()->recordStatus }}</td>
                              <td class="hidden-480">
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

@section('javascript')
{{HTML::script('assets/js/jquery.dataTables.min.js')}}
{{HTML::script('assets/js/jquery.dataTables.bootstrap.js')}}

<script type="text/javascript">
      jQuery(function($) {
        var oTable1 = 
        $('#records-table')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .dataTable( {
          bAutoWidth: true,          
            
          "aoColumns": [
            { "bSortable": false },
            { "bSortable": false },         
            { "bSortable": false },
            { "bSortable": false },         
            { "bSortable": false } 
          ],
      
          //"sScrollY": "200px",
          //"bPaginate": false,
      
          //"sScrollX": "100%",
          //"sScrollXInner": "120%",
          //"bScrollCollapse": true,
          //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
          //you may want to wrap the table inside a "div.dataTables_borderWrap" element
      
          //"iDisplayLength": 50
          } );
      
      })
    </script>
@stop