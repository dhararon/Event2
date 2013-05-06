<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Event2 - Uaemex CU Ecatepec</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url();?>/assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="<?php echo base_url();?>/assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>/assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>/assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>/assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="<?php echo base_url();?>/assets/ico/favicon.png">
          <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.1.1.min.js"></script>
    
      <!-- GROCERY CRUD -->
      <?php if( $tabla ){ ?>
<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<?php } ?>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" style="background-color: #058A2F">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand">Event2</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <?php if( $tipo == 'Administrador' ){ ?>

               <li><a href="<?php echo base_url(); ?>">Inicio</a></li>
               <li><a href="<?php echo base_url(); ?>index.php/usuarios">Usuarios</a></li>
               <li><a href="<?php echo base_url(); ?>index.php/eventos">Eventos</a></li>
               <li><a href="<?php echo base_url(); ?>index.php/actividades">Actividades</a></li>
               <li><a href="<?php echo base_url(); ?>index.php/aulas">Aulas</a></li>
               <li><a href="<?php echo base_url(); ?>index.php/ponentes">Ponentes</a></li>
               <li><a href="<?php echo base_url();?>index.php/logout">Cerrar sesión</a></li>
            

              <?php } 
                else if( $tipo == 'Organizador' ){
              ?>
            
               <li><a href="<?php echo base_url(); ?>">Inicio</a></li>
               <li><a href="<?php echo base_url(); ?>index.php/eventos">Eventos</a></li>
               <li><a href="<?php echo base_url(); ?>index.php/actividades">Actividades</a></li>
               <li><a href="<?php echo base_url(); ?>index.php/aulas">Aulas</a></li>
               <li><a href="<?php echo base_url(); ?>index.php/ponentes">Ponentes</a></li>
               <li><a href="<?php echo base_url();?>index.php/logout">Cerrar sesión</a></li>

              <?php } ?>
            
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>