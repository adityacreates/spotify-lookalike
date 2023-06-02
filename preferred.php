<?php include("includes/includedFiles.php");


// Assuming the user is already authenticated and logged in
// ...

// Check if the user has already set their preferred language
if (!isset($_POST['preferred_language'])) {
      echo '<script>
              $(document).ready(function() {
                  $("#registerForm").show();
                  $("#loginForm").hide();
              });
           </script>';

<div id="background">
    <div id="loginContainer">
            <div id="inputContainer">
                <form id="PreferenceForm" action="index.php" method="POST">
                
                <h2>Which languages would you like to listen to music in?</h2>
                
                <p>
                <input id="languageName" type="checkbox" name="language[]" value="english">English;
                </p>

                <p>
                <input id="languageName type="checkbox" name="language[]"" value="spanish">Spanish;
                </p>

                <p>
                <input id="languageName" type="checkbox" name="language[]" value="french">French;
                </p>

                <button type="submit" name="submit" value="Save">Log in</button>
                    <div class="hasAccountText">
                        <span id="hideLogin">Select favorite </span>
                    </div>

                </form>

  // If the user submits their language preferences, save them to the session
  if (isset($_POST['submit'])) {
    $_SESSION['preferred_language'] = $_POST['language'];
  }

}
?>

<?php

// Assuming the user is already authenticated and logged in
// ...

// Check if the user has already set their preferred artists
if (!isset($_SESSION['preferred_artists'])) {

  // If the user hasn't set their preferred artists, show them a prompt
  echo "Who are your top 5 favorite artists?<br>";
  echo "<form method='post'>";
  echo "<input type='checkbox' name='artists[]' value='Taylor Swift'>Taylor Swift<br>";
  echo "<input type='checkbox' name='artists[]' value='Drake'>Drake<br>";
  echo "<input type='checkbox' name='artists[]' value='Ariana Grande'>Ariana Grande<br>";
  echo "<input type='checkbox' name='artists[]' value='Ed Sheeran'>Ed Sheeran<br>";
  echo "<input type='checkbox' name='artists[]' value='Beyonce'>Beyonce<br>";
  echo "<input type='checkbox' name='artists[]' value='Post Malone'>Post Malone<br>";
  echo "<input type='checkbox' name='artists[]' value='Billie Eilish'>Billie Eilish<br>";
  echo "<input type='checkbox' name='artists[]' value='Justin Bieber'>Justin Bieber<br>";
  echo "<input type='checkbox' name='artists[]' value='Kanye West'>Kanye West<br>";
  echo "<input type='checkbox' name='artists[]' value='Travis Scott'>Travis Scott<br>";
  echo "<input type='submit' name='submit' value='Save'>";
  echo "</form>";

  // If the user submits their artist preferences, save them to the session
  if (isset($_POST['submit'])) {
    // Only save the first 5 artists selected
    $_SESSION['preferred_artists'] = array_slice($_POST['artists'], 0, 5);
  }

}

?>
