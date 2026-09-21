<?php
// Dentro: src/azioni/salva-metadata.php

// I dati del form sono già accessibili qui dentro!
$titolo  = $_POST['meta_title'] ?? '';
$titolo  = $_POST['meta_description'] ?? '';
$titolo  = $_POST['meta_keywords'] ?? '';
$titolo  = $_POST['meta_robots'] ?? '';


if (!empty($lingua) && !empty($titolo)) {
    try {
        // Puoi usare anche $this->database perché questo file eredita tutto!
        $sql = "INSERT INTO metadati (lang, title) VALUES (:lang, :title)";
        $stmt = $this->database->prepare($sql);
        
        $stmt->execute([
            ':lang'  => $lingua,
            ':title' => $titolo
        ]);
        
        // Dopo il salvataggio, reindirizziamo l'utente alla home per evitare che reinvii i dati ricaricando la pagina
        header("Location: index.php?messaggio=salvato");
        exit;
        
    } catch (PDOException $e) {
        echo "Errore nel database: " . $e->getMessage();
    }
} else {
    echo "Tutti i campi sono obbligatori!";
}
?>
