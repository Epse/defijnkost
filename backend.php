<?php

// Define your username and password
$username = "johan";
$password = "Rn42DAay";

$page = <<<EOD
<!DOCTYPE html>
<html>
  <head>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
      <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
    <link href="assets/css/summernote.css" rel="stylesheet">
    <script src="assets/js/summernote.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation-example-2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">De Fijnkost</a>
      </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navigation-example-2">
        <ul class="nav navbar-nav">
          <li>
            <a href="index.html" class="btn">Home</a>
          </li>
         </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid-->
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <form action="processnieuws.php" method="post">
          <div class="form-group">
            <input type="text" class="form-control" id="titel" name="titel" placeholder="Titel">
          </div>
          <div class="form-group">
            <textarea id="summernote" class="form-control" name="text"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Opslaan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('#summernote').summernote({
        height: 300
      });
    });  
  </script>
  </body>
</html>
EOD;

if ($_POST['txtUsername'] == $username && $_POST['txtPassword'] == $password) {
    setcookie('fijnback', sha1($_POST['txtUsername'] . $_POST['txtPassword'] . $_SERVER['REMOTE_ADDR']), time()+60*60);
echo $page;
}
elseif ($_COOKIE['fijnback'] == sha1($username . $password . $_SERVER['REMOTE_ADDR'])) {
echo $page;
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