<?php

    class admin {

        public database $database;

        public function __construct() {

            $this->database = new database();

            session_start();

            if (isset($_SESSION['user_id'])) {
                // 1. Se l'utente è loggato, mostra il benvenuto
                echo "Benvenuto, " . htmlspecialchars($_SESSION['username']);
            } else {
                // 2. Se l'utente NON è loggato, prima di reindirizzare controlliamo dove si trova
                if (isset($_GET['users']) && $_GET['users'] === 'login' || isset($_GET['users']) && $_GET['users'] === 'user_get_data') {
                    // Se si trova già sulla pagina di login, NON facciamo nulla qui.
                    // Lasciamo che la pagina continui a scorrere verso il basso per mostrare il form.
                } else {
                    // Se NON si trova sulla pagina di login, allora lo reindirizziamo al login
                    header("Location: index.php?users=login");
                    exit;
                }
            }



            echo '<a href="index.php?metadata=form" style="padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">
                    modifica metadati
                  </a>';

            if (isset($_GET['metadata']) && $_GET['metadata']==="form") {

                include ROOT_PATH . "/views/admin/metadata-form.php";

            } 
            else if(isset($_GET['users']) && $_GET['users']==="create_new"){

                include ROOT_PATH . "/views/users/create-new/user-form.php";

            }
            else if(isset($_GET['users']) && $_GET['users']==="login"){

                include ROOT_PATH . "/views/login/user-login.php";

            }
            else if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'save_metadata') {

                include ROOT_PATH . "/views/admin/save_metadata.php";

            }
            else if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'save_user') {

                include ROOT_PATH . "/views/users/create-new/user-save.php";

            }
            else if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'user_get_data') {

                include ROOT_PATH . "/views/login/user-get-data.php";

            }

        }

    }


?>