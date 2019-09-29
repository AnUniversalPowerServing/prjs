<style>
.carousel-control.left, .carousel-control.right { background-image:none; }
</style>
<div class="container-fluid" style="padding:0px;height:auto;">
  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="z-index:-1;">
	<ol class="carousel-indicators">
	  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	  <li data-target="#myCarousel" data-slide-to="1"></li>
	  <li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
	  <div class="item active">
	    <img src="images/slide-1.jpg" style="width:100%;height:auto;">
	  </div>
	  <div class="item">
		<img src="images/slide-2.jpg" style="width:100%;height:auto;">
	  </div>
	  <div class="item">
		<img src="images/slide-3.jpg" style="width:100%;height:auto;">
	  </div>
	</div>
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
	  <span class="glyphicon glyphicon-chevron-left"></span>
	  <span class="sr-only">Previous</span>
    </a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
	  <span class="glyphicon glyphicon-chevron-right"></span>
	  <span class="sr-only">Next</span>
	</a>
  </div>
</div>