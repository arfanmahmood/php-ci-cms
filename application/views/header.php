<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title><?php echo $page_name; ?> - Sapphire Finishing Mills Ltd.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url(); ?>resources/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>resources/css/<?php echo $base_css ?>" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>resources/css/bootstrap-theme.css" rel="stylesheet" />

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url(); ?>resources/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="<?php echo base_url(); ?>resources/img/favicon.ico">
  </head>

  <body>


<?php if($page_name!='Sign In' && $page_name!='Forgot Password'){  ?>

    <div class="container-narrow">

      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li  <?php if($page_name=='Dashboard') echo 'class="active"'; ?>><a href="<?php echo base_url(); ?>dashboard"><i class="icon-home"></i> Dashboard</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" data-target="#"><i class="icon-star"></i> Fabrics Management <b class="caret"></b></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			  <li><a href="<?php echo base_url(); ?>fabrics">Fabrics</a></li>            
              <li><a href="<?php echo base_url(); ?>features">Features</a></li>
              <li><a href="<?php echo base_url(); ?>uses">Uses</a></li>
            </ul>
          </li>
          <li <?php if($page_name=='Users') echo 'class="active"'; ?>><a href="<?php echo base_url(); ?>users"><i class="icon-user"></i> Users</a></li>
          <li><a href="<?php echo base_url(); ?>logout"><i class="icon-off"></i> Logout</a></li>
        </ul>
        <h3 class="muted">Sapphire Finishing Mills Ltd.</h3>
      </div>

      <hr>
      
<?php }else{  ?>      
      
    <div class="container">
      
<?php }  ?>