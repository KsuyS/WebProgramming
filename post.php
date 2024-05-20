<?php
require_once "database.php";

if (isset($_GET["id"])) {
    $postId = (int) $_GET["id"];
} else {
    header('Location: ' . $redirectUrl, true, 303);
}


function getAndPrintPostsFromDB(mysqli $conn, int $postId, string $redirectUrl)
{
    $sql = "SELECT * FROM post WHERE post_id = $postId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        header('Location: ' . $redirectUrl, true, 303);
    }
}

$redirectUrl = "/home";


$conn = createDBConnection();
$post = getAndPrintPostsFromDB($conn, $postId, $redirectUrl);
closeDBConnection($conn);

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $post["title"] ?></title>
    <link rel="stylesheet" href="http://localhost/styles/style-post.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oxygen:wght@300;400;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <header class="container">
        <nav class="navigation">
            <div class="navigation__logo">
                <img src="http://localhost/images/escape.svg" alt="Logo">
            </div>
            <ul class="navigation__list">
                <li class="navigation__item"><a class="navigation__link" href='/home'>Home</a></li>
                <li class="navigation__item"><a class="navigation__link" href="#">Categories</a></li>
                <li class="navigation__item"><a class="navigation__link" href="#">About</a></li>
                <li class="navigation__item"><a class="navigation__link" href="#">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main class="container">
        <div class="intro">
            <h1>
                <?= $post["title"] ?>
            </h1>
            <h2>
                <?= $post["subtitle"] ?>
            </h2>
        </div>
        <div class="images">
            <img src="<?= $post["image_post"] ?>" alt="<?= $post["title"] ?>">
        </div>
        <div class="info">
            <p>
                <?= $post["content"] ?>
            </p>
        </div>
    </main>
    <footer class="container footer">
        <div class="block-email footer-block-email">
            <p class="block-email__title">Stay in Touch</p>
            <hr class="block-email__line">
            <div class="block-email__part">
                <input class="block-email__input" type="text" placeholder="Enter your email address" name="email_input"
                    id="email_input"></input>
                <button class="block-email__submit">Submit</button>
            </div>
        </div>
        <nav class="footer-nav navigation">
            <div class="nav__logo">
                <img src="http://localhost/images/escape-white.svg" alt="Logo">
            </div>
            <ul class="navigation__list">
                <li class="navigation__item"><a class="navigation__link footer__link" href="#">Home</a></li>
                <li class="navigation__item"><a class="navigation__link footer__link" href="#">Categories</a></li>
                <li class="navigation__item"><a class="navigation__link footer__link" href="#">About</a></li>
                <li class="navigation__item"><a class="navigation__link footer__link" href="#">Contact</a></li>
            </ul>
        </nav>
    </footer>
</body>

</html>