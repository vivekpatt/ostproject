
<?php
    session_start();
    if ( isset($_POST["email"]) && isset($_POST["pwd"]) ) {
        unset($_SESSION["account"]);  // Logout current user
        if ($_POST[email] == 'abc@co.com' && $_POST["pwd"] == '123') {
            $_SESSION["account"] = $_POST["email"];
            $_SESSION["success"] = "Logged in.";
       
      header('Location: userpage.php' ) ;
            return;
        } else {
            $_SESSION["error"] = "enter correct details.";
            header( 'Location: index.php' ) ;
            return;
        }
   }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
  <style type="text/css">

  @font-face {
    font-family: "Kaushan Script";
    src: url('KaushanScript-Regular.ttf')  format("truetype"),
         url(/font/KaushanScript-Regular.woff) format("woff");
  }
  body .container-fluid #body{
    margin-top: 5px;
    -webkit-box-shadow: 0 0 10px 2px rgba(0,0,0,0.5) ;
box-shadow: 0 0 10px 2px rgba(0,0,0,0.5) ;
  }
.navbar-inverse .navbar-brand {
    font-family: "Kaushan Script";
    font-size: 40px;
    color: white;
    line-height: 13px;
  }
  .container-fluid .navbar{
    margin-bottom: 0;
  }
  .container-fluid .jumbotron{
    height: 500px;
  }
  .container-fluid .jumbotron .container{
    width: 50%;
  }
  .panel-heading{
    padding-bottom: 0;
  }
  </style>

  </head>
  <body>
  	<div class="container-fluid">
      <div id="body">
        <nav class="navbar navbar-inverse text-center">
          <div class="navbar-brand container">feeder</div>
        </nav>
        <div class="jumbotron"> 

          <div class="container">
        
            <div class="panel panel-default">
              <div class="panel-heading">
        
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#login">Login</a></li>
                  <li><a data-toggle="tab" href="#register">Register</a></li>
                </ul>

              </div>

              <div class="panel-body">
                
                <div class="tab-content">
                    <div id="login" class="tab-pane fade in active">
                      
                      <form role="form" method="post">

                        <div class="form-group">
                          <label for="email">Email address:</label>
                          <input type="email" class="form-control" id="account" name="email">
                        </div>

                        <div class="form-group">
                          <label for"pwd">Password:</label>
                          <input type="password" class="form-control" id="pwd" name="pwd">
                        </div>
                        <button type="submit" class="btn btn-default">login</button>

                      </form>
                    
                    </div>

                    <div id="register" class="tab-pane fade">


                      <form role="form" method="post">
                        <div class="form-group">
                          <label for="email">Email address:</label>
                          <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                          <label for"pwd">Password:</label>
                          <input type="password" class="form-control" id="pwd" name="pwd">
                        </div>
                        <button type="submit" class="btn btn-default">login</button>

                      </form> 

                    </div>
                  </div>


              </div>

              <div class="panel-footer">
  <?php
      if ( isset($_SESSION["error"]) ) {
          echo '<p class="alert alert-warning"> <a href="#">
          <span class="glyphicon glyphicon-info-sign"></span>
          </a>';
          echo($_SESSION["error"]."</p>\n");
          unset($_SESSION["error"]);
      }
  ?>
              </div>
            </div>
          </div>
          </div>
        </div>



      </div>
      
  	</div>
  </body>
</html>