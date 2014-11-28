@extends('layout.default')

@section('layout.content')

   <div class="main-content">
       
        <div class="page-content">
        
          <div class="page-header">
            <h1>
              个人信息
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                快速浏览
              </small>
            </h1>
          </div><!-- /.page-header -->

          <div class="row">
            <div class="col-xs-12">
              @include('flash::message')
            </div>
            <div class="col-xs-12 col-sm-3 center">                                                       
              
            </div><!-- /.col -->
            @if ($user->flag == 0)
            <div class="col-xs-12 col-sm-9">              

              <div class="profile-user-info">

                <div class="profile-info-row">
                  <div class="profile-info-name">                    
                      姓名：
                  </div>
                  <div class="profile-info-value">
                    <span>{{$user->name}}</span>
                  </div>
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name">                    
                      帐号：
                  </div>
                  <div class="profile-info-value">
                    <span>{{$user->login}}</span>
                  </div>
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name">
                    邀请码：
                  </div>
                  <div class="profile-info-value">
                    <span class="label label-danger arrowed">{{$user->code}}</span>
                  </div>
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name">
                    类型：
                  </div>
                  <div class="profile-info-value">
                    <span>{{$user->present()->userType}}</span>
                  </div>
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name">
                    账户余额：
                  </div>
                  <div class="profile-info-value">
                    <span>{{ number_format($user->balance,2) }}</span>
                  </div>
                </div>
                

              </div>  

              <div class="space-12"></div>

            </div><!-- /.col -->
            @endif
            
          </div><!-- /.row -->
        </div><!-- /.page-content -->
      </div><!-- /.main-content -->

@stop


