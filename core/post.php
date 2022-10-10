<?php
    require_once __DIR__ . '/../includes/config.php';
     class Post{
      
        public function read(){
            $db = new Connect;
            $users = array();
            $data = $db->prepare('SELECT * FROM users');
            $data->execute();

            return $data;
        }

        public function read_temp() {
            $db = new Connect;
            $users = array();
            $data = $db->prepare('SELECT * FROM users join detection on users.TAGID = detection.TAGID where detection.BodyTemp > 38');
            $data->execute();

            return $data;
        }
        

    }

?>