<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
  
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-4">
      <form action="pdfBuilder.php" method="post">
	    
		<div class="form-group">
		<label>Application Reference Number</label>
	     <input name="rsbr_app_refNumber" type="text" class="form-control" placeholder="Enter Certificate Id"/>
		</div>
	    
	    <div class="form-group">
		<label>Record Title</label>
	     <input name="rsbr_record_title" type="text" class="form-control" placeholder="Enter Certificate Id"/>
		</div>
		
	    <div class="form-group">
		<label>Certificate Id</label>
	     <input name="rsbr_certificate_Id" type="text" class="form-control" placeholder="Enter Certificate Id"/>
		</div>
		
	    <div class="form-group">
		<label>Certificate Text</label>
	     <textarea name="rsbr_certificate_txt" class="form-control" style="height:300px;">
		 The Longest Wooden Toy Train Track is 2,196.50 m {7,206 ft 4 in} long and was built by Bigjigs Toys Ltd. 
		 {Uk}. It was presented and measured at Chatham Historic Dockyard in Medway. Kent, UK, on 26 July 2019.
		 </textarea>
		</div>
		
		<div class="form-group">
		  <button type="submit" class="btn btn-primary form-control">Generate Certificate</button>
		</div>
		
	  </form>
    </div>
    <div class="col-sm-4">
      <h3>Column 2</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
    <div class="col-sm-4">
      <h3>Column 3</h3>        
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
  </div>
</div>

</body>
</html>
