<!DOCTYPE html>
<?php
	include('header.php');
	include('sidebar.php');

    session_start();
    if(isset($_SESSION['username'])){
        
    }else{
        header("Location: index.php");
    }
?>

<html>
<head></head>
<body>

<!-- Header -->
<div id="header">
    <div class="color-line"></div>
    <div id="lightboxOverlay" class="lightboxOverlay"></div>
    <div class="body_loader text-center">
        <img src="images/loading-bars.svg" width="60%" height="60%">
        <p>Please Wait</p>
    </div>
    <!-- <div class="loader">
        <h1>Loading</h1>
        <p>Please Wait</p>
        <img src="images/loading-bars.svg" width="64" height="64" /> 
    </div> -->
    <div id="logo" class="light-version">
        <span>
        Homer Theme
        </span>
    </div>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary">HOMER APP</span>
        </div>
        <form role="search" class="navbar-form-custom" method="post" action="#">
            <div class="form-group">
                <input type="text" placeholder="Search something special" class="form-control" name="search">
            </div>
        </form>
        <div class="mobile-menu">
            <button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
            <i class="fa fa-chevron-down"></i>
            </button>
            <div class="collapse mobile-navbar" id="mobile-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="" href="index.php">Login</a>
                    </li>
                    <li>
                        <a class="" href="index.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav no-borders">
                <li class="dropdown">
                    <a href="index.php">
                    <i class="pe-7s-upload pe-rotate-90"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!-- Main Wrapper -->
<div id="wrapper">