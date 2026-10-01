<?php

    class admin {

        public database $database;

        public function __construct() {

            $this->database = new database();

            if (isset($_GET['metadata']) && $_GET['metadata']==="form") {

                include ROOT_PATH . "/views/admin/metadata-form.php";

            } 
            else if(isset($_GET['users']) && $_GET['users']==="create_new"){

                include ROOT_PATH . "/views/users/create-new/user-form.php";

            }
            else if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'save_metadata') {

                include ROOT_PATH . "/views/admin/save_metadata.php";

            }
            else if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'save_user') {

                include ROOT_PATH . "/views/users/create-new/user-save.php";

            }

        }

    }


?>