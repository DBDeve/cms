<?php

require_once ROOT_PATH . '/src/core/database.php';

// Dentro: src/azioni/salva-metadata.php

// I dati del form sono già accessibili qui dentro!
$email  = $_POST['email'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
echo "salvataggio dati utente";
if (!empty($email) && !empty($username) && !empty($password)) {
    echo "salvataggio dati utente";
    try {
        // Puoi usare anche $this->database perché questo file eredita tutto!
        $sql = "INSERT INTO users (email, username, password) VALUES (:email, :username, :password)";
        $stmt = $this->database->pdo->prepare($sql);
        $stmt->execute([
            ':email' => 'valore1',
            ':username' => 'valore2', // Corretto da valore1 a valore2 per lo username
            ':password' => password_hash('valore3', PASSWORD_DEFAULT) // Protegge la password
        ]);

        
        // Dopo il salvataggio, reindirizziamo l'utente alla home per evitare che reinvii i dati ricaricando la pagina
        //header("Location: index.php");
        exit;
        
    } catch (PDOException $e) {
        echo "Errore nel database: " . $e->getMessage();
    }
} else {
    echo "Tutti i campi sono obbligatori!";
}
?>
