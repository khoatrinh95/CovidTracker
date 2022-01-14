<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Person Form</title>
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
$medicare = $_SESSION['medicare'];
$db= mysqli_connect("fec353.encs.concordia.ca", "fec353_4","353y2021", "fec353_4","3306") or die ("fail");
$query = "Select * from Person where Medicare='$medicare' ";
$result = mysqli_query($db,$query);
$row = $result->fetch_assoc();

$FirstName= $row['FName'];
$LastName = $row['LName'];
$DOB = $row['DOB'];
$Email = $row['Email'];
$Phone = $row['PhoneNo'];
$DoorNo = $row['Door_num'];
$AppN0 = $row['apt_no'];
$street = $row['Street'];
$City = $row['City'];
$Province = $row['Province'];
$PC = $row['Postal_code'];
$citi = $row['Citizenship'];

?>







<div id="addForm" style="width: 70%; float: right; margin-right: 3%;margin-top: 10%" >
    <form method="post"  action="person.php">
        <div class="row">
            <div class="col">
                <input name="Medicare" type="text" class="form-control" placeholder="Medicare Number"
                       value="<?php echo $medicare;?>" readonly>
            </div>
            <div class="col">
                <input name="FirstName" type="text" class="form-control" placeholder="First name" value="<?php echo $FirstName;?>">
            </div>
            <div class="col">
                <input name="LastName" type="text" class="form-control" placeholder="Last name" value="<?php echo $LastName;?>">
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col">
                <input name="DOB" type="date" class="form-control" placeholder="Date of Birth" value="<?php echo $DOB;?>">
            </div>
            <div class="col">
                <input name="Email" type="email" class="form-control" placeholder="Email" value="<?php echo $Email;?>">
            </div>
            <div class="col">
                <input name="Phone" type="number" class="form-control" placeholder="Phone Number" value="<?php echo $Phone;?>">
            </div>
        </div>
        <br/>

        <div>
            <label>Address</label>

        </div>


        <div class="row">
            <div class="col">
                <input name="DoorNo" type="number" class="form-control" placeholder="Door Number" value="<?php echo $DoorNo;?>">
            </div>
            <div class="col">
                <input name="AppN0" type="number" class="form-control" placeholder="Apartment Number" value="<?php echo $AppN0;?>">
            </div>
            <div class="col">
                <input name="street" type="text" class="form-control" placeholder="Street" value="<?php echo $street;?>">
            </div>
        </div>
        <br/>

        <div class="row">
            <div class="col">
                <input name="City" type="text" class="form-control" placeholder="City"  value="<?php echo $City;?>">
            </div>
            <div class="col">
                <input name="Province" type="text" class="form-control" placeholder="Province" value="<?php echo $Province;?>">
            </div>
            <div class="col">
                <input name="PC" type="text" class="form-control" placeholder="Postal Code" value="<?php echo $PC;?>">
            </div>
            <div class="col">
                <input name="citi"type="text" class="form-control" placeholder="Citizenship" value="<?php echo $citi;?>">
            </div>
        </div>
        <br/><br/>

        <button name="Save" type="submit" class="btn btn-primary btn-lg btn-block">Save</button>

    </form>
</div>


</div>
</body>
</html>
