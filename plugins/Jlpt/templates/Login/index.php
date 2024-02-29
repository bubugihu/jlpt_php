<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JLPT | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/css/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/css/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/css/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/dist/css/AdminLTE.min.css">
    <style>
        .login-box {
            width: 550px;
        }
        .login-box-body {
            display: flex;
        }
        .login-box-body-logo {
            flex-shrink: 1;
            display: flex;
            align-items: center;
            padding-right: 20px;
            justify-content: center;
        }
        .login-box-body>form {
            width: 100%;
        }
        @media (max-width: 768px) {
            .login-box {
                width: 90%;
            }
            .login-box-body {
                display: block;
            }
            .login-box-body>form {
                margin-top: 20px;
            }
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="css/dist/img/TS_logo.png">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>Admin</b> </a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <div class="login-box-body-logo">
        </div>

        <form action="" method="post">

            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12 form-group color-red">
                    <?php echo isset($error) ? $error : ''; ?>
                </div>
                <div class="notification col-xs-12 form-group color-blue">
                    <?php echo $this->Flash->render('success'); ?>
                </div>
                <!-- /.col -->
            </div>

            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="email" placeholder="Email" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"><?php isset($error) ? $error : ''; ?></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>

        </form>


    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="/css/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/css/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script>

</script>
<style type="text/css">
    .color-red { color : red;     font-weight: bold;}
    .color-blue {color:blue;     font-weight: bold;}
</style>
</body>
</html>
