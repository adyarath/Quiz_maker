<?php
session_start();
require('database/db_test.php');
if(isset($_SESSION["userEmail"]) || $_SESSION["userEmail"] == true){}
else{
    header("location: auth");
    exit;
}
?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<section class="navigation">
  <div class="nav-container">
    <div class="brand">
      <a href="viewalltest.php">Radon Cosmos</a>
    </div>
    <nav>
      <div class="nav-mobile"><a id="navbar-toggle" href="javascript:void(0)"><span></span></a></div>
      <ul class="nav-list">
        <li>
          <a href="index.html">Homepage</a>
        </li>
        <li>
          <a href="welcome.php">Welcome Page</a>
        </li>
        <li>
          <a href="viewalltest.php">Dashboard</a>
        </li>
        <li>
          <a href="javascript:void(0)"><?php echo strip_tags(substr(htmlspecialchars($_SESSION["username"]),0,8)); ?>&nbsp;&nbsp;
                    <?php if(isset($_SESSION['user_image'])){ ?>
                    <img src="<?php echo $_SESSION["user_image"]; ?>">
                    <?php } ?></a>
          <ul class="navbar-dropdown">
            <li>
              <a href="reset-password">Reset Password</a>
            </li>
            <li>
              <a href="./auth/logout.php">Sign Out</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</section>

<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
body{
    font-family: 'Poppins', sans-serif !important;
}
    .navigation {
     height: 54px;
     background: #000;
}
 .brand {
     position: absolute;
     padding-left: 20px;
     float: left;
     line-height: 55px;
     text-transform: uppercase;
     font-size: 18px;
}
 .brand a, .brand a:visited {
     color: #ffffff;
     text-decoration: none !important;
}
 .nav-container {
     width: 100%;
     margin: 0 auto;
}
 nav {
     float: right;
}
.nav-list img{
    height: 20px; 
    width: 20px; 
    border-radius: 50%
    
}
 nav ul {
     list-style: none;
     margin: 0;
     padding: 0;
}
 nav ul li {
     float: left;
     position: relative;
     z-index: 99 !important;
}
 nav ul li a,nav ul li a:visited {
     display: block;
     padding: 0 20px;
     line-height: 55px;
     color: #fff !important;
     background: #000 !important ;
     text-decoration: none !important;
     font-size: 18px;
}
a{
    text-decoration: none !important;
}
 nav ul li a{
     background: transparent !important;
     color: #FFF !important;
}
 nav ul li a:hover, nav ul li a:visited:hover {
     background: #8e275b !important;
     color: #ffffff !important;
}
 .navbar-dropdown li a{
     background: #000 !important;
}
 nav ul li a:not(:only-child):after, nav ul li a:visited:not(:only-child):after {
     padding-left: 4px;
     content: ' \025BE';
}
 nav ul li ul li {
     min-width: 190px;
}
 nav ul li ul li a {
     padding: 15px !important;
     line-height: 20px !important;
}
 .navbar-dropdown {
     position: absolute;
     display: none;
     z-index: 1;
     background: #fff;
     right: 0;
}
/* Mobile navigation */
 .nav-mobile {
     display: none;
     position: absolute;
     top: 0;
     right: 0;
     background: transparent;
     height: 55px;
     width: 70px;
}
 @media only screen and (max-width: 800px) {
     .nav-mobile {
         display: block;
    }
    .brand{
        font-size: 22px;
    }
     nav {
         width: 100%;
         padding: 55px 0 15px;
    }
     nav ul {
         display: none;
    }
     nav ul li {
         float: none;
    }
     nav ul li a {
         padding: 15px;
         line-height: 20px;
         background: #000 !important;
    }
     nav ul li ul li a {
         padding-left: 30px;
    }
     .navbar-dropdown {
         position: static;
}
 @media screen and (min-width:800px) {
     .nav-list {
         display: block !important;
    }
}
 #navbar-toggle {
     position: absolute;
     left: 18px;
     top: 15px;
     cursor: pointer;
     padding: 10px 35px 16px 0px;
}
 #navbar-toggle span, #navbar-toggle span:before, #navbar-toggle span:after {
     cursor: pointer;
     border-radius: 1px;
     height: 3px;
     width: 30px;
     background: #ffffff;
     position: absolute;
     display: block;
     content: '';
     transition: all 300ms ease-in-out;
}
 #navbar-toggle span:before {
     top: -10px;
}
 #navbar-toggle span:after {
     bottom: -10px;
}
 #navbar-toggle.active span {
     background-color: transparent;
}
 #navbar-toggle.active span:before, #navbar-toggle.active span:after {
     top: 0;
}
 #navbar-toggle.active span:before {
     transform: rotate(45deg);
}
 #navbar-toggle.active span:after {
     transform: rotate(-45deg);
}
</style>

<script type="text/javascript">
    (function($) { 
  $(function() { 

    //  open and close nav 
    $('#navbar-toggle').click(function() {
      $('nav ul').slideToggle();
    });


    // Hamburger toggle
    $('#navbar-toggle').on('click', function() {
      this.classList.toggle('active');
    });


    // If a link has a dropdown, add sub menu toggle.
    $('nav ul li a:not(:only-child)').click(function(e) {
      $(this).siblings('.navbar-dropdown').slideToggle("slow");

      // Close dropdown when select another dropdown
      $('.navbar-dropdown').not($(this).siblings()).hide("slow");
      e.stopPropagation();
    });


    // Click outside the dropdown will remove the dropdown class
    $('html').click(function() {
      $('.navbar-dropdown').hide();
    });
  }); 
})(jQuery);
</script>
<script data-ad-client="ca-pub-9973004372604559" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>