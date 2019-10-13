<style>
.rsbr-menu { border-bottom:1px solid #8f99af; }
</style>
<div id="sidebar-wrapper" style="background-color:#0e2551;">
	  <ul class="sidebar-nav">
        <li class="rsbr-menu"><!-- background-color:tomato; -->
	       <a href="<?php echo $_SESSION["PROJECT_URL"]?>"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;<span><b>Home</b></span></a>
        </li>
		<?php
  		  if(isset($_SESSION["USER_ACCOUNT_TYPE"]) && $_SESSION["USER_ACCOUNT_TYPE"]=='ADMINISTRATOR') { 
		?>
		<!--
		<li class="rsbr-menu">
	       <a href="<?php echo $_SESSION["PROJECT_URL"]?>admin/dashboard">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;<span><b>My Dashboard</b></span>
		   </a>
        </li>
		-->
		<?php } ?>
		<?php
  		  if(isset($_SESSION["USER_ACCOUNT_TYPE"]) && $_SESSION["USER_ACCOUNT_TYPE"]=='CUSTOMER') { 
		?>
		<li class="rsbr-menu"><!-- background-color:tomato; -->
	       <a href="<?php echo $_SESSION["PROJECT_URL"]?>customer/dashboard">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;<span><b>My Dashboard</b></span>
		   </a>
        </li>
		<?php } ?>
        <li class="rsbr-menu"><!-- background-color:dodgerBlue; -->
	       <a href="<?php echo $_SESSION["PROJECT_URL"]?>app/about-us">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;<span><b>About Us</b></span>
		   </a>
        </li>		
		<li class="rsbr-menu"><!-- background-color:tomato; -->
	       <a href="<?php echo $_SESSION["PROJECT_URL"]?>app/user/media">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Our News</b></span>
		   </a>
        </li>	
		<?php
  			    if(isset($_SESSION["USER_ACCOUNT_TYPE"])) { 
			    if($_SESSION["USER_ACCOUNT_TYPE"]=='ADMINISTRATOR') { 
		?>
		<li class="rsbr-menu" data-toggle="collapse" data-target="#sidebar-menu-admin"><!-- background-color:mediumSeaGreen; -->
	       <a href="#">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Admin management</b></span>
			 <i class="fa fa-2x fa-angle-double-down pull-right" style="padding-top:8px;padding-right:8px;" aria-hidden="true"></i>
		  </a>
        </li>
		<div id="sidebar-menu-admin" class="collapse" style="background-color:#005eb8;">
		
		  <li class="rsbr-menu"><!-- background-color:mediumSeaGreen; -->
	       <a href="<?php echo $_SESSION["PROJECT_URL"]?>app/manage-admin-panelboard">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Manage Panel Board</b></span>
		   </a>
          </li>
		  <li class="rsbr-menu"><!-- background-color:mediumSeaGreen; -->
	       <a href="<?php echo $_SESSION["PROJECT_URL"]?>app/manage-admin-media">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Manage News</b></span>
		   </a>
          </li>
		  <li class="rsbr-menu"><!-- background-color:mediumSeaGreen; -->
	       <a href="<?php echo $_SESSION["PROJECT_URL"]?>app/manage-admin-gallery">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Manage Gallery</b></span>
		   </a>
          </li>
		 
		</div>
		<?php
  			}  } ?>
		<li class="rsbr-menu" data-toggle="collapse" data-target="#sidebar-menu-records"><!-- background-color:mediumSeaGreen; -->
	       <a href="#">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Records</b></span>
			 <i class="fa fa-2x fa-angle-double-down pull-right" style="padding-top:8px;padding-right:8px;" aria-hidden="true"></i>
		  </a>
        </li>
		<div id="sidebar-menu-records" class="collapse" style="background-color:#005eb8;">
		
		 <li class="rsbr-menu"><!-- background-color:mediumSeaGreen; -->
	       <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/apply-set-a-record">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Apply to Set a Record</b></span>
		   </a>
         </li>
		 
		 <li class="rsbr-menu"><!-- background-color:mediumSeaGreen; -->
	       <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/marketing-solutions">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Marketing Solutions</b></span>
		   </a>
         </li>
		 
		 <li class="rsbr-menu"><!-- background-color:mediumSeaGreen; -->
	       <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/standard-applications">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Standard Applications</b></span>
		   </a>
         </li>
		 
		 <li class="rsbr-menu"><!-- background-color:mediumSeaGreen; -->
	       <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/make-rsbr-title">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Make RSBR Title</b></span>
		   </a>
         </li>
		 
		 <li class="rsbr-menu"><!-- background-color:mediumSeaGreen; -->
	       <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/application-rejection">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Application Rejection</b></span>
		   </a>
         </li>
		 
		</div>
		<li class="rsbr-menu"><!-- background-color:#f73e7d; -->
	       <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/user/panelboard">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Our Panel Board</b></span>
		   </a>
        </li>	
		<li class="rsbr-menu"><!-- background-color:#a02cd6; -->
	       <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/user/gallery">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Our Gallery</b></span>
		   </a>
        </li>
		<li class="rsbr-menu"><!-- background-color:tomato; -->
	       <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/find-categories">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Find Categories</b></span>
		   </a>
        </li>
		<!-- 
		<li class="rsbr-menu">
	       <a href="app/faq">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Frequently Asked Questions</b></span>
		   </a>
        </li>
		-->
		<li class="rsbr-menu"><!-- background-color:slateBlue; -->
	       <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/careers">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Careers</b></span>
		   </a>
        </li>
		<li class="rsbr-menu"><!-- background-color:#f73e7d; -->
	       <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/rsbr-store">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>RSBR Store</b></span>
		   </a>
        </li>
		<li class="rsbr-menu"><!-- background-color:mediumSeaGreen; -->
	       <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/advertise-sponsor">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Advertise / Be a Sponsor</b></span>
		   </a>
        </li>
		<li class="rsbr-menu"><!-- background-color:slateBlue; -->
	       <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/contact-us">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Contact Us</b></span>
		   </a>
        </li>
		<li class="rsbr-menu"><!-- background-color:dodgerBlue; -->
	       <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/termsAndConditions">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Terms and Conditions</b></span>
		   </a>
        </li>
		<li class="rsbr-menu"><!-- background-color:tomato; -->
	       <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/privacypolicy">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Privacy Policy</b></span>
		   </a>
        </li>
        <!-- -->
		
		<!-- -->
       </ul>
	</div>
	