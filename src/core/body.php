<?php
  
    class body {

        public function __construct(database $database) {
            
        }

        public function getHeader(){

            return '<header> </header>';

        }

        public function getContent(){
            return 
                '
                    <main> 
                        <h1>Benvenuto</h1>
                        <a href="index.php?metadata=form" style="padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">
                            modifica metadati
                        </a>
                        
                        
                        
                        
                    </main>
                ';
        }

        public function getFooter(){

            return '<footer> </footer>';

        }
        
    }



?>