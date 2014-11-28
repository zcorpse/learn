@extends('layout.default')

@section('layout.content')

   <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              产品管理
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                产品列表 
              </small>
            </h1>
          </div><!-- /.page-header -->
          

          <div class="row">
            <div class="col-xs-12">              
              <!-- PAGE CONTENT BEGINS -->     
              @include('layout.notification')          
               <!-- <div class="dataTables_borderWrap"> -->
                  <form method="post" action="" id="formProduct">
                    <input type="hidden" name="uid" id="uid" value="">
                    <table id="sample-table-2" class="table table-hover {{ Config::get('view.table-border', '') }}">
                      <thead>
                        <tr>                                                  
                          <th class="hidden-480">编号</th>
                          <th>名称</th>
                          <th class="hidden-480">系列</th>     
                          <th class="hidden-480">分类</th>                     
                          <th>零售价</th>  
                          <th>会员价</th>
                          <th class="hidden-480">规格</th>
                          <th class="hidden-480">操作</th>
                          <th class="hidden-480">备注</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach ($products as $product)
                        <tr>
                          <td class="hidden-480">{{ $product->code }}</td>
                          <td>
                            @if ($product->badge == 1)
                            <span class="badge badge-yellow">荐</span>
                            @elseif ($product->badge == 2)
                            <span class="badge badge-danger">热</span>
                            @elseif ($product->badge == 3)
                            <span class="badge badge-success">降</span>
                            @endif
                            {{ $product->name }}
                          </td>
                          <td class="hidden-480">{{ $product->category }}</td>
                          <td class="hidden-480">{{ $product->type }}</td>
                          <td>{{ number_format($product->price1,1) }}</td>
                          <td>{{ number_format($product->price2,1) }}</td>
                          <td class="hidden-480">{{ $product->specs }}</td>
                          <td class="hidden-480">
                            <button type="button" id="edit{{$product->id}}" class="btn btn-success btn-minier" >修改</button>
                          </td>
                          <td class="hidden-480">{{ $product->memo }}</td>
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

        $("button").click(function(){            
            var id = $(this).attr("id");
            var value = id.replace(/[^0-9]/ig,'');
            if(id.match('edit')){
              window.location.href = "/ho/product/edit/"+value;
            }
            if(id.match('mark')){
              document.getElementById("id").value= value;
              $("#formProduct").attr("action","{{route('bo.account.active')}}");
              $("#formProduct").submit();
            }            
        });

        
        var oTable1 = 
        $('#sample-table-2').dataTable( {
          bAutoWidth: false,
          "aoColumns": [            
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },          
            { "bSortable": false }           
          ],
      
          "iDisplayLength": 25
        });
        
      
      
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