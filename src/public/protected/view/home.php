<?php

use Authentication\Token\UserTokenInterface;

if (!isset($_SESSION[UserTokenInterface::DEFAULT_PREFIX_KEY])) {
    header("Location: /auth");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>AMS</title>
    <!--    <link rel="stylesheet" href="/assets/styles/main.css">-->
</head>
<h1>Hello</h1>
</html>