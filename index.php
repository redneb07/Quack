<?php
	session_start();
	// include 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quack</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script src="/phpfreechat-2.1.0/client/lib/jquery-1.8.2.min.js" type="text/javascript"></script>

  <link rel="stylesheet" type="text/css" href="style.css" />
  <link id="pagestyle" rel="stylesheet" type="text/css" href="/phpfreechat-2.1.0/client/themes/carbon/jquery.phpfreechat.min.css" />
  <script>
	  function swapStyleSheet(sheet){
		  document.getElementById('pagestyle').setAttribute('href',sheet);
	  }
  </script>
  <script src="/phpfreechat-2.1.0/client/jquery.phpfreechat.min.js" type="text/javascript"></script>
  
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
	  
	a:link {
    color: navy;
    background-color: transparent;
    text-decoration: none;
	}
	  
	  
	.signup-form {
		width: 60%;
		margin: auto;
		padding-top: 30px;
	}
	  
	.signup-form input {
		width: 90%;
		height: 40px;
		padding: 0px 5%;
		margin-bottom: 4px;
		border: none;
		background-color: #908787;
		font-family: arial;
		font-size: 16px;
		color: #111;
		line-height: 40px;
	}
	  
		.signup-form button {
		display: block;
		margin: auto;
		padding-bottom: 40px;
		width: 30%;
		height: 40px;
		border: none;
		background-color: #222;
		font-family: arial;
		font-size: 16px;
		color: #fff;
		cursor: pointer;
	}
	  
	.signup-form button:hover {
		background-color: #1C771B;
	}
	  
	.nav-login button {
		margin-top: 2%;
		margin-bottom: 2%;
		height: auto;
		background-color: #908787;
		font-family: arial;
		font-size: 16px;
		color: #fff;
		cursor: pointer;		  
	}
	  
	.navbar-header form {
		width: 80%;
	}
	  
	.navbar-header button {
		width: 19%;	  
	}
	  
	.navbar-header input {
		width: 25%;	  
	}
	  
	.navbar-header a {
		text-decoration: none;
	}
	  
	#brand-image {
	    height: 50px;
		width: 44px;
		padding-bottom: 10px;
	}
  </style>
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
      <a class="navbar-brand" href="index.php">
      	<img id="brand-image" alt="Website Logo" src="includes/logo.png" />
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <div class="nav-login">
        	<?php
				if (isset($_SESSION['u_id'])) {
					echo '
						<form action="includes/logout.inc.php" method="POST">
							<button type="submit" class="alert" name="submit">Logout</button>
						</form>';	
				} else {
					echo '			
						<form class="navbar-header" action="includes/login.inc.php" method="POST">
							<input type="text" name="uid" placeholder="Username/e-mail">
							<input type="password" name="pwd" placeholder="Password">
							<button type="submit" class="alert" name="submit">Login</button>
							<a class="acitve" href="signup.php">Sign Up</a>
						</form>';
				}
			?>
      </div>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav"> 
   
    </div>
    <div class="col-sm-8 text-left">
     <h2>Welcome to Quack</h2>
     <p>Quack is a site devoted to connecting live entertainment viewers so they may communicate their reactions and expectations in a live enviorment. No longer are you stuck having to reload your twitter every 3 seconds to see how people reacted to the main character getting their head chopped off.</p> 
     <p>Please be polite and we hope you tell your friends about your experience.</p>
     <p><a class="acitve" href="signup.php">Sign Up</a></p>
	</div>
    <div class="col-sm-2 sidenav">
     
      </div>
    </div>
  </div>

<footer class="container-fluid text-center">
  <p><a href="http://www.meiershane.net/phpfreechat-2.1.0/index.php">meiershane.net</a></p>
</footer>

</body>
</html>