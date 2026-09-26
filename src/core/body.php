<?php
  
    class body {

        public database $database;
        private string $content = '';

        public function __construct(database $database) {
            $this->database = $database;
        }

        public function getHeader(){

            return '<header> </header>';

        }

        public function getContent(){

            $html = '<main> ';

            $html .= '<h1>Benvenuto</h1>
                <a href="index.php?metadata=form" style="padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">
                    modifica metadati
                </a>'
            ;

            if($this->database->existTableData("users") == false){

                $this->content = ROOT_PATH . "/views/users/create-new/user-form.php";
                ob_start();
                include $this->content;
                $html .= ob_get_clean();

            } else if (isset($_GET['metadata']) && $_GET['metadata']==="form") {
                $this->content = ROOT_PATH . "/views/admin/metadata-form.php";
                ob_start();              
                include $this->content;  
                $html .= ob_get_clean(); 
            } 
            else if(isset($_GET['users']) && $_GET['users']==="create_new"){
                $this->content = ROOT_PATH . "/views/users/create-new/user-form.php";
                ob_start();              
                include $this->content;  
                $html .= ob_get_clean();
            }
            else if($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Includi il file fuori da public che contiene la query SQL di salvataggio
                $this->content =  ROOT_PATH . "/views/admin/save_metadata.php";
                ob_start();              
                include $this->content;  
                $html .= ob_get_clean(); 
            }

            
            $html .= '</main>';


            return $html;

        }

        public function getFooter(){

            return '<footer> </footer>';

        }
        
    }



?>