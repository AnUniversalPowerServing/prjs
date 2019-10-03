<style>
.rsbr-menu { border-bottom:1px solid #8f99af; }
</style>
<div id="sidebar-wrapper" style="background-color:#0e2551;">
	  <ul class="sidebar-nav">
        <li class="rsbr-menu"><!-- background-color:tomato; -->
	       <a href="index.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;<span><b>Home</b></span></a>
        </li>
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
	       <a href="about-us.php">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;<span><b>About Us</b></span>
		   </a>
        </li>		
		<li class="rsbr-menu"><!-- background-color:tomato; -->
	       <a href="our-news.php">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Our News</b></span>
		   </a>
        </li>	
		<?php
  			    if(isset($_SESSION["USER_ACCOUNT_ID"])) { 
			    if($_SESSION["USER_ACCOUNT_ID"]=='ADMINISTRATOR') { 
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
	       <a href="manage_admin_panelboard.php">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Manage Panel Board</b></span>
		   </a>
          </li>
		  <li class="rsbr-menu"><!-- background-color:mediumSeaGreen; -->
	       <a href="manage_admin_media.php">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Manage News</b></span>
		   </a>
          </li>
		  <li class="rsbr-menu"><!-- background-color:mediumSeaGreen; -->
	       <a href="manage_admin_gallery.php">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Manage Gallery</b></span>
		   </a>
          </li>
		 
		</div>
		<?php
  			} else if($_SESSION["USER_ACCOUNT_ID"]=='ADMINISTRATOR') { 
		?>
		<li class="rsbr-menu" data-toggle="collapse" data-target="#sidebar-menu-customer"><!-- background-color:mediumSeaGreen; -->
	       <a href="#">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Customer management</b></span>
			 <i class="fa fa-2x fa-angle-double-down pull-right" style="padding-top:8px;padding-right:8px;" aria-hidden="true"></i>
		  </a>
        </li>
		<div id="sidebar-menu-customer" class="collapse" style="background-color:#005eb8;">
		
		  <li class="rsbr-menu"><!-- background-color:mediumSeaGreen; -->
	       <a href="manage_customer_viewNewRequests.php">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>View New Requests</b></span>
		   </a>
          </li>
		  <li class="rsbr-menu"><!-- background-color:mediumSeaGreen; -->
	       <a href="manage_customer_viewRequestsHistory.php">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>View Requests History</b></span>
		   </a>
          </li>
		</div>
		<?php } } ?>
		<li class="rsbr-menu" data-toggle="collapse" data-target="#sidebar-menu-records"><!-- background-color:mediumSeaGreen; -->
	       <a href="#">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Records</b></span>
			 <i class="fa fa-2x fa-angle-double-down pull-right" style="padding-top:8px;padding-right:8px;" aria-hidden="true"></i>
		  </a>
        </li>
		<div id="sidebar-menu-records" class="collapse" style="background-color:#005eb8;">
		
		 <li class="rsbr-menu"><!-- background-color:mediumSeaGreen; -->
	       <a href="apply-set-a-record.php">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Apply to Set a Record</b></span>
		   </a>
         </li>
		 
		 <li class="rsbr-menu"><!-- background-color:mediumSeaGreen; -->
	       <a href="marketing-solutions.php">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Marketing Solutions</b></span>
		   </a>
         </li>
		 
		 <li class="rsbr-menu"><!-- background-color:mediumSeaGreen; -->
	       <a href="record-breaking-types.php">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Record-Breaking Types</b></span>
		   </a>
         </li>
		 
		 <li class="rsbr-menu"><!-- background-color:mediumSeaGreen; -->
	       <a href="record-formats.php">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Record Formats</b></span>
		   </a>
         </li>
		 
		 <li class="rsbr-menu"><!-- background-color:mediumSeaGreen; -->
	       <a href="application-rejection.php">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Application Rejection</b></span>
		   </a>
         </li>
		 
		</div>
		<li class="rsbr-menu"><!-- background-color:#f73e7d; -->
	       <a href="our-panel-board.php">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Our Panel Board</b></span>
		   </a>
        </li>	
		<li class="rsbr-menu"><!-- background-color:#a02cd6; -->
	       <a href="our-gallery.php">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Our Gallery</b></span>
		   </a>
        </li>
		<li class="rsbr-menu"><!-- background-color:tomato; -->
	       <a href="find-categories.php">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Find Categories</b></span>
		   </a>
        </li>
		<li class="rsbr-menu"><!-- background-color:mediumSeaGreen; -->
	       <a href="faq.php">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Frequently Asked Questions</b></span>
		   </a>
        </li>
		<li class="rsbr-menu"><!-- background-color:slateBlue; -->
	       <a href="careers.php">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Careers</b></span>
		   </a>
        </li>
		<li class="rsbr-menu"><!-- background-color:#f73e7d; -->
	       <a href="rsbr-store.php">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>RSBR Store</b></span>
		   </a>
        </li>
		<li class="rsbr-menu"><!-- background-color:mediumSeaGreen; -->
	       <a href="advertise-be-a-sponsor.php">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Advertise / Be a Sponsor</b></span>
		   </a>
        </li>
		<li class="rsbr-menu"><!-- background-color:slateBlue; -->
	       <a href="contact-us.php">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Contact Us</b></span>
		   </a>
        </li>
		<li class="rsbr-menu"><!-- background-color:dodgerBlue; -->
	       <a href="termsAndConditions.php">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Terms and Conditions</b></span>
		   </a>
        </li>
		<li class="rsbr-menu"><!-- background-color:tomato; -->
	       <a href="privacypolicy.php">
		     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
			 <span><b>Privacy Policy</b></span>
		   </a>
        </li>
        <!-- -->
		
		<!-- -->
       </ul>
	</div>
	