      <div class="container">

        <div class="well well-small span10">
            
            <?php echo $output; ?>
          </div>
        </div>

        <script type="text/javascript">
        $(document).ready(function(){

        	$('#field-nombreUsuario').attr('readonly', true);
        	$('#field-apellidoPat').attr('readonly', true);
        	$('#field-apellidoMat').attr('readonly', true);

        });
        </script>