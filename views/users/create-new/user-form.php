

<form class="form_user" action="index.php?users=create_new" method="POST" enctype="multipart/form-data">

    <h2>Metadati della pagina</h2>

    <label for="email"> email </label>
    <input 
        type="text"
        id="email"
        name="email"
        value="<?= $user['email'] ?? '' ?>"
        required
    >

    <label for="username"> username </label>
    <input 
        type="text"
        id="username"
        name="username"
        value="<?= $user['username'] ?? '' ?>"
        required
    >

    <label for="password"> password </label>
    <textarea 
        id="password" 
        name="password" 
        rows="4" 
        required
    ><?= $meta['password'] ?? '' ?></textarea>


    <button type="submit">Salva utente</button>
</form>

<style> 
       
    .form_user { display: flex; flex-direction: column;}

</style>
