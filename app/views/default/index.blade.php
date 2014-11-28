
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
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee blue"></i>
												用户登录
											</h4>

											<div class="space-6"></div>
											@include('flash::message')
							
											<form class="form-horizontal" method="post" action="{{route('login')}}"  autocomplete="off">
												<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
												<fieldset>
													<label class="block clearfix">
														<div class="input-group">
                        									<span class="input-group-addon"><i class="blue fa fa-user"></i></span>
															<input type="text" name="login" id="login" class="form-control" value="{{Input::old('login')}}" placeholder="用户名" tabindex="1"/>
														</div>
														<div class="col-sm-6">                      
							                              {{ $errors->first('login', '<label class="help-block red">:message</label>') }}
							                            </div>
													</label>

													<label class="block clearfix">
														<div class="input-group">
                        									<span class="input-group-addon"><i class="blue fa fa-lock"></i></span>
															<input type="password" name="password" class="form-control" value="{{Input::old('password')}}" placeholder="密码" tabindex="2"/>
														</div>
														<div class="col-sm-6">                      
							                              {{ $errors->first('password', '<label class="help-block red">:message</label>') }}
							                            </div>
													</label>

													<!--<label class="block clearfix">
														<div class=" col-xs-6">														
															{{HTML::image(Captcha::img(), 'Captcha image')}}
														</div>
														<div class="input-group col-xs-6">															
                        									<span class="input-group-addon"><i class="blue fa fa-shield "></i></span>
                        									<input type="text" id="captcha" name="captcha" class="form-control" value="{{Input::old('captcha')}}" placeholder="验证码" tabindex="3"/>                        									
														</div>
														<div class="col-sm-6">                      
							                              {{ $errors->first('captcha', '<label class="help-block red">:message</label>') }}
							                            </div>
													</label>-->

													<div class="space-4"></div>

													<div class="clearfix">

														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">确定</span>
														</button>
													</div>

													<div class="space"></div>
												</fieldset>
											
											</form>

											<div class="social-or-login center">
												<span class="smaller-90">Version 2.6</span>
											</div>											

											
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a href="{{route('default.sendemail')}}" class="user-signup-link">
													<i class="ace-icon fa fa-retweet"></i>
													<span class="bigger-110">重发验证邮件</span>												
												</a>
											</div>

											<div>
												<a href="{{route('default.register')}}" data-target="#signup-box" class="user-signup-link">
													<span class="bigger-110">会员注册</span>
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								
							</div><!-- /.position-relative -->

							
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='../assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='../assets/js/jquery1x.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">		
			jQuery(function($) {
				document.getElementById("login").focus();
			 
			});			
			
			
		</script>
	</body>
</html>
