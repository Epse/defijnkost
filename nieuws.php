<!doctype html>
<html lang="nl">
<head>
<!-- Google API key: AIzaSyC0ey6OU3I1dMsWIaQT_ITEzu9KtgLRjE8 -->
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="assets/paper_img/favicon.ico">

  <title>De Fijnkost</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

  <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
  <link href="assets/css/ct-paper.css" rel="stylesheet"/>
  <link href="assets/css/demo.css" rel="stylesheet" /> 
  <link href="assets/css/defijnkost.css" rel="stylesheet">

  <!--     Fonts and icons     -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
  
  
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-71703017-1', 'auto');
  ga('send', 'pageview');

</script>
  
</head>
<body>
<nav class="navbar navbar-inverse" id="demo-navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand pull-left" href="index.html"><span class="glyphicon glyphicon-home" style="padding-right: 0px;"></span></a>
          <div class="dropdown pull-left">
            <a class="dropdown-toggle btn btn-fill" data-toggle="dropdown" href="#">Bestel&nbsp;<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li>
                <a href="kaasschotels.html">Kaasschotel</a>
              </li>
              <li>
                <a href="broodjes.html#bestel">Broodjes</a>
              </li>
            </ul>
          </div> 
        <button type="button" class="btn btn-fill navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
        <span class="sr-only">Toggle navigation</span>
        Menu&nbsp;<span class="caret"></span>
      </button>
    </div>

<!-- Collect the nav links, forms, and other content for toggling -->
   
    <div class="collapse navbar-collapse" id="navigation-example-2">
      <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="vleeswaren.html" class="btn btn-white btn-simple">Fijne Vleeswaren</a>
          </li>
          <li>
            <a href="gerechten.html" class="btn btn-white btn-simple">Bereide Gerechten</a>
          </li>
          <li>
            <a href="salades.html" class="btn btn-white btn-simple">Eigen salades</a>
          </li>
          <li>
            <a href="kaas.html" class="btn btn-white btn-simple">Kazen &amp; Kaasschotels</a>
          </li>
          <li>
            <a href="broodjes.html" class="btn btn-white btn-simple">Belegde Broodjes</a>
          </li>
          <li>
            <a href="index.html#contact" class="btn btn-fill">Contact</a>
          </li>
          <li>
            <a href="nieuws.php" class="btn btn-fill">Nieuws</a>
          </li>
       </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid-->
</nav>           


<div class="wrapper">  
    <div class="main">
<?php

      // Hier komt wat code om secties te genereren met nieuwspaginas
      define("MYSQL_HOST", "localhost");
      define("MYSQL_DB", "defijnkost_backend");
      define("MYSQL_USR", "defijnkost_php");
      define("MYSQL_PSW", "n33ws");
      define("MYSQL_TBL", "nieuws");
      
      $mysqli = new mysqli(MYSQL_HOST, MYSQL_USR, MYSQL_PSW, MYSQL_DB);
      
      $result = $mysqli->query("SELECT * FROM nieuws");
      $i = 0;
      $html = "";
      while ($row = $result->fetch_assoc())
      {
        $html = $html . "<div class='section section-";
        if ($i%2 == 0)
          $html = $html . "light-brown'>";
        else
          $html = $html . "gray'>";
        $html = $html . "\n<div class='container'>\n<h3>" . htmlspecialchars($row['title']) . 
          "</h3>\n<p>\n" . $row['content'] .
          "\n</p>\n<p><i>" . htmlspecialchars($row['creationDate']) . "</i></p>\n</div>\n</div>\n";
        $i++;
      }
      
      if ($html == "")
      {
        $html = <<<EOD
        <div class="section section-light-brown fullsize">
        <div class="container">
        <h1>Nieuws</h1>
        <p>Binnenkort vind u hier nieuws over ons.</p>
        </div>
        </div>
EOD;
      }
      
      echo $html;
      
      
?>
  </div>    
</div>

<!-- Modal -->
 <div class="scroll-top-wrapper">
  <a href="#top" class="scroll-top-inner">
    <i class="glyphicon glyphicon-chevron-up"></i>
  </a>
</div>

<!--    end modal -->
</body>
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

	<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
	
	<!--  Plugins -->
	<script src="assets/js/ct-paper-checkbox.js"></script>
	<script src="assets/js/ct-paper-radio.js"></script>
	<script src="assets/js/bootstrap-select.js"></script>
	<script src="assets/js/bootstrap-datepicker.js"></script>
	
	<script src="assets/js/ct-paper.js"></script>
	
	<script type="text/javascript">
      function fullsizer() {
        $('.fullsize').css('min-height',$(window).height()+'px');
      }
      
      $(document).ready(function() {
        $('a[href^="#"]').on('click',function (e) {
	    e.preventDefault();

	    var target = this.hash;
	    var $target = $(target);

	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    }, 900, 'swing', function () {
	        window.location.hash = target;
	    });
	});
        	$(document).on( 'scroll', function(){
 
		if ($(window).scrollTop() > 100) {
			$('.scroll-top-wrapper').addClass('show');
		} else {
			$('.scroll-top-wrapper').removeClass('show');
		}
	});
        fullsizer();
        

        
      });
      $(window).resize(function() {
        //fullsizer();
      });
    </script>
</html>