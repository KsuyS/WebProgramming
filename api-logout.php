<?php
$redirectUrl = "/login";
session_destroy();
header('Location: ' . $redirectUrl, true, 303);
