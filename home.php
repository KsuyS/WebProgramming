<?php
$featurePosts = [
    [
        'id' => 1,
        'title' => 'The Road Ahead',
        'subtitle' => 'The road ahead might be paved - it might not be.',
        'img_modifier' => 'http://localhost/images/mat-vogels.png',
        'author' => 'Mat Vogels',
        'date' => 1443128400,
        'class' => 'features__block-article1'
    ],
    [
        'id' => 2,
        'title' => 'From Top Down',
        'subtitle' => 'Once a year, go someplace you’ve never been before.',
        'img_modifier' => 'http://localhost/images/william-wong.png',
        'author' => 'William Wong',
        'date' => 1443128400,
        'class' => 'features__block-article2'
    ],
];
?>

<?php
$mostRecentPosts = [
    [
        'id' => 3,
        'title' => 'Still Standing Tall',
        'subtitle' => 'Life begins at the end of your comfort zone.',
        'img_modifier' => 'http://localhost/images/william-wong.png',
        'author' => 'William Wong',
        'date' => 1443128400,
        'image_post' => 'images/balloons.png'
    ],
    [
        'id' => 4,
        'title' => 'Sunny Side Up',
        'subtitle' => 'No place is ever as bad as they tell you it’s going to be.',
        'img_modifier' => 'http://localhost/images/mat-vogels.png',
        'author' => 'Mat Vogels',
        'date' => 1443128400,
        'image_post' => 'images/bridge.png'
    ],
    [
        'id' => 5,
        'title' => 'Water Falls',
        'subtitle' => 'We travel not to escape life, but for life not to escape us.',
        'img_modifier' => 'http://localhost/images/mat-vogels.png',
        'author' => 'Mat Vogels',
        'date' => 1443128400,
        'image_post' => 'images/river.png'
    ],
    [
        'id' => 6,
        'title' => 'Through the Mist',
        'subtitle' => 'Travel makes you see what a tiny place you occupy in the world.',
        'img_modifier' => 'http://localhost/images/william-wong.png',
        'author' => 'William Wong',
        'date' => 1443128400,
        'image_post' => 'images/ocean.png'
    ],
    [
        'id' => 7,
        'title' => 'Awaken Early',
        'subtitle' => 'Not all those who wander are lost.',
        'img_modifier' => 'http://localhost/images/mat-vogels.png',
        'author' => 'Mat Vogels',
        'date' => 1443128400,
        'image_post' => 'images/fog.png'
    ],
    [
        'id' => 8,
        'title' => 'Try it Always',
        'subtitle' => 'The world is a book, and those who do not travel read only one page.',
        'img_modifier' => 'http://localhost/images/mat-vogels.png',
        'author' => 'Mat Vogels',
        'date' => 1443128400,
        'image_post' => 'images/waterfall.png'
    ],
];
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
                    <a class="menu__link" href="#">Adventureion</a>
                </li>
            </ul>
        </div>
        <div class="features">
            <h3 class="features__heading">Featured Posts</h3>
            <hr class="features__line">
            <div class="features__part1">
                <?php
                foreach ($featurePosts as $post) {
                    include 'feature_post_preview.php';
                }
                ?>
            </div>
            <h3 class="features__heading">Most Recent</h3>
            <hr class="features__line">
            <div class="features__part2">
                <?php
                foreach ($mostRecentPosts as $post) {
                    include 'most_recent_post_preview.php';
                }
                ?>
            </div>
        </div>
    </main>
    <footer class="footer container">
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