<?php
	$db=mysqli_connect("fec353.encs.concordia.ca","fec353_4","353y2021","fec353_4","3306") or die("CANNOT CONNECT TO DB");
    
	function showRegions(){
		$db=mysqli_connect("fec353.encs.concordia.ca","fec353_4","353y2021","fec353_4","3306") or die("CANNOT CONNECT TO DB");
		$query = "SELECT * FROM Alert";
        $result = mysqli_query($db, $query);
        while ($row = mysqli_fetch_array($result)){
			echo '<div class="card" style="width: 18rem; display:inline-block">
            <div class="card-body">
              <h5 class="card-title">'.$row['Region'].'</h5>
              <h6 class="card-subtitle mb-2 text-muted">Alert Level: '.$row['Alert'].'</h6>
              <form action="" method="post">
    			<p>Change alert level to:  <input type="text" placeholder="Please enter a number" name="'.$row['Region'].'" /></p>
    			
            </div>
          </div>';
			
        }
		echo '<br><br><div style = "text-align:center" ><p><button style="margin:auto" type="submit" name ="Submit" class="btn btn-primary">Submit</button></p>
		<p><a href="HomePage.html">Back to Home page</a></p></div>';
	}
    if(isset($_POST['Submit'])){
	$query = "SELECT * FROM Alert";
	$result = mysqli_query($db,$query);
	while($row = mysqli_fetch_array($result)){
		$region = $row['Region'];
		$newLevel = intval($_POST[$region]);
		$oldLevel = intval($row['Alert']);
		if(!empty($newLevel)){
			if (abs($oldLevel - $newLevel)>1 || $newLevel>4){
				echo '<p style="color:red">Please enter a valid level. An alert can only be upgraded or downgraded
				one level at a time (the highest level is 4)</p>';
			}
			else {
				echo '<p style="color:red"> New level(s) registered </p>';
			}
			$query = "UPDATE Alert SET Alert = $newLevel WHERE Region='$region'";
			mysqli_query($db,$query) or die("CANNOT UPDATE THE DATABASE");
		}
	}
}

    ?>
	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body> 
<h1 style="text-align:center"> Region Alerts</h1>
<br><br>
<div class="list-group" style="width:20%; margin-left: 2%;margin-top: 3%; float: left">
    <a href="HomePage.html" class="list-group-item list-group-item-action">Home Page</a>
    <a href="Person.html" class="list-group-item list-group-item-action">Person</a>
    <a href="PublicHealthWorker.html" class="list-group-item list-group-item-action">Public Health Worker</a>
    <a href="Facility.html" class="list-group-item list-group-item-action">Health Facility</a>
    <a href="GroupZone.html" class="list-group-item list-group-item-action disabled">Group Zone</a>
    <a href="Region.html" class="list-group-item list-group-item-action disabled">Region</a>
    <a href="Recommendations.html" class="list-group-item list-group-item-action disabled">Health Recommendation</a>
    <a href="ChangeAlert.php" class="list-group-item list-group-item-action disabled">Set Alert </a>
    <a href="SignIn.php" class="list-group-item list-group-item-action disabled">Follow-up Form</a>
    <a href="SymptomsProgress.php" class="list-group-item list-group-item-action disabled">Symptoms Progress</a>
    <a href="ShowALLMessages.php" class="list-group-item list-group-item-action disabled">Message</a>
    <a href="ListofAll.php" class="list-group-item list-group-item-action disabled">People in Specific Address</a>
    <a href="FacilityList.php" class="list-group-item list-group-item-action disabled">Health Facility List  </a>
    <a href="DisplayAllRegions.php" class="list-group-item list-group-item-action disabled">Region List</a>
    <a href="people%20test%20result.php" class="list-group-item list-group-item-action disabled">People List for Test Result</a>
    <a href="WorkerInHealthFacility.php" class="list-group-item list-group-item-action disabled">Worker in Health Facility</a>
    <a href="positive%20HW.php" class="list-group-item list-group-item-action disabled">Positive HW List & COWorker </a>
    <a href="RegionReport.php" class="list-group-item list-group-item-action disabled">Region Report</a>

</div>
<div >
<?php
   showRegions();
?>
    </div>
	

</body>
</html>