<?php

    if (isset($_POST['json'])) {

        $response = array();
        
        $data['myRequest'] =$_REQUEST;
        $total = json_decode($data['myRequest']['json'],true);
        
        $response["dato1"] = $total['dato1'];
        $response["dato2"] = $total['dato2'];
        
        $response["bloque"] = $total['bloque'];
        
        $response["success"] = 1;
        
        echo json_encode($response);
        
    } else {
        
        $response = array();
        $response["success"] = 0;
        
        echo json_encode($response);
        
    }