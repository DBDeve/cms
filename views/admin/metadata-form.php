<?php
// Se vuoi precompilare i campi, puoi passare un array $meta
// esempio:
// $meta = [
//     'title' => '',
//     'description' => '',
//     'keywords' => '',
//     'robots' => 'index,follow',
//     'image' => ''
// ];
?>

<form action="/admin/metadati/save" method="POST" enctype="multipart/form-data">

    <h2>Metadati della pagina</h2>

    <label for="meta_title">Titolo (meta title)</label>
    <input 
        type="text" 
        id="meta_title" 
        name="meta_title" 
        value="<?= $meta['title'] ?? '' ?>" 
        required
    >

    <label for="meta_description">Descrizione (meta description)</label>
    <textarea 
        id="meta_description" 
        name="meta_description" 
        rows="4" 
        required
    ><?= $meta['description'] ?? '' ?></textarea>

    <label for="meta_keywords">Keywords (separate da virgola)</label>
    <input 
        type="text" 
        id="meta_keywords" 
        name="meta_keywords" 
        value="<?= $meta['keywords'] ?? '' ?>"
    >

    <label for="meta_image">Immagine social (OpenGraph)</label>
    <input 
        type="file" 
        id="meta_image" 
        name="meta_image" 
        accept="image/*"
    >

    <?php if (!empty($meta['image'])): ?>
        <p>Immagine attuale:</p>
        <img src="<?= $meta['image'] ?>" width="200">
    <?php endif; ?>

    <label for="meta_robots">Robots</label>
    <select id="meta_robots" name="meta_robots">
        <?php
            $robotsOptions = [
                "index,follow",
                "noindex,follow",
                "index,nofollow",
                "noindex,nofollow"
            ];
            $current = $meta['robots'] ?? "index,follow";

            foreach ($robotsOptions as $opt) {
                $selected = ($opt === $current) ? "selected" : "";
                echo "<option value=\"$opt\" $selected>$opt</option>";
            }
        ?>
    </select>

    <button type="submit">Salva metadati</button>
</form>
