<?php
require_once "database.php";
function getAndPrintFeaturedPostsFromDB(mysqli $conn): void
{
    $sql1 = "SELECT * FROM post WHERE featured = 1";
    $result = $conn->query($sql1);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            include 'feature_post_preview.php';
        }
    } else {
        echo "0 results";
    }
}

function getAndPrintMostRecentPostsFromDB(mysqli $conn): void
{
    $sql1 = "SELECT * FROM post WHERE featured = 0";
    $result = $conn->query($sql1);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            include 'most_recent_post_preview.php';
        }
    } else {
        echo "0 results";
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Main page</title>
    <link rel="stylesheet" href="http://localhost/styles/style-home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oxygen:wght@300;400;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="container">
            <nav class="navigation">
                <div class="navigation__logo">
                    <img src="http://localhost/images/escape-white.svg" alt="Logo">
                </div>
                <ul class="navigation__list">
                    <li class="navigation__item">
                        <a class="navigation__link" href='/home'>Home</a>
                    </li>
                    <li class="navigation__item">
                        <a class="navigation__link" href="#">Categories</a>
                    </li>
                    <li class="navigation__item">
                        <a class="navigation__link" href="#">About</a>
                    </li>
                    <li class="navigation__item">
                        <a class="navigation__link" href="#">Contact</a>
                    </li>
                </ul>
            </nav>
            <div class="banner">
                <h1 class="banner__title">Let's do it together.</h1>
                <h2 class="banner__subtitle">We travel the world in search of stories. Come along for the ride.</h2>
                <a class="banner__offer-link" href="#">View Latest Posts</a>
            </div>
        </div>
    </header>
    <main class="main container">
        <div class="menu">
            <ul class="menu__list">
                <li class="menu__item">
                    <a class="menu__link" href="#">Nature</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="#">Photography</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="#">Relaxation</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="#">Vacation</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="#">Travel</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="#">Adventure</a>
                </li>
            </ul>
        </div>
        <div class="features">
            <h3 class="features__heading">Featured Posts</h3>
            <hr class="features__line">
            <div class="features__part1">
                <?php
                $conn = createDBConnection();
                getAndPrintFeaturedPostsFromDB($conn);
                closeDBConnection($conn);
                ?>
            </div>
            <h3 class="features__heading">Most Recent</h3>
            <hr class="features__line">
            <div class="features__part2">
                <?php
                $conn = createDBConnection();
                getAndPrintMostRecentPostsFromDB($conn);
                closeDBConnection($conn);
                ?>
            </div>
        </div>
    </main>
    <footer class="footer container">
        <div class="block-email footer-block-email">
            <p class="block-email__title">Stay in Touch</p>
            <hr class="block-email__line">
            <div class="block-email__part">
                <input class="block-email__input" type="text" placeholder="Enter your email address" name="email_input"
                    id="email_input"></input>
                <button class="block-email__submit">Submit</button>
            </div>
        </div>

        <nav class="navigation footer-navigation">
            <div class="navigation__logo">
                <img src="http://localhost:/images/escape-white.svg" alt="Logo">
            </div>
            <ul class="navigation__list">
                <li class="navigation__item">
                    <a class="navigation__link footer__link" href="#">Home</a>
                </li>
                <li class="navigation__item">
                    <a class="navigation__link footer__link" href="#">Categories</a>
                </li>
                <li class="navigation__item">
                    <a class="navigation__link footer__link" href="#">About</a>
                </li>
                <li class="navigation__item">
                    <a class="navigation__link footer__link" href="#">Contact</a>
                </li>
            </ul>
        </nav>
    </footer>
</body>

</html>