<?php

require_once ROOT_PATH . '/src/core/database.php';

// Dentro: src/azioni/salva-metadata.php

// I dati del form sono già accessibili qui dentro!
$email  = $_POST['email'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

//echo "salvataggio dati utente";

if (!empty($email) && !empty($username) && !empty($password)) {

    //echo "salvataggio dati utente";

    try {

        // 1. Prepari la query per CERCARE l'utente tramite la sua email
        $sql = "SELECT user_id, username, password FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->database->pdo->prepare($sql);

        // 2. Esegui la query passando l'email inserita nel form
        $stmt->execute([
            ':email' => $email
        ]);

        // 3. Recuperi i dati dell'utente trovati nel database (se esiste)
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // 4. Verifichi se l'utente esiste E se la password corrisponde
        if ($user && password_verify($password, $user['password'])) {
            
            // LOGIN COMPLETATO CON SUCCESSO!
            // Ora puoi inviare i dati presi dal database alla sessione
            
            $_SESSION['utente_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['loggato'] = true;

            // Reindirizzi l'utente alla pagina protetta
            //header("Location: admin/index.php");
            $_SESSION['message']= "login effetuato";
            header("Location: index.php?users=login");
            exit ;

        } else {
            // LOGIN FALLITO
            $_SESSION['message']= "login fallito";
            header("Location: index.php?users=login");
            exit ;
        }

        
    } catch (PDOException $e) {

        $_SESSION['message'] = "Errore database: " . $e->getMessage();
        header("Location: index.php?users=login");
        exit ;
      
    }


} else {

header("Location: index.php?users=login");
exit ;

     
}


?>
