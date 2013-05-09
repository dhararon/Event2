<div class="container">

      <!-- Example row of columns -->
      <div class="row">
  
        <div class="offset1 span9">
          <h1><?php echo $eventos->nombreEvento; ?></h1>
          <hr />
  
          <div class="row">
            <div class="offset1 span4">
              <h2><small>Inicio: <p class="text-success"><?php echo $eventos->fechaInicio; ?></p></small></h2>
            </div>
            <div class="span4">
              <h2><small>Clausura: <p class="text-error"><?php echo $eventos->fechaTermino; ?></p></small></h2>
            </div>
          </div>
        
        <!-- Fichas de las conferencias y talleres -->

        <?php if( @$contenido ){   ?>

        <?php foreach($contenido as $con): ?>
          <div class="row">
            <div class="span9 well well-large" style="margin-top:4%;">
              <h2><?php echo $con->nombreActividades; ?> <br />
                <hr />
                <small>
                  <pre>Fecha:  <?php echo $con->fecha; ?>

Tipo: <?php echo $con->tipo; ?> 
Hora: <?php echo $con->hora; ?>
                  </pre>
                </small></h2>
              
              <p><?php echo $con->descripcion; ?></p>
              <div class="row">
                <div class="span3"> <h4>Ponente:</h4> <?php echo $con->nombrePonente; ?> </div>
                <div class="span2"> <h4>Lugar:</h4> <?php echo $con->edificio.' - '.$con->salon; ?> </div>
                <div class="span4"> <h4>Lugares disponibles:</h4> <p id="disponibles<?php echo $con->actividad_pk ?>" ><?php echo $con->capacidad - $con->inscritos; ?> </p> </div>
                
                <?php if( !($con->capacidad - $con->inscritos) == 0 ){ ?>
                  <input type="hidden" name="actividad" value="<?php echo $con->actividad_pk ?>" id="actividad<?php echo $con->actividad_pk ?>">
                <div class="span1" style="margin-top:2%;"><button id="subir<?php echo $con->actividad_pk ?>" class="btn btn-success">Asistir</button></div>
                <?php } ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <!-- Fin de la ficha -->
          <?php }
          else{ ?>
              <div class="row">
            <div class="span9 well well-large" style="margin-top:4%;">
              <h2>Lo sentimo, ya no hay actividades disponibles</h2>
            </div>
          </div>
          <?php } ?>
        </div>
        
      </div>

      <hr>

      <script type="text/javascript">

      $(document).ready(function(){

         <?php foreach($contenido as $con): ?>
        $('#subir<?php echo $con->actividad_pk ?>').click(function(){

          var actividad = $('#actividad<?php echo $con->actividad_pk ?>').val();

          $.ajax({
            url: '<?php echo base_url()."index.php/actividades/asistir"; ?>',
            type:'POST',
            data: { actividad: actividad} ,
            dataType: 'json'
            }).done(function(mensaje){
              if( mensaje == 'TRUE' ){
                  var dis = $('#disponibles<?php echo $con->actividad_pk ?>').text();
                  $('#disponibles<?php echo $con->actividad_pk ?>').text(dis-1);
                  $('#subir<?php echo $con->actividad_pk ?>').hide();
              }
              else{
                alert('No se pudo dar de alta en el sistema, vuelva a intentarlo');
              }
              

            }); // End of ajax call 

        });

        <?php endforeach; ?>

      });

      </script>