<?php

function uploadImg(){
    if((!empty($_FILES["image"])) && ($_FILES['image']['error'] == 0)){

        $allowedExtensions = array("jpg", "bmp", "jpeg", "gif", "png");
        $array = explode(".", $_FILES["image"]["name"]);
        $ext = end($array);
        //echo $_FILES["image"]["name"]." ".$ext; 

        if((( $_FILES["image"]["type"] == "image/png") 
                        || ( $_FILES["image"]["type"] == "image/bmp") 
                        || ( $_FILES["image"]["type"] == "image/jpeg") 
                        || ( $_FILES["image"]["type"] == "image/gif")
                        || ( $_FILES["image"]["type"] == "image/jpg"))
                && (in_array($ext, $allowedExtensions))
                && $_FILES["image"]["size"] < 1000000
                ){

            $path = dirname(__FILE__)."/img/";
            $name = time().".".$ext;
            //echo $path.$name;
            
            if(!file_exists($path.$name)) {	
                move_uploaded_file($_FILES["image"]["tmp_name"], $path.$name);
                
                    return '/upload/img/'.$name; 
            }
        }
    } else{
        return "";
    }   
}