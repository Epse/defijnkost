<?php

// Define your username and password
$username = "johan";
$password = "Rn42DAay";

define("MYSQL_HOST", "localhost");
define("MYSQL_DB", "defijnkost_backend");
define("MYSQL_USR", "defijnkost_php");
define("MYSQL_PSW", "n33ws");
define("MYSQL_TBL", "nieuws");

function process()
{
  $mysqli = new mysqli(MYSQL_HOST, MYSQL_USR, MYSQL_PSW, MYSQL_DB);
  
  $query = "INSERT INTO nieuws (title, content) VALUES (\'{$_POST['titel']}\', \'{$_POST['text']}\')";
  echo "<pre>" . $query . "</pre><br>"
  $mysqli->query($query);
  
  $err = $mysqli->errno;
  if ($err != 0)
    echo $err;
  echo "\n<a href='backend.php'>Terug</a>";
}

if ($_POST['txtUsername'] == $username && $_POST['txtPassword'] == $password) {
    setcookie('fijnback', sha1($_POST['txtUsername'] . $_POST['txtPassword'] . $_SERVER['REMOTE_ADDR']), time()+60*60);
  // Do the logic
  process();
}
elseif ($_COOKIE['fijnback'] == sha1($username . $password . $_SERVER['REMOTE_ADDR'])) {
  process();
} else {
?>
<!-- teh login form-->
<h1>Login</h1>

<form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <p><label for="txtUsername">Username:</label>
    <br /><input type="text" title="Enter your Username" name="txtUsername" /></p>

    <p><label for="txtpassword">Password:</label>
    <br /><input type="password" title="Enter your password" name="txtPassword" /></p>

    <p><input type="submit" name="Submit" value="Login" /></p>

</form>
<br>
<?php
}

?>