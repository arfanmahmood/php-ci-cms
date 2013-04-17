<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Add New Fabrics - Sapphire Finishing Mills Ltd.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="js/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 980px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
    </style>
    <link href="js/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="resources/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="http://twitter.github.com/bootstrap/assets/ico/favicon.png">
  </head>

  <body>

    <div class="container-narrow">

      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="dashboard.php"><i class="icon-home"></i> Dashboard</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" data-target="#"><i class="icon-star"></i> Fabrics Management <b class="caret"></b></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
              <li><a href="features.php">Features</a></li>
              <li><a href="fabrics.php">Fabrics</a></li>
            </ul>
          </li>
          <li><a href="users.php"><i class="icon-user"></i> Users</a></li>
          <li><a href="logout.php"><i class="icon-off"></i> Logout</a></li>
        </ul>
        <h3 class="muted">Sapphire Finishing Mills Ltd.</h3>
      </div>

      <hr>

        <h2 class="muted">Add New Fabrics</h2>
        
        <ul class="breadcrumb">
          <li><a href="dashboard.php">Dashboard</a> <span class="divider">/</span></li>
          <li><a href="fabrics.php">Fabrics</a> <span class="divider">/</span></li>
          <li class="active">Add New Febrics</li>
        </ul><br />
        
      <div class="row-fluid marketing controls-row">
      
        
      <form class="form-horizontal">
        <div class="control-group">
          <label class="control-label" for="inputRefrence">Refrence</label>
          <div class="controls">
            <input type="text" id="inputRefrence" placeholder="Refrence" class="input-xxlarge">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="inputArticle">Article</label>
          <div class="controls">
            <input type="text" id="inputRefrence" placeholder="Article" class="input-xxlarge">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="inputWeave">Weave</label>
          <div class="controls">
            <input type="text" id="inputWeave" placeholder="Weave" class="input-xxlarge">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="inputGSM">GSM</label>
          <div class="controls">
            <input type="text" id="inputGSM" placeholder="GSM" class="input-xxlarge">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="inputBlend">Blend</label>
          <div class="controls">
            <input type="text" id="inputBlend" placeholder="Blend" class="input-xxlarge">
          </div>
        </div>
        
        <hr>

        <div class="control-group">
          <label class="control-label" for="inputType">Type</label>
          <div class="controls">
            <select id="inputType" class="input-xxlarge muted">
              <option>Institutional</option>
              <option>Industrial</option>
            </select>            
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="inputCategory">Category</label>
          <div class="controls">
            <select id="inputCategory" class="input-xxlarge muted">
              <option>ToughCrusher</option>
              <option>Frontline</option>
              <option>SmartGarment</option>
            </select>            
          </div>
        </div>
        
        <hr>


        <div class="control-group">
          <label class="control-label" for="inputPicture">Upload Picture</label>
          <div class="controls">
            <input type="text" id="inputPicture" placeholder="Upload Picture" class="input-xxlarge">
          </div>
        </div>

        <div class="control-group">
          <div class="controls">
            <button type="submit" class="btn btn-primary">Save Changes</button> <button type="submit" class="btn">Cancel</button>
          </div>
        </div>
      </form>

      </div>

      <hr>

      <div class="footer">
        <p>&copy; Company 2013</p>
      </div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>

  </body>
</html>
