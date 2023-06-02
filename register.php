<?php
include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");

$account = new Account($con);

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

function getInputValue($name) {
    if(isset($_POST[$name])) {
        echo $_POST[$name];
    }
}
?>

<html>
<head>
<title>Welcome to Songify!</title>

<link rel="stylesheet" type="text/css" href="assets/css/register.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="assets/js/register.js"></script>

</head>
<body>
    <?php
        if(isset($_POST['registerButton'])) {
            echo '<script>
                    $(document).ready(function() {
                        $("#registerForm").show();
                        $("#loginForm").hide();
                    });
                  </script>';
        }
        else{
            echo '<script>
                    $(document).ready(function() {
                        $("#registerForm").hide();
                        $("#loginForm").show();
                    });
                  </script>';
        }
     ?>

    <div id="background">
        <div id="loginContainer">
            <div id="inputContainer">
                <form id="loginForm" action="register.php" method="POST">
                    <h2>Login to your account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$loginFailed); ?>
                        <label for="loginUsername">Username</label>
                        <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bartSimpson" value="<?php getInputValue('loginUsername')?>" required>
                    </p>
                    <p>
                        <label for="loginPassword">Password</label>
                        <input id="loginPassword" name="loginPassword" type="password" placeholder="password should contain at least 6 chars" required>
                    </p> 
                        
                    <button type="submit" name="loginButton">Log in</button>
                    <div class="hasAccountText">
                        <span id="hideLogin">Don't have an Account? Signup here.</span>
                    </div>

                </form>

                <form id="registerForm" action="register.php" method="POST">
                    <h2>Create a free account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$usernameCharacters); ?>
                        <?php echo $account->getError(Constants::$usernameTaken); ?>
                        <label for="username">Username</label>
                        <input id="username" name="username" type="text" placeholder="e.g. bartSimpson" value="<?php getInputValue('username') ?>" required>
                    </p>
                    <p>
                         <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                        <label for="firstName">First name</label>
                        <input id="firstName" name="firstName" type="text" placeholder="e.g. bartSimpson" value="<?php getInputValue('firstName') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                        <label for="lastName">Last name</label>
                        <input id="lastName" name="lastName" type="text" placeholder="e.g. bartSimpson" value="<?php getInputValue('lastName') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$emailInvalid); ?>
                        <?php echo $account->getError(Constants::$emailTaken); ?>
                        <label for="email">Enter your email id here</label>
                        <input id="email" name="email" type="email" placeholder="e.g. bartSimpson" value="<?php getInputValue('email') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
                        <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                        <?php echo $account->getError(Constants::$passwordCharacters); ?>
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" placeholder="your password" required>
                    </p>
                    <p>
                        <label for="password2">Confirm password</label>
                        <input id="password2" name="password2" type="password" placeholder="your password" required>
                    </p> 

                    <button type="submit" name="registerButton">Sign up</button>
                     <div class="hasAccountText">
                        <span id="hideRegister">Already have an account? Login here.</span>
                    </div>

                </form>
            </div>
            <div id="loginText">
                <h1>Great Music,now at your fingertips!</h1>
                <h2>Listen to lots of songs for free</h2>
                <ul>
                    <li>Discover new songs that you will be addicted to</li>
                    <li>Create your own personal playlists</li>
                    <li>Follow popular artists to see their latest</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>