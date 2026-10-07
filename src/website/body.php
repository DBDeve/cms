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


            if($this->database->existTableData("users") == false && ($_GET['users'] ?? '') !== 'create_new'){
                echo "rendirizamento eseguito";
                header("Location: /admin/index.php?users=create_new");
                exit;
            } 

            $html .= '</main>';


            return $html;

        }

        public function getFooter(){

            return '<footer> </footer>';

        }
        
    }



?>