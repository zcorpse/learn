@extends('layout.default')

@section('layout.content')

   <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              家庭超市
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                查看家庭超市
              </small>
            </h1>
          </div><!-- /.page-header -->

          
          <div class="row">
            <div class="col-xs-12">              
              <!-- PAGE CONTENT BEGINS -->     
              @include('flash::message')          
               <!-- <div class="dataTables_borderWrap"> -->
                  <form method="post" action="" id="formActive">
                    <input type="hidden" name="uid" id="uid" value="">
                    <table id="sample-table-2" class="table table-hover {{ Config::get('view.table-border', '') }}">
                      <thead>
                        <tr>                      
                          <th>超市名称</th>
                          <th>帐号</th>
                          <th class="hidden-480">账户余额</th>
                          <th>联系电话</th>
                          <th class="hidden-480">地址</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach ($users as $user)
                        <tr>                    
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->login }}</td>
                          <td class="hidden-480">{{ number_format($user->balance,2) }}</td>                          
                          <td>{{$user->mobile}}</td>
                          <td class="hidden-480">{{$user->address}}</td>                          
                          
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
            if(id.match('edit')){
              window.location.href = "/bo/shop/edit/"+value;
            }                     
        });

      })

    </script>
@stop