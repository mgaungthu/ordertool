 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
  <head>    
    <base href="<?=base_url()?>"/>
    <meta charset="UTF-8">
    <title>Double Y Online Shopping</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="authorUrl" content="">
    
    <!-- Mobile Specific Meta -->   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!--Fav and touch icons-->
    <link rel="shortcut icon" href="images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="images/icons/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/apple-touch-icon-114x114.png">

	<!--[if IE 9]> 
    	<link rel="stylesheet" href="assets/css/ie9.css">
    <![endif]-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
 <body>
 <div class="bg">
  	<header class="">
   
    </header>

  <div class="login_form container animated bounceIn bigtoppadding">
    <?=$this->load->view($login_form)?>
</div>
    
<footer>
<div class="container smallpadding">
    <div class="col-md-6 text-left">
      <p>© copyright 2016 Top Y International Co., Ltd</p>
    </div>
    <div class="col-md-6 text-right">
      <p>All Right Reserved.</p>
    </div>
</div>
</footer> 

 </div>

   
    


    
  </body>
</html>