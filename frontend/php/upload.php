<?php

    if (isset($_FILES['file']['name']) && isset($_POST['escudo'])) {

        /* Getting file name */
        $filename = $_FILES['file']['name'];
    
        /* Location */
        $location = "../images/escudos/".$filename;
        $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
        $imageFileType = strtolower($imageFileType);
    
        /* Valid extensions */
        $valid_extensions = array("jpg","jpeg","png","svg");
    
        $response = 0;
        /* Check file extension */
        if (in_array(strtolower($imageFileType), $valid_extensions)) {
            /* Upload file */
            if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
                $response = ["logo" => $filename];
            }
        }
    
        echo json_encode($response);
        exit;
    }
