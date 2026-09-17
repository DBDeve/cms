<?php

    

    class website {

        public database $database;

        public metadata $metadata;
        public header $header;
        public footer $footer;


        public function __construct() {
            // Inserisci qui i comandi che devono partire all'avvio
            //echo "La classe website è stata creata con successo! ";
            //header("Location: /nome-nuova-cartella/dashboard.php");

            $this->database = new database();

            
            
            $metadata = new metadata($this->database);
            $this->header = new header($this->database);
            $this->footer = new footer($this->database);

            echo "<!DOCTYPE html>
                <html lang='$metadata->lang'>
                    <head>
                        <meta charset='$metadata->charset'>
                        <meta name='viewport' content='$metadata->viewport'>
                        <title> $metadata->title </title>
                        <meta name='description' content=' $metadata->description '>
                        <meta name='robots' content='$metadata->robots_index, $metadata->robots_follow'>
                    </head>
                    <body>
                        <h1>Benvenuto</h1>
                    </body>
                </html>
            ";
        
            
        }

    }

?>