<?php
$redirectUrl = "/login";
session_start();
if ($_SESSION['log'] != 'user') {
    header('Location: ' . $redirectUrl, true, 303);
}

$letter = $_SESSION['email'][0];
$color = $_SESSION['color'];
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="http://localhost/styles/style-admin.css">
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
                    <img src="http://localhost/images/escape-author-white.svg" alt="Logo">
                </div>
                <div class="navigation__menu">
                    <div class="navigation__avatar" style="background-color: <?= $color ?>;">
                        <p class="navigation__avatar-letter" style="font-size: 15px; margin-left: 10px; margin-top: 5px; color: white;"><?= $letter ?></p>
                    </div>
                    <a href="http://localhost/api-logout.php">
                        <div class="navigation__menu-item">
                            <img src="http://localhost/images/menu-item.svg" alt="Menu Item">
                        </div>
                    </a>
                </div>
            </nav>

        </div>
    </header>

    <form class="main__form main container" name="postForm" id="postForm" action="#" method="post">
        <div class="banner">
            <div class="banner__header">
                <h1 class="banner__title">New Post</h1>
                <h2 class="banner__subtitle">Fill out the form bellow and publish your article</h2>
            </div>
            <button class="banner__publish" type="submit" value="Publish">Publish</button>
        </div>
        <div class="status-of-form">
            <div class="status-of-form__image"></div>
            <span class="status-of-form__mess"></span>
        </div>
        <div class="data">
            <div class="info">
                <h1 class="info__header">Main Information</h1>
                <div class="info__main">
                    <div class="info__post">
                        <div class="info__form-group">
                            <label class="info__checkbox-title">Featured post:</label>
                            <input class="info__checkbox" type="checkbox" id="IsFeaturedPost" name="IsFeaturedPost"
                                value="0" />
                        </div>
                        <div class="info__form-group">
                            <h1 class="info__title">Title</h1>
                            <input class="info__input info__input-title" type="text" placeholder="New Post"
                                name="title_input" id="title_input" maxlength="255"></input>
                        </div>
                        <div class="info__form-group">
                            <h1 class="info__title">Short description</h1>
                            <input class="info__input info__input-description" type="text"
                                placeholder="Please, enter any description" name="subtitle_input"
                                id="subtitle_input" maxlength="255"></input>
                        </div>
                        <div class="info__form-group">
                            <h1 class="info__title">Author name</h1>
                            <input class="info__input info__input-author-name" type="text" name="author_input"
                                id="author_input" maxlength="255"></input>
                        </div>
                        <div class="info__form-group">
                            <h1 class="info__title">Author Photo </h1>
                            <label class="info__avatar">
                                <div class="info__avatar-preview-box">
                                    <img class="info__avatar-preview img__preview" src="/images/avatar.png"
                                        alt="Image preview" />
                                </div>
                                <input class="info__input info__input-author-photo" type="file"
                                    name="author_photo_input" accept=".jpg,.jpeg,.png,.svg"
                                    id="author_photo_input"></input>
                                <div class="info__upload-new-button">
                                    <div class="status-of-form__image"></div>
                                    <span class="info__button-text">Upload New</span>
                                </div>
                                <button type="button" class="info__remove-button">
                                    <div class="status-of-form__image"></div>
                                    <span class="info__button-text">Remove</span>
                                </button>
                            </label>
                        </div>
                        <div class="info__form-group">
                            <h1 class="info__title">Publish Date </h1>
                            <input class="info__input info__input-publish-date" type="date" name="date_post_input"
                                id="date_post_input"></input>
                        </div>
                        <div class="info__form-group info__form-hero-image">
                            <h1 class="info__title">Hero Image</h1>
                            <label class="info__image">
                                <div class="info__image-preview-box">
                                    <img class="info__image-preview-main img__preview" id="info__image-preview-main"
                                        src="/images/main-camera.png" alt="Image preview" />
                                </div>
                                <input class="info__input info__input-hero-image" type="file"
                                    name="main_post_image_input" accept=".jpg,.jpeg,.png,.svg"
                                    id="main_post_image_input"></input>
                                <div class="info__button-box">
                                    <div class="info__upload-new-button">
                                        <div class="status-of-form__image"></div>
                                        <span class="info__button-text">Upload New</span>
                                    </div>
                                    <button type="button" class="info__remove-button">
                                        <div class="status-of-form__image"></div>
                                        <span class="info__button-text">Remove</span>
                                    </button>
                                </div>
                            </label>
                            <h2 class="info__subtitle indication-for-image">Size up to 10mb. Format: png, jpeg, gif.
                            </h2>
                        </div>
                        <div class="info__form-group">
                            <h1 class="info__title">Hero Image</h1>
                            <label class="info__hero-image">
                                <div class="info__image-preview-box">
                                    <img class="info__image-preview img__preview" src="/images/camera-post.png"
                                        alt="Image preview" />
                                </div>
                                <input class="info__input info__input-hero-image" type="file" name="post_image_input"
                                    accept=".jpg,.jpeg,.png,.svg" id="post_image_input"></input>
                            </label>
                            <div class="info__button-box">
                                <div class="info__upload-new-button">
                                    <div class="status-of-form__image"></div>
                                    <span class="info__button-text">Upload New</span>
                                </div>
                                <button type="button" class="info__remove-button">
                                    <div class="status-of-form__image"></div>
                                    <span class="info__button-text">Remove</span>
                                </button>
                            </div>
                            <h2 class="info__subtitle indication-for-image">Size up to 5mb. Format: png, jpeg, gif.</h2>
                        </div>
                    </div>
                    <div class="info__view">
                        <h1 class="info__title info__view-title">Article preview</h1>
                        <div class="info__view-border">
                            <div class="info__view-post-article">
                                <div class="info__intro">
                                    <h1 class="info__intro-title" id="intro-title">New Post</h1>
                                    <h2 class="info__intro-subtitle" id="intro-subtitle">Please, enter any description
                                    </h2>
                                </div>
                                <div>
                                    <img class="info__images image__prev" id="info__images"
                                        src="http://localhost/images/image.png" alt="">
                                </div>
                            </div>
                        </div>
                        <h1 class="info__title info__view-title">Post card preview</h1>
                        <div class="info__view-border">
                            <div class="info__view-post-card">
                                <img src="http://localhost/images/image.png" class="info__imgs image__prev" alt="">
                                <div class="info__description">
                                    <h4 class="info__section-head" id="section-head">New Post</h4>
                                    <h5 class="info__section-subhead" id="section-subhead">Please, enter any description
                                    </h5>
                                </div>
                                <div class="info__sign">
                                    <div class="info__lab1">
                                        <img src="http://localhost/images/author.svg" class="info__round image__prev"
                                            alt="">
                                        <p class="info__sign-autor" id="sign-autor">Enter author name</p>
                                    </div>
                                    <div class="info__lab2">
                                        <p class="info__sign-date" id="sign-date">Date</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <h1 class="info__header">Content</h1>
                <div class="info__post">
                    <h1 class="info__title">Post content (plain text)</h1>
                    <textarea class="info__textarea-content" type="text" name="content_input" id="content_input"
                        placeholder="Type anything you want ..."></textarea>
                </div>
            </div>
        </div>
    </form>
    <script defer src="js/admin.js"></script>
    <footer class="footer container">
    </footer>
</body>

</html>