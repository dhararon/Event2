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
        <?php foreach($contenido as $con): ?>
          <div class="row">
            <div class="span9 well well-large" style="margin-top:4%;">
              <h2><?php echo $con->nombreActividades; ?></h2>
              <hr />
              <p><?php echo $con->descripcion; ?></p>
              <div class="row">
                <div class="span3"> <h4>Ponente:</h4> <?php echo $con->nombrePonente; ?> </div>
                <div class="span2"> <h4>Lugar:</h4> <?php echo $con->edificio.' - '.$con->salon; ?> </div>
                <div class="span4"> <h4>Lugares disponibles:</h4> <p id="disponibles" ><?php echo $con->capacidad - $con->inscritos; ?> </p> </div>
                
                <?php if( !($con->capacidad - $con->inscritos) == 0 ){ ?>
                  <input type="hidden" name="actividad" value="<?php echo $con->actividad_pk ?>" id="actividad">
                <div class="span1" style="margin-top:2%;"><button id="subir" class="btn btn-success">Asistir</button></div>
                <?php } ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <!-- Fin de la ficha -->
        </div>
        
      </div>

      <hr>

      <script type="text/javascript">

      $(document).ready(function(){

        $('#subir').click(function(){

          var actividad = $('#actividad').val();

          $.ajax({
            url: '<?php echo base_url()."index.php/actividades/asistir"; ?>',
            type:'POST',
            data: { actividad: actividad} ,
            dataType: 'json'
            }).done(function(mensaje){
              if( mensaje == 'TRUE' ){
                  var dis = $('#disponibles').text();
                  $('#disponibles').text(dis-1);
                  $('#subir').hide();
              }
              else{
                alert('No se pudo dar de alta en el sistema, vuelva a intentarlo');
              }
              

            }); // End of ajax call 

        });

      });

      </script>