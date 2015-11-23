<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="./dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="./plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <center>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="./index2.html"><b>Admin</b>Login</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="login.php" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username"class="form-control" placeholder="username" required />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password"class="form-control" placeholder="Password" required/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                 
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
			
              <button type="submit" name="action" value="admin_login" class="btn btn-primary btn-block btn-flat">Sign In</button>
			 
            </div><!-- /.col -->
          </div>
        </form>
   
  </body>
   </center>
</html>
