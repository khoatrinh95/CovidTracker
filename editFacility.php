<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facility Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

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

<?php
session_start();
$CenterID = $_SESSION['CenterID'];
$db= mysqli_connect("fec353.encs.concordia.ca", "fec353_4","353y2021", "fec353_4","3306") or die ("fail");
$query = "Select * from PublicHealthCenter where CenterID='$CenterID' ";
$result = mysqli_query($db,$query);
$row = $result->fetch_assoc();

$Name = $row['Name'];
$Address = $row['Address'];
$PhoneNo = $row['PhoneNo'];
$Type = $row['Type'];
$WebAddress = $row['WebAddress'];
$Accept = $row['Accept_Patients'];


?>


<div id="addForm" style="width: 70%; float: right; margin-right: 3%;margin-top: 10%" >
    <form method="post"  action="Facility.php">
    <div class="row">
            <div class="col">
            <input name="CenterID" type="text" class="form-control" placeholder="CenterID"
                       value="<?php echo $CenterID;?>" readonly>
            </div>
            <div class="col">
                <input name="Name" type="text" class="form-control" placeholder="Name" value="<?php echo $Name;?>">
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col">
                <input name="Address" type="Address" class="form-control" placeholder="Address" value="<?php echo $Address;?>">
            </div>
            <div class="col">
                <input name="PhoneNo" type="number" class="form-control" placeholder="PhoneNo" value="<?php echo $PhoneNo;?>">
            </div>
            <div class="col">
                <input name="Type" type="text" class="form-control" placeholder="Type" value="<?php echo $Type;?>">
            </div>
            <div class="col">
                <input name="Accept" type="text" class="form-control" placeholder="Accept" value="<?php echo $Accept;?>">
            </div>
            <div class="col">
                <input name="WebAddress" type="text" class="form-control" placeholder="WebAddress" value="<?php echo $WebAddress;?>">
            </div>
        </div>
        <br/><br/>

        <button name="Save" type="submit" class="btn btn-primary btn-lg btn-block">Save</button>

    </form>
</div>


</div>
</body>
</html>
