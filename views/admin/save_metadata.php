<?php

require_once ROOT_PATH . '/src/core/database.php';

// Dentro: src/azioni/salva-metadata.php

// I dati del form sono già accessibili qui dentro!
$titolo  = $_POST['meta_title'] ?? '';
$description  = $_POST['meta_description'] ?? '';

if (!empty($titolo) && !empty($description)) {
    try {
        // Puoi usare anche $this->database perché questo file eredita tutto!
        $sql = "UPDATE metadata SET titolo = :title, descrizione = :description WHERE id = 1";
        $stmt = $this->database->pdo->prepare($sql);
        
        $stmt->execute([
            ':description'  => $description,
            ':title' => $titolo
        ]);
        
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
