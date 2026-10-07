<?php

    

    class website {

        public database $database;

        public metadata $metadata;
        public body $body;


        public function __construct() {
            // Inserisci qui i comandi che devono partire all'avvio
            //echo "La classe website è stata creata con successo! ";
            //header("Location: /nome-nuova-cartella/dashboard.php");

            $this->database = new database();

            
            
            $metadata = new metadata($this->database);
            $this->body = new body($this->database);

            echo "<!DOCTYPE html>
                <html lang='$metadata->lang'>
                    <head> ". $metadata->getHeadTags() ." </head>
                    <body>
                        ". $this->body->getHeader() ."
                        ". $this->body->getContent() ."
                        ". $this->body->getFooter() ."
                    </body>
                </html>
            ";
        
            
        }

    }

?>