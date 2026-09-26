<?php

require_once ROOT_PATH . '/src/core/database.php';

// Dentro: src/azioni/salva-metadata.php

// I dati del form sono già accessibili qui dentro!
$email  = $_POST['email'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (!empty($email) && !empty($username) && !empty($password)) {
    try {
        // Puoi usare anche $this->database perché questo file eredita tutto!
        $sql = "INSERT INTO users (email, username, password) VALUES (valore1, 'valore2', valore3);";
        $stmt = $this->database->pdo->exec($sql);
        
        // Dopo il salvataggio, reindirizziamo l'utente alla home per evitare che reinvii i dati ricaricando la pagina
        header("Location: index.php");
        exit;
        
    } catch (PDOException $e) {
        echo "Errore nel database: " . $e->getMessage();
    }
} else {
    echo "Tutti i campi sono obbligatori!";
}
?>
