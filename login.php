<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/styles/style-login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oxygen:wght@300;400;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <header class="header">

    </header>

    <form class="main container" name="logForm" id="logForm" action="#" method="post">
        <div class="intro">
            <div class="intro__container">
                <div class="intro__block-image">
                    <img class="intro__image" src="http://localhost/images/escape_author.svg">
                </div>
                <div class="intro__block-container">
                    <div class="intro__block">
                        <h1 class="intro__header">Log In</h1>
                        <div class="intro__login">
                            <div class="intro__form-group">
                                <label class="intro__title">Email</label>
                                <input class="intro__input intro__input-email" type="text" id="inputEmail"
                                    name="inputEmail" />
                            </div>
                            <div class="intro__form-group">
                                <label class="intro__title">Password</label>
                                <input class="intro__input intro__input-password" type="text" id="inputPassword"
                                    name="inputPassword" />
                            </div>
                        </div>
                        <button class="intro__but-login" type="submit" value="logIn">Log in</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script defer src="js/log.js"></script>
    <footer class="footer container">
    </footer>
</body>

</html>