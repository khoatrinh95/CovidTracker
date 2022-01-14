<?php
$db=mysqli_connect("fec353.encs.concordia.ca","fec353_4","353y2021","fec353_4","3306") or die("CANNOT CONNECT TO DB");
    
function showRegions(){
    $db=mysqli_connect("fec353.encs.concordia.ca","fec353_4","353y2021","fec353_4","3306") or die("CANNOT CONNECT TO DB");
    $query = "SELECT * FROM Alert";
    $result = mysqli_query($db, $query);
    $count = mysqli_num_rows ($result);
    echo '<form action="" method="post">
    <select  name="region_select" required class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
    <option selected>Please select a region</option>';
    while ($row = mysqli_fetch_array($result)){
        $region = $row['Region'];
        echo '
    <option value="'.$region.'">'.$region.'</option>';
    }
    echo ' </select>';
    echo '
    <p>From  <input type="date" required="required" name="from" /></p>  
    <p>To  <input type="date" required="required" name="to" /></p>';
    echo '<br><br><div style = "text-align:center" ><p><button style="margin:auto" type="submit" class="btn btn-primary">Submit</button></p>
		<p><a href="HomePage.html">Back to Home page</a></p></div>';



    if (empty($_POST['region_select'])){

    }
    else if ($_POST['region_select'] != "Please select a region"){
        $inregion = $_POST['region_select'];
        $infrom = $_POST['from'];
        $into = $_POST['to'];

        $querypos = "select count(*) as count
        from Person p , `Diagnostics` d 
        where p.City in (select city from region r2 where region='$inregion') and p.Medicare = d.PatientMediCare  and d.`Result` ='positive';";
        $queryneg = "select count(*) as count
        from Person p , `Diagnostics` d 
        where p.City in (select city from region r2 where region='$inregion') and p.Medicare = d.PatientMediCare  and d.`Result` ='negative';";
        $queryalert = "select distinct `Date` ,OldState ,NewState 
        from Messages m 
        where (m.`Date` between '$infrom' and '$into') and m.Region ='$inregion';";

        $resultpos = mysqli_query($db,$querypos);
        $resultneg = mysqli_query($db,$queryneg);
        $resultalert = mysqli_query($db,$queryalert);

        $countpos = mysqli_fetch_row($resultpos);
        $countneg = mysqli_fetch_row($resultneg);

        echo '<div style="margin-top:60px">

          <h3 >Here is the report for region '.$inregion.'</h3><br>
          <h5 class="card-title">From '.$infrom.' to '.$into.'</h5>
          <h6 class="card-subtitle mb-2 text-muted">'.$countpos[0].' people were tested positive</h6>
          <h6 class="card-subtitle mb-2 text-muted">'.$countneg[0].' people were tested negative</h6><br>
          <h5 class="card-title">History of alerts</h5>
          <ul>';
        
          while($row=mysqli_fetch_array($resultalert)){
              echo '<li>On '.$row["Date"].', the region was moved from alert level '.$row["OldState"].' to alert level '.$row["NewState"].'</li>';
          }
          echo '</ul>
      </div>';
      
        
    }
    else{
        echo '<p style="color:red">Please select a region</p>';
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
    <div>
<h1 style="text-align:center"> Region Report</h1>
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
<br><br>

<?php
   showRegions();
?>
</div>
</body>
</html>