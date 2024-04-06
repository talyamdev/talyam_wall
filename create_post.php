<?php
    require_once 'vendor/autoload.php';
    require_once 'generated-conf/config.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo nl2br(htmlspecialchars($_POST["body"], ENT_QUOTES, 'UTF-8'));

        $newPost = new Post();
        $newPost->setAuthor($_POST["author"]);
        $newPost->setHeading($_POST["heading"]);
        $newPost->setBody($_POST["body"]);
        $newPost->save();

        header('Location: /');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить запись</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/styles.css" rel="stylesheet">
</head>
<body data-bs-theme="dark">
    <div class="container mt-3 position-relative">
        <h1 class="text-center mb-3">Добавить запись на стену</h1>

        <form class="bg-body-secondary px-3 py-2 rounded position-relative" method="post">
            <div class="mb-3">
                <label for="authorInput" class="form-label">Автор</label>
                <input name="author" maxlength="30" class="form-control" id="authorInput" aria-describedby="authorHelp" required>
                <div id="authorHelp" class="form-text">Максимум 30 символов</div>
            </div>

            <div class="mb-3">
                <label for="headingInput" class="form-label">Название</label>
                <input name="heading" maxlength="50" class="form-control" id="headingInput" aria-describedby="headingHelp" required>
                <div id="headingHelp" class="form-text">Максимум 50 символов</div>
            </div>

            <div class="mb-3">
                <label for="bodyInput" class="form-label">Содержание</label>
                <textarea name="body" maxlength="1000" class="form-control" id="bodyInput" aria-describedby="bodyHelp" required></textarea>
                <div id="bodyHelp" class="form-text">Максимум 1000 символов</div>
            </div>

            <button type="submit" class="btn btn-primary">Готово</button>
            <a href="/" class="btn btn-secondary">Отмена</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>