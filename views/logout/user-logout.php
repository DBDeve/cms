<?php


// 2. Svuota l'array delle variabili di sessione
$_SESSION = array();

// 3. Cancella il cookie di sessione anche nel browser dell'utente (consigliato per sicurezza)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 4. Distrugge definitivamente la sessione sul server
session_destroy();

// 5. Reindirizza l'utente alla pagina di login o alla home
header("Location: index.php?users=login");
exit;
?>
