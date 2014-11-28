
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>合力业务管理系统</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/css/font-awesome.min.css" />		

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="../assets/css/ace.onpage-help.css" />

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="../assets/js/html5shiv.js"></script>
		<script src="../assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h2>
									<img src="/assets/images/logo1.png">
								</h2>
								<!--<h4 class="blue" id="id-company-text">&copy; Company Name</h4>-->
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								

								<div id="signup-box" class="signup-box widget-box visible no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="ace-icon fa fa-user green"></i>
												新用户注册
											</h4>

											<div class="space-6"></div>
											@include('flash::message')

											<form class="form-horizontal" method="post" id="register" action="{{route('default.register')}}"  autocomplete="off">
												<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"/>

											  <div class="form-group">
											    <label for="email" class="col-sm-4 control-label">电子邮箱：</label>
											    <div class="col-sm-8">
											      <input type="text" id="email" name="email" class="form-control" value="{{ Input::old('email') }}" placeholder="电子邮箱">
											      	<div>                      
								                      {{ $errors->first('email', '<label class="help-block red">:message</label>') }}
								                    </div>
											    </div>											    
											  </div>

											  <div class="form-group">
											    <label for="name" class="col-sm-4 control-label">姓名：</label>
											    <div class="col-sm-4">
											      <input type="text" id="name" name="name" class="form-control" value="{{ Input::old('name') }}" placeholder="姓名">
											      	<div>                      
								                      {{ $errors->first('name', '<label class="help-block red">:message</label>') }}
								                    </div>
											    </div>
											  </div>

											  <div class="form-group">
											    <label for="password" class="col-sm-4 control-label">密码：</label>
											    <div class="col-sm-8">
											      <input type="password" id="password" name="password" class="form-control" placeholder="密码">
											      	<div>                      
								                      {{ $errors->first('password', '<label class="help-block red">:message</label>') }}
								                    </div>
											    </div>
											  </div>

											  <div class="form-group">
											    <label for="password_confirmation" class="col-sm-4 control-label">密码确认：</label>
											    <div class="col-sm-8">
											      <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="密码确认">
											      	<div>                      
								                      {{ $errors->first('password_confirmation', '<label class="help-block red">:message</label>') }}
								                    </div>
											    </div>
											  </div>

											  <div class="form-group">
											    <label for="idcard" class="col-sm-4 control-label">身份证：</label>
											    <div class="col-sm-8">
											      <input type="text" id="idcard" name="idcard" class="form-control" value="{{ Input::old('idcard') }}" placeholder="身份证">
											      	<div>                      
								                      {{ $errors->first('idcard', '<label class="help-block red">:message</label>') }}
								                    </div>
											    </div>
											  </div>

											  <div class="form-group">
											    <label for="mobile" class="col-sm-4 control-label">手机号码：</label>
											    <div class="col-sm-6">
											      <input type="text" id="mobile" name="mobile" class="form-control" value="{{ Input::old('mobile') }}" placeholder="手机号码">
											      	<div>                      
								                      {{ $errors->first('mobile', '<label class="help-block red">:message</label>') }}
								                    </div>
											    </div>
											  </div>

											  <div class="form-group">
											    <label for="inputPassword3" class="col-sm-4 control-label">注册区域：</label>
											    <div class="col-sm-8">
											      {{ Form::select('region', $regions,'', array('class' => 'form-control')) }}
											    </div>
											    	<div>                      
								                      {{ $errors->first('region', '<label class="help-block red">:message</label>') }}
								                    </div>
											  </div>

											  <div class="form-group">
											    <label for="code" class="col-sm-4 control-label">邀请码：</label>
											    <div class="col-sm-4 col-xs-6">											    	
											      <input type="text" id="code" name="code" class="col-sm-3 form-control" value="{{ Input::old('code') }}" placeholder="邀请码">											      	
											      	<div>                      
								                      {{ $errors->first('code', '<label class="help-block red">:message</label>') }}
								                    </div>
											    </div>
											    <div class="cos-sm-4">
											    	<button type="button" id="invate" class="btn btn-sm btn-warning no-border">
													<span class="bigger-110">系统指定</span>													
												  </button>
											    </div>

											  </div>
											  
											  <div class="form-group">
											    <div class="col-sm-offset-2 col-sm-10">
											      <button type="submit" id="submit" class="width-50 pull-right btn btn-sm btn-success">
													<span class="bigger-110">注册</span>
													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												  </button>
											    </div>
											  </div>

											</form>
										</div>

										

										<div class="toolbar clearfix">
											<div>
												<a href="/" class="back-to-login-link">
													<i class="ace-icon fa fa-reply"></i>
													<span class="bigger-110">返回登录</span>
												</a>
											</div>

											<div>
												<a href="{{route('default.sendemail')}}" class="user-signup-link">
													<span class="bigger-110">重发验证邮件</span>
													<i class="ace-icon fa fa-retweet"></i>
												</a>
											</div>
										</div>

									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->

							
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->


	<!-- basic scripts -->
    <script src="/assets/js/jquery.min.js"></script>

    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>    


		<!-- inline scripts related to this page -->
		<script type="text/javascript">			
			
		jQuery(function($) {
			$("#invate").on('click',function(e){ 
				e.preventDefault();
				
	              $.ajax({     
	                  url:'{{route('default.invate')}}',     
	                  type:'post', 
	                  data:{_token:$("#_token").val()},                   
	                  dataType: "json", 
	                  complete:function(data){
	                    //alert(data.responseText);
	                    jsonData = eval("("+data.responseText+")");                    
	                	$('#code').attr("value",jsonData.code);
	                    return false;
	                  }  
	              }); 	                              
	        });

		})	
		</script>
	</body>
</html>
