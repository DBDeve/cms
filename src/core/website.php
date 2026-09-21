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
                    <head> ". $metadata->getHeadTags() ." </head>
                    <body>
                        <h1>Benvenuto</h1>
                        <a href='index.php?azione=mostra' style='padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;'>
                            modifica metadati
                        </a>";
                        if (isset($_GET['azione']) && $_GET['azione']==="mostra") {
                            include ROOT_PATH . "/views/admin/metadata-form.php";
                        }
            echo "
                    </body>
                </html>
            ";
        
            
        }

    }

?>