<nav class="navbar-side" role="navigation">
<div class="navbar-collapse sidebar-collapse collapse">
<ul id="side" class="nav navbar-nav side-nav">
<!-- begin SIDE NAV USER PANEL -->
<li class="side-user hidden-xs">
	<div style="float: left;margin-left: -20px !important;  width: 35px;">
<img class="img-circle" height="32" width="32" src="img/<?php echo $row['adminPhoto'];?>" alt="">
</div>
<!-- <p class="welcome">
<i class="fa fa-key"></i> Logged in as
</p> -->
<div class="">
<p class="name tooltip-sidebar-logout">
<span style="color: #fff; font-size: 14px; margin-left: 0px;" class="last-name" ><?php echo $row['adminName']; ?></span> <a style="color: inherit; font-size: 16px;" class="logout_open" href="logout" data-toggle="tooltip" data-placement="top" title="Logout"><i class="fa fa-sign-out"></i></a>
</p>
</div>
<div class="clearfix"></div>
</li>

<li>
<a href="home.php">
<i class="fa fa-dashboard"></i>  Dashboard
</a>
</li>


<li>
<a href="post.php">
<i class="fa fa-edit"></i> Add New Post
</a>
</li>

<!-- begin CHARTS DROPDOWN -->
<li class="panel">
<a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#usersettingsonly">
<i class="fa fa-plus-square"></i> Website Settings <i class="fa fa-caret-down"></i>
</a>
<ul class="collapse nav" id="usersettingsonly">

<li>
<a href="slider.php">
<i class="fa fa-chevron-circle-right"></i> Update Slider 
</a>
</li>

<li>
<a href="services_txt.php">
<i class="fa fa-chevron-circle-right"></i> Update Services
</a>
</li>

<li>
<a href="services-posts.php">
<i class="fa fa-chevron-circle-right"></i>  Services Posts
</a>
</li>


<li>
<a href="best4portfolio-posts.php">
<i class="fa fa-chevron-circle-right"></i> Best 4 Portfolio
</a>
</li>

<li>
<a href="photo_slider_txt.php">
<i class="fa fa-chevron-circle-right"></i> Update title portofolio
</a>
</li>

<li>
<a href="update-about.php">
<i class="fa fa-chevron-circle-right"></i> Update About Us
</a>
</li>

<li>
<a href="update-contact.php">
<i class="fa fa-chevron-circle-right"></i> Update Contact Us
</a>
</li>


<li>
<a href="update_feature_cover.php">
<i class="fa fa-chevron-circle-right"></i> Update backgrounds
</a>
</li>

<li>
<a href="social-links.php">
<i class="fa fa-chevron-circle-right"></i> Social links 
</a>
</li>

</ul>
</li> 
<!-- end CHARTS DROPDOWN -->





<!-- begin CHARTS DROPDOWN -->
<li class="panel">
<a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#usersettings">
<i class="fa fa-plus-square"></i> Settings <i class="fa fa-caret-down"></i>
</a>
<ul class="collapse nav" id="usersettings">

<li>
<a href="logo.php">
<i class="fa fa-chevron-circle-right "></i> Update logo 
</a>
</li>

<li>
<a href="head-dynamic-variable.php">
<i class="fa fa-chevron-circle-right "></i> Head dynamic variable
</a>
</li>

<li>
<a href="footer-dynamic-variable.php">
<i class="fa fa-chevron-circle-right "></i> Footer dynamic variable
</a>
</li>

<li>
<a href="update-index.php">
<i class="fa fa-plus-square"></i> Update Home Meta
</a>
</li>

<li>
<a href="update-cover.php">
<i class="fa fa-chevron-circle-right "></i> Update Section Cover
</a>
</li>


<li>
<a href="google-map.php">
<i class="fa fa-chevron-circle-right "></i> Google map 
</a>
</li>


<li>
<a href="page_cat.php">
<i class="fa fa-chevron-circle-right "></i> Add Post Category
</a>
</li>

</ul>
</li> 



<!-- end CHARTS DROPDOWN 

<li class="panel">
<a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#usersettings">
<i class="fa fa-plus-square"></i> Website Settings <i class="fa fa-caret-down"></i>
</a>
<ul class="collapse nav" id="usersettings">

<li>
<a href="head-dynamic-variable.php">
<i class="fa fa-chevron-circle-right "></i> Head dynamic variable
</a>
</li>

<li>
<a href="footer-dynamic-variable.php">
<i class="fa fa-chevron-circle-right "></i> Footer dynamic variable
</a>
</li>

<li>
<a href="sidebar-dynamic-variable.php">
<i class="fa fa-chevron-circle-right "></i> Sidebar dynamic variable
</a>
</li>

<li>
<a href="logo.php">
<i class="fa fa-chevron-circle-right "></i> Update logo 
</a>
</li>

<li>
<a href="nav-menu.php">
<i class="fa fa-chevron-circle-right "></i> Navbar
</a>
</li>

<li>
<a href="slider.php">
<i class="fa fa-chevron-circle-right"></i> Slider
</a>
</li>

<li>
<a href="services_txt.php">
<i class="fa fa-chevron-circle-right"></i> Services text
</a>
</li>

<li>
<a href="google-map.php">
<i class="fa fa-chevron-circle-right "></i> Google map 
</a>
</li>

<li>
<a href="social-links.php">
<i class="fa fa-chevron-circle-right "></i> Social links 
</a>
</li>


<li>
<a href="page_cat.php">
<i class="fa fa-plus-square"></i> Add page category
</a>
</li>

</ul>
</li>  
 
<li class="panel">
<a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#featuresdrop">
<i class="fa fa-plus-square"></i> Update Meta Tags <i class="fa fa-caret-down"></i>
</a>
<ul class="collapse nav" id="featuresdrop">

<li>
<a href="update-index.php">
<i class="fa fa-chevron-circle-right"></i> Update Home
</a>
</li>

<li>
<a href="update-about.php">
<i class="fa fa-chevron-circle-right "></i> Update About Us
</a>
</li>


<li>
<a href="update-services.php">
<i class="fa fa-chevron-circle-right "></i> Update Services
</a>
</li>


<li>
<a href="update-contact.php">
<i class="fa fa-chevron-circle-right "></i> Update Contact Us
</a>
</li>

<li>
<a href="update-cover.php">
<i class="fa fa-chevron-circle-right "></i> Update Section Cover
</a>
</li>

<li>
<a href="update_feature_cover.php">
<i class="fa fa-chevron-circle-right "></i> Updaate Best 4 Images
</a>
</li>

</ul>
</li> 
<!-- end  DROPDOWN -->

<li>
<a href="settings.php">
<i class="fa fa-wrench"></i> Security
</a>
</li>



</ul><!-- /.side-nav -->
</div><!-- /.navbar-collapse -->
</nav><!-- /.navbar-side -->