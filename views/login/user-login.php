<form class="form_user" action="index.php?users=user_get_data" method="POST" enctype="multipart/form-data">

    <h2>Metadati della pagina</h2>

    <label for="email">Email</label>
    <input 
        type="email"
        id="email"
        name="email"
        value="<?= htmlspecialchars($user['email'] ?? '') ?>"
        required
    >

    <label for="username">Username</label>
    <input 
        type="text"
        id="username"
        name="username"
        value="<?= htmlspecialchars($user['username'] ?? '') ?>"
        required
    >

    <label for="password">Password</label>
    <!-- Corretto da textarea a input protetto -->
    <input 
        type="password"
        id="password"
        name="password"
        required
    >

    <button type="submit" name="action" value="user_get_data"> login </button>
</form>

<?php 
// 1. Controlla se esiste un messaggio salvato in sessione
if (isset($_SESSION['message'])) {
    echo htmlspecialchars($_SESSION['message']);
};
?>

<style> 
    .form_user { display: flex; flex-direction: column; gap: 10px; max-width: 300px; }
</style>
