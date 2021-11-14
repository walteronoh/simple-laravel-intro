<!DOCTYPE html>

<title>My blog</title>
<link rel="stylesheet" href="/app.css">

<body>
    <?php foreach ($home as $h) : ?>
        <article>
            <h1> <a href="/post/<?= $h->slug; ?>"> <?= $h->title; ?> </a> </h1>
            <?= $h->body; ?>
        </article>
    <?php endforeach; ?>
</body>