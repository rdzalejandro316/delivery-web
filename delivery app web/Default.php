<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8">
    <title>generador de reportes</title>
    <link href="./App_Styles/reset.css" rel="stylesheet" />
    <link href="./App_Styles/StyleSheet.css" rel="stylesheet" />
</head>
<body>    
    <div class="login-container">
        <section class="login" id="login">
            <header>
                <h2>Delivery reports</h2>
                <h4>Login</h4>
            </header>
            <form class="login-form" action="./App_Validation/validate.php" method="post">
                <input name="User" type="text" class="login-input" placeholder="usuario" required autofocus />
                <input name="Password" type="password" class="login-input" placeholder="contraseña" required />
                <div class="submit-container">
                    <button type="submit" class="login-button">SIGN IN</button>
                </div>
            </form>
        </section>
    </div>

</body>
</html>