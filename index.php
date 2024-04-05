<?php
require_once 'vendor/autoload.php';
require_once 'generated-conf/config.php';

$posts = PostQuery::create()->find();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Стена Талям</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/styles.css" rel="stylesheet">
</head>
<body data-bs-theme="dark">
    <div class="container mt-2">
        <h1 class="text-center">Добро пожаловать в стену статусов Талям!</h1>

        <div class="bg-body-secondary px-3 py-2 rounded mt-3 position-relative">
            <h3 class="text-center">Посты:</h3>
            <button type="button" class="position-absolute btn btn-primary add_btn">Добавить</button>

            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Автор</th>
                        <th>Название</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post): ?>
                    <tr>
                        <td><?= htmlspecialchars($post->getAuthor(), ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($post->getHeading(), ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>