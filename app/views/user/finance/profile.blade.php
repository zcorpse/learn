@extends('layout.default')

@section('layout.content')

	 <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              个人账户
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                账户余额
              </small>
            </h1>
          </div><!-- /.page-header -->

         

          <div class="row">

         
            <div class="col-sm-4 col-sm-offset-4">
              <table class="table table-bordered table-hover">
                <tr>
                  <td class="text-right">账户余额</td>
                  <td>{{ number_format($balance->balance + $records,2) }}</td>
                </tr>
                <tr>
                  <td class="text-right">可用余额</td>
                  <td>{{ number_format($balance->balance ,2) }}</td>
                </tr>
                <tr>
                  <td class="text-right">未入账余额</td>
                  <td>{{ number_format($records,2) }}</td>
                </tr>
              </table>
            </div>


          </div><!-- /.row -->
        </div><!-- /.page-content -->
      </div><!-- /.main-content -->

@stop