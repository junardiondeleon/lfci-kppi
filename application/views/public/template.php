<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->config->item('site_name'); ?> | <?php echo $site_title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <?php echo link_tag('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>
  <?php echo link_tag('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>
  <?php echo link_tag('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>
  <?php echo link_tag('assets/dist/css/AdminLTE.min.css'); ?>
  <?php echo link_tag('assets/plugins/iCheck/square/blue.css'); ?>
  <?php echo link_tag('assets/dist/css/override.css'); ?>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <?php echo link_tag('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic'); ?>
</head>
<body class="hold-transition login-page">

<!-- /.login-box -->
<?php $this->load->view($content); ?>

<!-- jQuery 3 -->
<?php echo script_tag('assets/bower_components/jquery/dist/jquery.min.js'); ?>
<?php echo script_tag('assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>
<?php echo script_tag('assets/plugins/iCheck/icheck.min.js'); ?>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
