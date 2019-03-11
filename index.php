<!DOCTYPE html>
<html lang="es-ES">
  <head>
    <meta charset="UTF-8">
      <title>Peticiones AJAX en PHP</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>
  
  <body>
    
    <div class="container">
      
      <h1>AJAX</h1>
      
      <div class="col-sm-12 col-md-8">
      
          <p>Petición</p>
          
          <a href="#"
             class="btn btn-success border boder-info border-top-0 border-bottom-0 border-right-0" 
             title="Petición AJAX"
             id="peticionAJAX"
             onclick="peticionAJAX()">Petición AJAX</a>

      </div>
      
    </div>
    
  </body>
  
</html>

<script>
    
    function peticionAJAX() {
        
        console.log('Petición AJAX');
        
        $.ajax(
              {
                url : "demo.php",
                type: "POST",
                data : {
                        dato1: 'Primer dato',
                        dato2: 'Segundo dato'
                        }
              })
                .done(function(data) {

                    console.log("Datos: " + data);
                    var mostrarData= JSON.parse(data);

                    if(mostrarData['success']==0) {
                        console.log("Error: success " + mostrarData['success']);
                    } else {

                        console.log("Success");
                        console.log("Mostrar dato1: " + mostrarData['dato1']);
                        console.log("Mostrar dato2: " + mostrarData['dato2']);
                        alert('Mostrar dato 1: ' + mostrarData['dato1'] + ' -|- Mostrar dato 2: ' + mostrarData['dato2']);
                        
                    }

                })
                .fail(function(data) {
                    console.log("Error: editarCriterioDeEvaluacionBorrar");
                })
                .always(function(data) {
                    console.log("Completada editarCriterioDeEvaluacionBorrar");
                });
                
    }
    
</script>
