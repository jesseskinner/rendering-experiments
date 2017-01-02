<?php ob_start("ob_gzhandler"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Random Links</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Nav Link 1</a></li>
        <li><a href="#">Nav Link 2</a></li>
        <li><a href="#">Nav Link 3</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-8 col-sm-offset-2 text-left"> 
      <h1>Random Links</h1>

      <ol>
        <?php
            $links = json_decode(file_get_contents('links.json'));

            foreach ($links as $i => $link) {
                echo '<li><a href="';
                echo htmlentities($link->link);
                echo '" data-json="';
                echo htmlentities(json_encode($link));
                echo '">';
                echo htmlentities($link->name);
                echo '</a></li>';
            }
        ?>
      </ol>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Sample Footer</p>
</footer>


</body>
</html>