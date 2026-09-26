<?php
     
    

    class database {

        public PDO $pdo;

        public function __construct() {

            
            // 1. Definiamo dove salvare il file .db (usiamo la costante ROOT_PATH definita in index.php)
            $db_file = ROOT_PATH . '/database/il_mio_database.db';

            try {
                // 2. Connessione: Se il file non esiste, PHP lo crea in questo preciso momento!
                $this->pdo = new PDO("sqlite:" . $db_file);
                
                // Attiviamo gli errori chiari in modalità sviluppo
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = "CREATE TABLE IF NOT EXISTS metadata (
                        id INTEGER PRIMARY KEY AUTOINCREMENT,
                        lang TEXT DEFAULT 'en-EN',
                        charset TEXT DEFAULT 'UFT-8',
                        viewport TEXT DEFAULT 'width=device-width, initial-scale=1.0',
                        titolo TEXT DEFAULT 'titolo del sito',
                        descrizione TEXT DEFAULT 'descrizione della pagina',
                        robots_index TEXT DEFAULT 'noindex',
                        robots_follow TEXT DEFAULT 'nofollow',
                        data_creazione DATETIME DEFAULT CURRENT_TIMESTAMP
                    );
                ";
                $this->pdo->exec($sql);


                $stmt = $this->pdo->query("SELECT COUNT(*) FROM metadata");
                $count = $stmt->fetchColumn();
                if ($count == 0) {
                    $query = "INSERT INTO metadata DEFAULT VALUES";
                    $this->pdo->exec($query);
                }


                $sql = "CREATE TABLE IF NOT EXISTS users (
                    user_id INTEGER PRIMARY KEY AUTOINCREMENT,
                    email VARCHAR(50) NOT NULL,
                    name VARCHAR(50) NOT NULL,
                    surname VARCHAR(50) NOT NULL,
                    username VARCHAR(50) NOT NULL,
                    password TEXT NOT NULL,
                    is_active TINYINT(1) DEFAULT 1,
                    two_factor_secret VARCHAR(100) NULL,
                    email_verified_at DATETIME NULL,
                    password_reset_token VARCHAR(100) NULL,
                    password_reset_expires DATETIME NULL
                );";
                $this->pdo->exec($sql);

                

            } catch (PDOException $e) {
                die("Errore critico durante la creazione del database: " . $e->getMessage());
            }
            
            
        }

        public function existTableData(string $tableName){

            $stmt = $this->pdo->query("SELECT COUNT(*) FROM $tableName");

            $count = $stmt->fetchColumn();

            if($count == 0){
                return false;
            }
            else {
                return true;
            }

        }

        //funzione che prende tutti i dati di una tabella.
        public function getTableData(string $tableName) {
            $query = "SELECT * FROM $tableName";

            $querytableData = $this->pdo->query($query);

            $tableDati = $querytableData->fetchAll(PDO::FETCH_ASSOC);

            //echo "dati ritornati dal server sql" . print_r($tableDati[0]);

            return $tableDati[0];
        }


        public function postMetadata(){
            
        }

    }

?>