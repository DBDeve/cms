

<form class="form_user" action="index.php?users=form" method="POST" enctype="multipart/form-data">

    <h2>Metadati della pagina</h2>

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
    ><?= $meta['description'] ?? '' ?></textarea>


    <button type="submit">Salva utente</button>
</form>

<style> 
       
    .form_user { display: flex; flex-direction: column;}

</style>
