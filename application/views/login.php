<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Event2 - Uaemex CU Ecatepec</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Los javascript -->
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.1.1.min.js"></script>
    
    <!-- Le styles -->
    <link href="<?php echo base_url();?>/assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="<?php echo base_url();?>/assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="ico/favicon.png">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="POST" action="<?php echo base_url();?>index.php/login/loguear" id="form_login">
        
        <?php if( $error ){ ?>
        <div class="alert alert-error">Ocurrio un error al iniciar sesión :(</div>
        <?php } ?>
        
        <h2 class="form-signin-heading">Inicia sesión</h2>
        <input type="text" class="input-block-level" placeholder="No Cuenta" name="usuario" id="usuario">
        <input type="password" class="input-block-level" placeholder="Contraseña" name="password" id=="password">
        <button class="btn btn-large btn-primary" type="submit">Entrar</button>
      </form>

    </div> <!-- /container -->
    
    <!-- javascript -->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/validacion_login.js"></script>

  </body>
</html>
