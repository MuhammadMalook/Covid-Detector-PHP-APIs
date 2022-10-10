<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: applicaiton/json');

    //initialzing api
    include_once('../core/initialize.php');

    //instantiate post

    $post = new Post();



    $result = $post->read_temp();

    $num = $result->rowCount();
    if($num > 0){
        $post_arr = array();
        $post_arr['users'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            //extract($row);
            $post_item = array(
            "userid" => $row['USERID'],
            "name" => $row['NAME'],
            "email" => $row['EMAIL'],
            "password"=> $row['PASSWORD'],
            "tagid" => $row['TAGID'],
            "college" => $row['COLLEGE'],
            "BodyTemp" => $row['BodyTemp']  
            );
            array_push($post_arr['users'], $post_item);        
        }
        echo json_encode($post_arr);

    }
    else{
        echo json_encode(array("message"=>"no users found"));
    }


?>