<?php
    $db=mysqli_connect("fec353.encs.concordia.ca","fec353_4","353y2021","fec353_4","3306") or die("CANNOT CONNECT TO DB");

    function showSymptoms(){
        $db=mysqli_connect("fec353.encs.concordia.ca","fec353_4","353y2021","fec353_4","3306") or die("CANNOT CONNECT TO DB");
        $medicare = $_POST["medicare"];
        $resultDate = date("Y-m-d", strtotime($_POST["resultDate"]));

        $query_positive = "SELECT * FROM Symptoms WHERE Medicare IN (SELECT DISTINCT PatientMedicare FROM Diagnostics WHERE PatientMediCare='$medicare' AND TestResultDate='$resultDate' AND Result='positive')";
        $result = mysqli_query($db,$query_positive);
        echo mysqli_error($db);
        // $row= mysqli_fetch_array($result);
        // echo $row['Temperature'];
    if (!empty($medicare) && mysqli_num_rows($result)==0){
        echo '<p style="color:red">There is no record under your medicare number</p>';
    }
    if ($result->num_rows!=0) {
        echo "<div style='width: 70%; float: right; margin-right: 3%;margin-top: 3%'>
        <br><br><br>
        <h3> Here is the progress of your symptoms: </h3>
        <br>
        <table class='table'>
      <thead>
        <tr>
          <th scope='col'>Date</th>
          <th scope='col'>Time recored</th>
          <th scope='col'>Temperature</th>
          <th scope='col'>Symptoms</th>
        </tr>
      </thead>
      <tbody>";
        while($row= mysqli_fetch_array($result)){
            echo " 
            <tr>
              <th scope='row'>".$row['date']."</th>
              <td>".$row['time']."</td>
              <td>".$row['Temperature']."</td>
              <td>You experienced: <br><ul>";
              
            if ($row['Fever']==1){
                echo "<li>Fever</li>";
            }
            if ($row['Cough']==1){
                echo "<li>Coughing</li>";
            } 
            if ($row['BreathingIssues']==1){
                echo "<li>Breathing Issues</li>";
            } 
            if ($row['TasteAndSmell']==1){
                echo "<li>Loss of taste and smell</li>";
            } 
            if ($row['nausea']==1){
                echo "<li>Nausea</li>";
            } 
            if ($row['stomach']==1){
                echo "<li>Stomachache</li>";
            } 
            if ($row['vomiting']==1){
                echo "<li>Vomiting</li>";
            } 
            if ($row['headache']==1){
                echo "<li>Headache</li>";
            } 
            if ($row['muscle']==1){
                echo "<li>Muscleache</li>";
            } 
            if ($row['throat']==1){
                echo "<li>Sore throat</li>";
            }
            if (isset($row['OtherSymptoms'])){
                echo "<li>".$row['OtherSymptoms']."</li>";
            } 
            echo "
            </ul>  
            </td>
            </tr>
        
          ";
        }
        echo "</tbody>
        </table>
        </div>";
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

    <div style="padding:40px">
<h1 style="text-align:center"> Symptoms Progress</h1>
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

<div style="width: 70%; float: right; margin-right: 3%;margin-top: 3%">
<form action ="SymptomsProgress.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Medicare number</label>
    <input type="text" required="required" class="form-control" name="medicare">
  </div>
  <div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">The date you received your positive test result</label>
  <input name="resultDate" required="required" type="date" class="form-control">
</div> 
  <button name= "Submit" type="submit" class="btn btn-primary">Submit</button>
  <p><a href="HomePage.html">Back to Home page</a></p></div>'
</form>
</div>

<?php
if(isset($_POST['Submit'])){
showSymptoms();
}
?>
</div>
</body>
</html>