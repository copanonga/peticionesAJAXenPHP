<?php

    if (isset($_POST['dato1']) && $_POST['dato2']) {

        $response = array();
        $response["dato1"] = $_POST['dato1'];
        $response["dato2"] = $_POST['dato2'];
        $response["success"] = 1;
        
        echo json_encode($response);
        
    } else {
        
        $response = array();
        $response["success"] = 0;
        
        echo json_encode($response);
        
    }
