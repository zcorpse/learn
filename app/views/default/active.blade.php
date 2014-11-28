
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
								<h1>
									<img src="/assets/images/X1.png">
									<span class="blue">合力业务管理系统</span>
								</h1>
								<!--<h4 class="blue" id="id-company-text">&copy; Company Name</h4>-->
							</div>

							<div class="space-6"></div>

							<div class="position-relative">								

								<div id="active-box" class="active-box widget-box visible no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header orange lighter bigger">
												<i class="ace-icon fa fa-user orange"></i>
												用户激活
											</h4>

											<div class="space-6"></div>
											@include('flash::message')

											@if( isset($user))
											<form class="form-horizontal" method="post" action="{{route('default.active')}}"  autocomplete="off">
											<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
											<input type="hidden" name="id" value="{{$user->id}}"/>
											  <div class="form-group">
											    <label for="email" class="col-sm-4 control-label">电子邮箱：</label>
											    <div class="col-sm-8">
											      <label class="control-label no-padding-left"><strong>{{$user->email}}</strong></label>
											    </div>
											    
											  </div>
											  <div class="form-group">
											    <label for="name" class="col-sm-4 control-label">姓名：</label>
											    <div class="col-sm-8">
											      <label class="control-label no-padding-left"><strong>{{$user->name}}</strong></label>
											    </div>
											  </div>
											  
											  <div class="form-group">
											    <div class="col-sm-offset-2 col-sm-10">
											      <button type="submit" class="width-50 pull-right btn btn-sm btn-warning">
													<span class="bigger-110">激活</span>
													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												  </button>
											    </div>
											  </div>

											</form>
											@endif
										</div>

										<div class="toolbar center ">
											<a href="/" data-target="#login-box" class="active-user-link">
												<i class="ace-icon fa fa-arrow-left yellow"></i>
												返回登录
											</a>
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
		
	</body>
</html>
