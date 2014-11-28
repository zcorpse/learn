@extends('layout.default')

@section('layout.content')

   <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              订单管理
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                首单调整
              </small>
            </h1>
          </div><!-- /.page-header -->
         

          <div class="row">
            <div class="col-xs-12">              
              <!-- PAGE CONTENT BEGINS -->     
              @include('layout.notification')          
               <!-- <div class="dataTables_borderWrap"> -->
               <form method="post" action="" id="formOrder">
                    <input type="hidden" name="id" id="id" value="">
                    <table id="sample-table-2" class="table table-hover" style=" table-layout:fixed;">
                      <thead>
                        <tr>                      
                          <th class="text-center" style="width:80px;">姓名</th>
                          <th class="text-center" style="width:90px;">帐号</th>                          
                          <th class="text-center" style="width:80px;">类型</th>
                          <th class="text-center" style="width:110px;">开户日期</th>
                          <th class="text-right" style="width:90px;">开户金额</th>
                          <th class="text-center" style="width:100px;">推荐人</th>
                          <th class="text-center" style="width:100px;">接收人</th>
                          <th class="text-center" style="width:110px;"></th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach ($users as $user)
                        <tr>                    
                          <td class="text-center">
                            <a href="">{{ $user->name }} </a>
                          </td>
                          <td class="text-center">{{ $user->login }}</td>
                          <td class="text-center ">
                            @if ($user->type == 1)
                              股东
                            @elseif ($user->type == 2)
                              会员
                            @endif
                          </td>
                          <td class="text-center">{{ date('Y-m-d',$user->date) }}</td>
                          <td class="text-right ">{{ number_format($user->account->balance,2) }}</td>                          
                          <td class="text-center ">
                            {{$user->referee->puser->name}}
                          </td>
                          <td class="text-center ">
                            {{$user->accepter->puser->name}}
                              @if ($user->accepter->quarter == 1)
                                A区
                              @elseif ($user->accepter->quarter == 2)
                                B区
                              @endif
                          </td>                          
                          <td class="text-center">
                            <button type="button" id="first{{$user->id}}" class="btn btn-warning btn-minier" >首单已结</button>                            
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
{{HTML::script('/assets/js/bootbox.min.js')}}

    <script type="text/javascript">

      jQuery(function($) {
        
        $("button").on(ace.click_event,function(){            
            var id = $(this).attr("id");
            var value = id.replace(/[^0-9]/ig,'');          
            if(id.match('first')){              
              document.getElementById("id").value= value;
              $("#formOrder").attr("action","{{route('ho.indent.checkfirst')}}");              
              $("#formOrder").submit();            
            }                    
        });
      
       
      
      })

    </script>

@stop