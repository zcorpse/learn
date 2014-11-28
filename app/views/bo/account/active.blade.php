@extends('layout.default')

@section('layout.content')

   <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              账户管理
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                激活账户
              </small>
            </h1>
          </div><!-- /.page-header -->

          <h5 class="header lighter">
            账户激活说明：             
              <ol>
                <li>新开户的用户均处于未激活状态，需要确认后激活。</li>
                <li>帐号激活激活后，对应推荐人的直推奖金将结算。</li>                
              </ol>
          </h5>

          <div class="row">
            <div class="col-xs-12 table-responsive">              
              <!-- PAGE CONTENT BEGINS -->     
              @include('flash::message') 
               <!-- <div class="dataTables_borderWrap"> -->
                  <form method="post" action="" id="formActive">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <input type="hidden" name="uid" id="uid" value="">
                    <table id="sample-table-2" class="table table-hover {{ Config::get('view.table-border', '') }}">
                      <thead>
                        <tr>                      
                          <th>姓名</th>
                          <th>接收人</th>
                          <th>帐号</th>                          
                          <th>类型</th>
                          <th>开户日期</th>
                          <th>开户金额</th>                          
                          <th></th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach ($users as $user)
                        <tr>                    
                          <td><strong><span class="green">{{ $user->name }}</span></strong></td>
                          <td><strong><span class="red">{{$user->userReferee->name}}</span></strong></td> 
                          <td>{{ $user->login }}</td>
                          <td>{{ $user->present()->userType }}</td>
                          <td>{{ date('Y-m-d',$user->date) }}</td>
                          <td>{{ number_format($user->balance,2) }}</td>                                                    
                          <td>
                            <button type="button" id="modify{{$user->id}}" class="btn btn-danger btn-minier" >修改</button>
                            <button type="button" id="active{{$user->id}}" class="btn btn-success btn-minier" >激活</button>
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
  
   <script type="text/javascript">

      jQuery(function($) { 
        
        $("button").click(function(){            
            var id = $(this).attr("id");
            var value = id.replace(/[^0-9]/ig,'');
            if(id.match('modify')){
              window.location.href = "/bo/account/modify/"+value;
            }
            if(id.match('active')){
              document.getElementById("uid").value= value;
              $("#formActive").attr("action","{{route('bo.account.active')}}");
              $("#formActive").submit();
            }            
        });

      })

    </script>
@stop