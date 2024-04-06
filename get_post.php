<?php
    require_once 'vendor/autoload.php';
    require_once 'generated-conf/config.php';

    if (!isset($_GET["id"])) {
        header("Location: /");
    } else {
        $post = PostQuery::create()->findPk($_GET["id"]);

        if (!isset($post)) {
            header("Location: /");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пост</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/styles.css" rel="stylesheet">
</head>
<body data-bs-theme="dark">
    <div class="container mt-3">
        <h1 class="text-center">Запись от <?= htmlspecialchars($post->getAuthor(), ENT_QUOTES, 'UTF-8') ?></h1>

        <div class="bg-body-secondary px-3 py-2 rounded mt-3 position-relative">
            <h3><?= htmlspecialchars($post->getHeading(), ENT_QUOTES, 'UTF-8') ?></h3>

            <p class="mb-0"><?= nl2br($post->getBody()) ?></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>