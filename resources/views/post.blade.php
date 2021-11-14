<!DOCTYPE html>

<title>My blog</title>
<link rel="stylesheet" href="/app.css">

<body>
    <article>
        <h1> <?= $post->title; ?></h1>
        <?= $post->body; ?>
    </article>
</body>