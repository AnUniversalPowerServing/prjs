<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Royal Success Book of Records</title>
  <?php include_once 'templates/api-params.php'; ?>
</head>
<body>
<style>
html { overflow-x:hidden;overflow-y:scroll; }

</style>
<div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	
	<?php include_once 'templates/sidebar-menu.php';?>
	
	<div id="page-content-wrapper">
	   <?php include_once 'templates/top-header.php';?>
	   
	   <div class="container-fluid" style="background-color:#fb3c2f;">
	    <div class="row "> 
		  <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:15px;margin-bottom:15px;">
		   <h4 style="font-family:longdoosi-regular;color:#fff;font-size:28px;">
		   Application Rejection</h4>
		  </div>
		</div>
	   </div>
	   
	   <div class="container-fluid" style="background-color:#fd6d2f;">
	    <div class="row" style="margin-top:25px;margin-bottom:25px;"> 
		  <img src="https://www.guinnessworldrecords.com/Images/largest-humanoid-robot_tcm25-589036.jpg" 
		  class="col-md-4 col-sm-4 col-xs-12"/>
		  <div class="col-md-8 col-sm-8 col-xs-12" style="padding:20px;">
		    <div style="color:#fff;font-size:18px;margin-top:10px;">
			   
			   <div align="justify">
			      
				  <div style="margin-top:25px;line-height:30px;">
				   Unfortunately, a vast amount of suggestions for new titles are rejected every year,<br/> so please read 
				   the information in this section carefully to avoid disappointment.<br/>
				   <div align="right">
					As a good rule of thumb - if you can't measure / weigh / count it,<br/> then it's probably not a record!
				   </div>
				  </div>
			   </div>
			   
			 </div>
		  </div>
		</div>
	   </div>
	   
	   <div class="container-fluid" style="margin-top:25px;">
		 <div class="row">
		   <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom:25px;font-size:18px;color:#777;line-height:30px;">
		     <!-- -->
			 <div class="list-group">
			   <div align="center" class="list-group-item" style="background-color:mediumSeaGreen;color:#fff;">
			      <h4><b>General reasons applications are rejected</b></h4>
			   </div><!--/.list-group-item -->
			   <div align="justify" class="list-group-item">
			   <!-- -->
			     <div class="container-fluid">
				  <div class="row">
				    <div class="col-md-6 col-sm-6 col-xs-12">
				    <!--  -->
					 <ul>
			            <li style="margin-top:15px;"><b>Insufficient description:</b> the details are insufficient for an assessment.</li>
			            <li style="margin-top:15px;"><b>Criteria not met:</b> for example the record is not standardisable 
			               (see <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/make-rsbr-title">
			               WHAT MAKES A ROYAL SUCCESS BOOK OF RECORDS</a> title for full criteria).</li>
			            <li style="margin-top:15px;"><b>No standard format:</b> for example, the suggestion is for most tricks in 7 minutes, 
			                which is not a time frame we monitor. Royal Success book ofRecords monitors records in 
							1 minute, 3 minutes or 1 hour. Please check our guide to record formats.</li>
			            <li style="margin-top:15px;"><b>Research or historic records:</b> they are sourced from expert consultants and 
							institutions and we do not invite proactive applications for these records, you can use 
							the feedback form to alert us about a new record.</li>
					 </ul>
					<!-- -->
				    </div><!--/.col-md-6 col-sm-6 col-xs-12 -->
					<div class="col-md-6 col-sm-6 col-xs-12">
					  <ul>
						<li style="margin-top:15px;"><b>Too specialised:</b> records are there to be broken and create international competition, 
							if your suggestion is too specific it might not be accepted.</li>
						<li style="margin-top:15px;"><b>Inappropriate/offensive:</b> Royal Success book ofRecords will not process inappropriate 
							or offensive applications.</li>
						<li style="margin-top:15px;"><b>Discontinued titles:</b> retired record titles will not appear in the list of records we
							monitor and will not be accepted if suggested as new titles.</li>
					 </ul>
					</div><!--/.col-md-6 col-sm-6 col-xs-12 -->
				  </div><!--/.row -->
				 </div><!--/.container-fluid -->
			   <!-- -->
			   </div><!--/.list-group-item -->
			 </div><!--/.list-group -->
			 <!-- -->
			 <!-- -->
		   </div><!--/.col-md-12 col-sm-12 col-xs-12 -->
		   <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom:25px;font-size:18px;color:#777;line-height:30px;">
		     <!-- -->
			 <div class="list-group">
			   <div align="center" class="list-group-item" style="background-color:dodgerBlue;color:#fff;">
			      <h4><b>Specific types of records that are never accepted</b></h4>
			   </div><!--/.list-group-item -->
			   <div class="list-group-item" style="padding:20px;">
			   <!-- -->
			     <div class="container-fluid">
				  <div class="row">
				    <div class="col-md-6 col-sm-6 col-xs-12">
					<!-- -->
					<ul>
					 <li style="margin-top:15px;"><b>Alcohol consumption:</b> Royal Success book ofRecords no longer considers applications for records 
						involving the rapid consumption of alcohol</li>
					<li style="margin-top:15px;">
				 <b>Animal breeds:</b> Royal Success book ofRecords does not monitor separate categories for different 
				 breeds, only absolute records such as ‘longest ever dog’ and ‘oldest cat living’.
				 </li>
				 <li style="margin-top:15px;">
				  <b>Animal eating and releases:</b> Royal Success book of Records does not monitor any record involving 
				  animals eating or being released. 
				 </li>
				 <li style="margin-top:15px;">
				  <b>Animal records:</b> Royal Success book ofRecords does not monitor any record that can be harmful 
				  to animals
				 </li>
				 <li style="margin-top:15px;">
				  <b>Artwork:</b> due to the very subjective nature of this and the difficulty of even quantifying "art",
				  Royal Success book ofRecords does not consider any claims for drawing/painting. 
				 </li>
				 <li style="margin-top:15px;">
				  <b>Blinking- never / most in 1 minute:</b> we are unable to monitor this as a Royal Success book of Records 
				  title.
				 </li>
				 <li style="margin-top:15px;">
				   <b>Costumed records:</b> with regards to mass participation costume records, Royal Success book of 
				   Records must limit the amount of categories to those which have a very specific, standard, iconic,
				   internationally recognizable dress.
				 </li>
				 <li style="margin-top:15px;">
				   <b>Distance running records (in costume, pushing a pram, etc.):</b> Royal Success book ofRecords only 
				   accepts records for full and half marathon distances. 
				 </li>
				 <li style="margin-top:15px;">
				   <b>Environmentally impactful records:</b> such as largest release of party balloons, sky lanterns, etc. 
				   are no longer monitored. 
				 </li>
				 <li style="margin-top:15px;">
				   <b>Fast learning:</b> it is not possible to measure fairly how fast a subject is learnt therefore 
				   Royal Success book ofRecords does not monitor records based on the time it takes to learn a subject. 
				 </li>
				 <li style="margin-top:15px;">
				   <b>Fastest musician (Fastest violin player, piano player, etc.):</b> after conducting a full and 
				   thorough review Royal Success book ofRecords has concluded that we are unfortunately unable to 
				   continue monitoring these categories. It has become impossible to judge the quality of the renditions, 
				   even when slowed down. 
				 </li>
				 <li style="margin-top:15px;">
				   <b>Fasting/hunger strike:</b> this is such a sensitive and difficult area to monitor, we do not accept 
				   public applications for this category. 
				 </li>
				 <li style="margin-top:15px;">
				   <b>Firsts:</b> are not generally accepted, with the exception of game changing milestones that have 
				   opened up new possibilities and marked the beginning of new eras, fashions and standards.
				 </li>
				 <li style="margin-top:15px;">
				   <b>Freckles:</b> moles, birthmarks and freckles all vary in size and depth, so counting them individually 
				   or assessing their size is not accurate enough for a Royal Success book ofRecords title.
				 </li>
				 <li style="margin-top:15px;">
				   <b>Heaviest pets:</b> Royal Success book ofRecords has discontinued accepting claims for heaviest or 
				   lightest pets. We still measure height, length and age for most animals and pets. 
				 </li>
				 <li style="margin-top:15px;">
				  <b>High score-gamers:</b> high score records for videogames are not actively monitored by Royal Success 
				  book ofRecords.
				 </li>
				 <li style="margin-top:15px;">
				   <b>Highest altitude activity on-board an aircraft:</b> Royal Success book ofRecords does not monitor 
				   highest altitude events (e.g. social event or sports game) aboard aircrafts. We advise applicants to 
				   attempt a ‘Highest altitude’ record title on land as an alternative. 
				 </li>
				 <li style="margin-top:15px;">
				  <b>Improvisation/jamming:</b> Royal Success book of Records is unable to consider applications relating 
				  to jam sessions or improvisation as it is impossible to ensure the musical proficiency and quality of 
				  such performances. 
				 </li>
				 <li style="margin-top:15px;">
				   <b>Listening to music:</b> Royal Success book ofRecords requires every record to be accurately and 
				   objectively quantifiable, but with records involving listening to music or the radio there is no way 
				   of proving that the participants are actually listening to the music and indeed concentrating on this. 
				 </li>
					</ul>
					<!-- -->
					</div><!--/.col-md-6 col-sm-6 col-xs-12 -->
					<div class="col-md-6 col-sm-6 col-xs-12">
					<!-- -->
					<ul>
					<li style="margin-top:15px;">
				   <b>Most people eating/drinking:</b> Royal Success book of Records does not monitor records for the most 
				   people eating any given food stuff. Instead, we monitor a select number of iconic meal records, such as 
				   ‘Largest silver service dinner’ that have set conventions that distinguish them and provide an additional
				   element of challenge. 
				   <ol>
				     <li>
					  <b>Most records broken in a set time:</b> Royal Success book of Records does not monitor a record for 
					  the number of records broken in a set time period. 
					 </li>
					 <li>
					   <b>Most XXX eaten in a minute/Fastest time to eat XXX:</b> Royal Success book of Records already 
					   monitors a limited number of iconic eating records, and there are no plans to accept further titles 
					   in this area at the moment. If you are interested in an eating record, please make an application and 
					   search for eat to view the whole list of possibilities. 
					 </li>
				   </ol>
				 </li>
				 <li style="margin-top:15px;">
				   <b>Oldest person with a disease/syndrome/disability:</b> Royal Success book of Records is no longer able 
				   to monitor records based on ‘oldest person with a disease, syndrome or disability’.
				 </li>
				 <li style="margin-top:15px;">
				   <b>Photography - group photos:</b> due to photographs taken of large crowds at sports events, rallies and 
				   similar, Royal Success book of cannot accept records for largest group photos. 
				 </li>
				 <li style="margin-top:15px;">
				   <b>Poetry:</b> due to the very subjective nature of poetry Royal Success book of Records only monitors 
				   broader publishing records for poetry. 
				 </li>
				 <li style="margin-top:15px;">
				   <b>Qualifications:</b> Royal Success book of Records does not accept records regarding qualifications, 
				   primarily because it is difficult to quantify to a level that will enable adjudication of the record 
				   internationally. Each country and each academic institution has its own methods for awarding course credits, 
				   degrees or qualifications and therefore no international standard can be drawn on which to base a record. 
				 </li>
				 <li style="margin-top:15px;">
				   <b>Qualified by age:</b> Royal Success book of Records tries to include as wide a variety of activities 
				   as possible to appeal to different age groups, and concentrate on absolute records, rather than those 
				   that are qualified in some way. 
				 </li>
				 <li style="margin-top:15px;"> 
				   <b>Records based on originality/uniqueness:</b> 'originality/uniqueness’ are not objectively quantifiable 
				   and cannot therefore form the basis of a world record. 
				 </li>
				 <li style="margin-top:15px;">
				   <b>Records qualified by disability:</b> Royal Success book of Records titles are open to anyone 
				   irrespective of their level of ability
				 </li>
				 <li style="margin-top:15px;">
				  <b>Small fruit/veg/plants:</b> we do not monitor small plant/fruit/vegetable records.
				 </li>
				 <li style="margin-top:15px;">
				   <b>Speeding on public roads:</b> Royal Success book of Records does not accept time-limited attempts in 
				   a motorized vehicle on a public highway, because such attempts would require the challenger to, in effect,
				   undertake a race or time-trial on public roads. The only exception to this rule is if the highways used 
				   are closed off specifically for the purpose of the record attempt. We monitor a wide range of ‘Lowest 
				   fuel consumption in a journey from A to B’ records, and we encourage applicants to consider these as 
				   an alternative. 
				 </li>
				 <li style="margin-top:15px;">
				   <b>Sports achievements:</b> for records directly involving performance in sports, we must only accept those 
				   which occur at a top-level professional, international, or pre-eminent amateur (i.e. Olympics). 
				 </li>
				 <li style="margin-top:15px;">
				  <b>Surgeries/invasive medical tests:</b> Royal Success book of Records does not monitor most 
				  operations/invasive tests in a short time span. 
				 </li>
				 <li style="margin-top:15px;">
				   <b>Weightlifting machines:</b> due to the differences in configurations of machine weights these records 
				   are not monitored. 
				 </li>
				 <li style="margin-top:15px;">
				  <b>Young achievers:</b> Royal Success book of Records does not generally recognize endurance records for those 
				  aged 16 or under.
				 </li>
					</ul>
					<!-- -->
					</div><!--/.col-md-6 col-sm-6 col-xs-12 -->
				  </div><!--/.row -->
				 </div><!--/.container-fluid -->
		
			   <!-- -->
			   </div>
			 </div>
			
			 <!-- -->
		   </div><!--/.col-md-12 col-sm-12 col-xs-12 -->
		   
		 </div><!--/.row -->
	   </div><!--/.container-fluid -->
	   <?php include_once 'templates/bottom-footer.php'; ?>
	</div>
	
</div>
</body>
</html>