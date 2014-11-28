@extends('layout.default')

@section('layout.content')

   <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              人员结构
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                人员区域调整
              </small>
            </h1>
          </div><!-- /.page-header -->
         

          <div class="row">
            <div class="col-xs-12">              
              <!-- PAGE CONTENT BEGINS -->     
              @include('flash::message')    
               <!-- <div class="dataTables_borderWrap"> -->
               <form id="form-transfer" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="uid" id="uid" value="">
                <input type="hidden" name="region" id="region" value="">
                  <div class="tabbable tabs-left">
                    <ul class="nav nav-tabs" id="myTab3">
                      @foreach ($regions as $key => $region)
                      <li class="{{ $key == $setkey ? 'active':'' }}" >
                        <a data-toggle="tab" href="#region{{$region->id}}">
                          <i class="green ace-icon fa fa-hand-o-right bigger-110"></i>
                          {{$region->county}}
                        </a>
                      </li>
                      @endforeach                     

                    </ul>

                    <div class="tab-content">                      
                      @foreach ($regions as $key => $region)
                      <div id="region{{$region->id}}" class="tab-pane {{ $key == $setkey ? 'in active':'' }}">
                        <table id="table{{$region->id}}" class="table table-hover {{ Config::get('view.table-border', '') }}">

                          <thead>
                            <tr>            
                              <th>姓名</th>
                              <th>推荐人</th>
                              <th class="hidden-480">帐号</th>                              
                              <th>类型</th>                              
                              <th>邀请码</th>
                              <th>操作</th>
                            </tr>
                          </thead>

                          <tbody>
                            @foreach ($users as $user)
                            @if ($user->region == $region->id)
                            <input type="hidden" class="hide" id="oregion{{ $user->id }}" urid="{{$user->region}}" urname="{{$region->county}}"/>
                            <tr>
                              
                              <td id="oname{{ $user->id }}">{{ $user->name }}</td>
                              <td>{{$user->userReferee->name}}</td>
                              <td class="hidden-480">{{ $user->login }}</td>
                              <td>{{ $user->present()->userType }}</td> 
                              <td>{{$user->code}}</td>                              
                              <td>
                                <button type="button" id="adjust{{$user->id}}" class="btn btn-danger btn-minier" >调整</button> 
                              </td>                      
                            </tr>
                            @endif
                            @endforeach
                          </tbody> 
                        </table>
                        
                      </div>
                      @endforeach                       
                    </div>
                  </div>
                
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
{{HTML::script('/assets/js/bootbox.min.js')}}

    <script type="text/javascript">

      jQuery(function($) {         
      
        

        $("button").on(ace.click_event, function(){            
            var id = $(this).attr("id");
            var value = id.replace(/[^0-9]/ig,'');            
            var oname = $("#oname"+value).text();
            var urid = $("#oregion"+value).attr('urid');
            var urname = $("#oregion"+value).attr('urname');

            
            if(id.match('adjust')){
              bootbox.confirm({
                message: '<h3 class="header smaller lighter red">区域调整确认</h3>\
                        <form class="form-horizontal">\
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>\
                          <div class="form-group">\
                            <label class="col-sm-4 control-label no-padding-right"> 姓名： </label>\
                              <div class="col-sm-4"><label class="control-label no-padding-left"><strong>'+oname+'</strong></label>\
                            </div>\
                          </div>\
                          <div class="form-group">\
                            <label class="col-sm-4 control-label no-padding-right"> 原所属区域： </label>\
                              <div class="col-sm-4"><label class="control-label no-padding-left"><strong>'+urname+'</strong></label>\
                            </div>\
                          </div>\
                          <div class="form-group">\
                            <label class="col-sm-4 control-label no-padding-right"> 新调整区域： </label>\
                              <div class="col-sm-4">\
                              {{ Form::select("regionid",  $regionlist,'', array("class" => "form-control","id"=>"regionid")) }} \
                            </div>\
                          </div></form>',
                buttons: {
                  confirm: {
                   label: "确定调整",
                   className: "btn-danger btn-sm",
                  },
                  cancel: {
                   label: "取消",
                   className: "btn-sm",
                  }
                },
                callback: function(result) {
                  if(result) {
                      document.getElementById("uid").value = value;
                      document.getElementById("region").value = $("#regionid").val();                    
                      $("#form-transfer").submit();
                    }else
                      return;
                  }

                }
              );
            }
                      
        });

        //var oTable2 = 
        $('table').dataTable( {
          bAutoWidth: false,            
          "aoColumns": [           
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },          
            { "bSortable": false }           
          ],
          "iDisplayLength": 25
          } );

      })

    </script>

@stop