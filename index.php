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
               onclick="peticionAJAX()">Petición AJAX enviado variables por POST</a>
            
            <a href="#"
               class="btn btn-success border boder-info border-top-0 border-bottom-0 border-right-0" 
               title="Petición AJAX"
               id="peticionAJAX"
               onclick="peticionAJAXenviandoJSON()">Petición AJAX enviando un JSON</a>

      </div>
      
    </div>
    
  </body>
  
</html>

<script>
    
    function peticionAJAX() {
        
        console.log('Petición AJAX enviado variables mediante POST');
        
        $.ajax(
              {
                url : "demopost.php",
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
                    console.log("Error: peticionAJAX");
                })
                .always(function(data) {
                    console.log("Completada peticionAJAX");
                });
                
    }
  
  function peticionAJAXenviandoJSON() {
        
        console.log('Petición AJAX enviando JSON');
        
        var dato1 = 'Primer dato';
        var dato2 = 'Segundo dato';
        var success = 1;

        var jsonAEnviar = {dato1, dato2, 'bloque':[], success};
        
        for (i = 0 ; i < 3; i ++) {
        
            var bloqueCreado = { id:i, 
            doble:i+i};
            jsonAEnviar.bloque.push(bloqueCreado);

        }
        
        console.log("JSON creado: " + jsonAEnviar);
        jsonString = JSON.stringify(jsonAEnviar);
        console.log("JSON creado string: " + jsonString);
        
        
        $.ajax(
              {
                type: 'POST',
                url: 'demojson.php',
                data: {json: JSON.stringify( jsonAEnviar )},
                dataType: 'json'
              })
                .done(function(data) {

                    console.log("Datos: " + JSON.stringify(data));
                    
                    if(data['success']==0) {
                        console.log("Error: success " + data['success']);
                    } else {

                        console.log("Success");
                        console.log("Mostrar dato1: " + data['dato1']);
                        console.log("Mostrar dato2: " + data['dato2']);
                        console.log("Mostrar bloque: " + data['bloque']);
                        
                        for ( i = 0 ; i < data['bloque'].length ; i++) {
                            
                            var bloqueObtenido = data['bloque'][i];
                            
                            console.log("ID: " + bloqueObtenido['id']);
                            console.log("Doble: " + bloqueObtenido['doble']);
                            
                        }
                        
                        alert('Mostrar dato 1: ' + data['dato1'] + ' -|- Mostrar dato 2: ' + data['dato2']);
                        
                    }

                })
                .fail(function(data) {
                    console.log("Error: peticionAJAXenviandoJSON");
                })
                .always(function(data) {
                    console.log("Completada peticionAJAXenviandoJSON");
                });
                
    }
    
</script>
