<?php
ob_start();
?>

<?php
$pageTitle = "TP Halluciné - Login";
include "head.php";
$idBodyCss = "login-registration";
?>

<body id=<?= "\"".$idBodyCss. "\"" ?> >
    <section id="login-registration_section">
        <div id="login-registration_section_content">
            <form id="login" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]."?page=login") ?>" method="POST">
                <h1>Connexion</h1>
    
                <label><b>email</b></label>
                <input type="text" placeholder="Votre email" name="email" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Votre mot de passe" name="password" required>

                <input type="submit" id='submit' value='login' >

                
            </form>
        </div>
    </section>
</body>

<?php
$content = ob_get_clean();


?>

<?= $content ?>
</html>
