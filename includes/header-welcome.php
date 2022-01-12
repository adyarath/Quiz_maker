<?php
session_start();
require('database/db_test.php');
if(isset($_SESSION["userEmail"]) || $_SESSION["userEmail"] == true){}
else{
    header("location: auth");
    exit;
}
?>

        <link rel="stylesheet" href="assets/css/header-style.css">
        <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script type="text/javascript" src="assets/js/header-script.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"  />
    
        <header id="headerblanter" itemscope="itemscope" style="background:black;" itemtype="http://schema.org/WPHeader">
        <a href="javascript:void" id="showjalantikus" title="Show Navigation"><i class="material-icons"></i></a>
        <div class="header2 section" id="header2" >
        <div class="widget Header" data-version="1" id="Header1">
        <div id="header-inner" >
        <a href="welcome.php" id="welcome">RADON COSMOS</a>
        </div>
        </div>
        </div>
        
        <div id="menu-wrapper" style="background:black;">
        <div id="navigation">
        <ul style="float: right;">
            
            <li>
            <a class="blanter-nav" href="index.html" itemprop="url">
                <span itemprop="name">Homepage
                </span>
            </a>
        </li>
        
        <li>
            <a class="blanter-nav" href="welcome.php" itemprop="url">
                <span itemprop="name">Welcome Page
                </span>
            </a>
        </li>
        
        <li>
            <a class="blanter-nav" href="viewalltest.php" itemprop="url">
                <span itemprop="name">Dashboard
                </span>
            </a>
        </li>

        <li id="maindrop">
            <a class="blanter-nav" href="#" itemprop="url" style="width:200px;" id="click">
                <span itemprop="name" ><?php echo strip_tags(substr(htmlspecialchars($_SESSION["username"]),0,8)); ?>&nbsp;&nbsp;
                    <?php if(isset($_SESSION['user_image'])){ ?>
                    <img src="<?php echo $_SESSION["user_image"]; ?>">
                    <?php } ?>
                    <i class="arrow down"></i>
                </span>
            </a>
            <ul class="dropdown" id="dropdown">
            <li>
            <a class="blanter-nav" href="reset-password.php" itemprop="url">
                <span itemprop="name">
                    Reset Password
                </span>
            </a>
            </li><br>
            <li>
            <a class="blanter-nav" href="./auth/logout.php" itemprop="url">
                <span itemprop="name">Sign Out
                </span>
            </a>
            </li>
            
            </ul>
        </li>
        
        </ul>
        </div>
        </div>
    </header>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
    header{background:transparent !important;font-family: 'Poppins', sans-serif !important;}
    #navigation ul li a:hover{background:#8e275b !important; opacity:0.8}
    #welcome{display: block; font-size:0.8em; color:white; padding-left: 25px}
    .blanter-nav span{color: white !important;  text-transform: none !important; font-weight: 500 !important}
    .blanter-nav span img{height: 20px; width: 20px; border-radius: 50%}
    @media only screen and (max-width: 600px) {
        header{background:black !important;}
    #welcome{
        position: relative; top: -5px
    }
        
    #maindrop ul li{
        background:black;
        width:100% !important;
    }
    #click{
        width:100% !important;
    }
    .dropdown{
        width: 100% !important;
    }
}
    #maindrop ul li{
        background:black;
        width:200px;
    }
    
    .dropdown{
        display:none;
        float: left;
        overflow: hidden;
    }
    .main{
        display:block;
    }
    .arrow {
        border: solid white;
        border-width: 0 3px 3px 0;
        display: inline-block;
        padding: 2px ;
        position:relative;
        left:8px;
        bottom:3px;
    }
    .down {
        transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
    }
 </style>
 <script>
     $('#click').click(function() {
    $('.dropdown').slideToggle('slow').addClass( "main" );
    return false;
});
 </script>