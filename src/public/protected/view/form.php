<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>AMS Auth Form</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<div id="container">
    <form class="auth__form form" id="login-side" method="post" action="/login">
        <h1 class="form__heading">Login Form</h1>
        <label class="form__label">
            Username
            <input class="form__input" type="text" id="formUsername" name="username"
                   placeholder="Enter username...">
        </label>
        <!--        <label class="form__label">-->
        <!--            Email-->
        <!--            <input class="form__input" type="text">-->
        <!--        </label>-->
        <label class="form__label">
            Password
            <input class="form__input" type="password" id="formPassword" name="password"
                   placeholder="Enter password...">
        </label>
        <!--        <label class="form__label">-->
        <!--            Confirm Password-->
        <!--            <input class="form__input" type="password">-->
        <!--        </label>-->
        <button class="form__submit btn" type="submit" value="register">
            Submit
        </button>

        <p class="switch-animation">Don't have an account? <a href="#">Sign up</a></p>
    </form>

    <form class="auth__form form" id="signup-side" method="post" action="/register">
        <h1 class="form__heading">Sign Up Form</h1>
        <label class="form__label">
            Username
            <input class="form__input" type="text" id="formUsername" name="username"
                   placeholder="Enter username...">
        </label>
        <!--        <label class="form__label">-->
        <!--            Email-->
        <!--            <input class="form__input" type="text">-->
        <!--        </label>-->
        <label class="form__label">
            Password
            <input class="form__input" type="password" id="formPassword" name="password"
                   placeholder="Enter password...">
        </label>
        <!--        <label class="form__label">-->
        <!--            Confirm Password-->
        <!--            <input class="form__input" type="password">-->
        <!--        </label>-->
        <button class="form__submit btn" type="submit" value="register">
            Submit
        </button>

        <p class="switch-animation">Already have an account? <a href="#">Login</a></p>
    </form>
</div>
<script src="../../js/index.js"></script>
</html>
