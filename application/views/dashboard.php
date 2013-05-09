<div class="container">

      <div class="well well-small span10">
        <div class="row">
          <div class="span3">
            <ul class="thumbnails">
              <li class="span4">
                <a href="" class="thumbnails"><img src="http://placehold.it/200x200" alt=""></a></li>
            </ul>
          </div>
          <div class="span7">
            <h3>Nombre</h3>
            <p><?php echo $nombreUsuario.' '.$apellidoPat.' '.$apellidoMat; ?></p>
            <h3>Carrera</h3>
            <p><?php echo $carrera; ?></p>
            <div class="row">
              <div class="span2">
                <h3>Semestre</h3>
                <p class="span1"><?php echo $semestre; ?></p>
              </div>
              <div class="span2">
                <h3>Status</h3>
                <p class="text-success"> <?php echo $tipo; ?> </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Example row of columns -->
      <?php if( @$nombreEvento ){ ?>
      <div class="row">
        <div class="offset1 span9 well well-small">
          <h2><?php echo $nombreEvento; ?></h2>
          <p><?php echo $descripcion; ?></p>
          <p><a class="btn btn-warning" href="<?php echo base_url().'index.php/eventos/ver/'.$evento_pk ?>">Ver evento &raquo;</a></p>
        </div>
        
      </div>
    <?php }
    else{
    ?>
    <div class="row">
            <div class="span9 well well-large" style="margin-top:4%;">
              <h2>Lo sentimo,no hay eventos disponibles</h2>
            </div>
          </div>
          <?php } ?>

      <hr>