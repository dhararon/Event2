<div class="container">

      <!-- Example row of columns -->
      <div class="row">

        <div class="offset1 span9">
          <h1>Mis actividades</h1>
          <hr />

          <div class="row">
            
            <table class="table table-bordered table-hover">
                
                  <thead>
                    <tr>
                      <th>Fecha</th>
                      <th>Hora</th>
                      <th>Nombre</th>
                      <th>Lugar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($actividades as $actividad): ?>

                      <tr>
                        <td><?php echo $actividad->fecha; ?></td>
                        <td><?php echo $actividad->hora; ?></td>
                        <td><?php echo $actividad->nombreActividades; ?></td>
                        <td><?php echo $actividad->edificio.' - '.$actividad->salon; ?></td>
                      </tr>

                  <?php endforeach; ?>
                  </tbody>

            </table>

          </div>
          <!-- Fin de la ficha -->

        </div>
        
      </div>

      <hr>