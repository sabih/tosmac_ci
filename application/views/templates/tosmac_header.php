<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?> - Tosmac</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>bootstrap/css/tosmac.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>bootstrap/css/bootstrap.css">
    <script  src="<?php echo $base_url;?>bootstrap/js/jquery-2.0.3.min.js"></script>
    <script  src="<?php echo $base_url;?>bootstrap/js/tosmac.js"></script>
    <script  src="<?php echo $base_url;?>bootstrap/js/bootstrap.js"></script>
    <script  src="<?php echo $base_url;?>bootstrap/js/suggest.js"></script>
</head>
<body>
    
<?php
/* To make navigation bar link active */
function active_class($request_uri) {
    
    $current_file_name = basename($_SERVER['REQUEST_URI']);        
    if ($current_file_name == $request_uri)
    echo 'class="active"';
    
}
?>

<div id="wrap"><!-- wrap ends in Footer -->
<div class="container"><!-- container ends in Footer -->
    <header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              <a href="<?php echo $base_url;?>home" class="navbar-brand">Tosmac</a>
            </div>
            <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                <ul class="nav navbar-nav">
                    <li <?php active_class('mwi'); ?>>
                        <a href="<?php echo $base_url;?>mwi">MWI</a>
                    </li>
                    <li <?php active_class('mr'); ?>>
                        <a href="<?php echo $base_url;?>mr">MR</a>
                    </li>
                    <li <?php active_class('po'); ?>>
                        <a href="<?php echo $base_url;?>po">PO</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="javascript:void(0)"><?php echo "Welcome ".$username; ?>!</a>
                    </li>
                    <li>
                        <a href="<?php echo $base_url;?>login/logout" name="sign_out">Sign Out</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>