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

<h1 style="text-align: center;margin-top: 2%"> welcome to COVID-19 Public Health Care System</h1>
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

<div style="width: 70%; float: right; margin-right: 3%;margin-top: 10%">
    <form method="post" >
        <input name="date" class="form-control form-control-lg" type="date" placeholder="Enter a date">
        <br/>
        <button name="List" type="submit" class="btn btn-primary">List People</button>


    </form>
</div>


<?php
if(isset($_POST['List'])) {
    echo'<div style="width: 70%; float: right; margin-right: 3%;margin-top: 10%">
    <table border="4px" style="width: 100%">
        <tr style="font-size: 16px; font-weight: bold; height: 30px">
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Test Result</th>
        </tr>';


    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $db= mysqli_connect("fec353.encs.concordia.ca", "fec353_4","353y2021", "fec353_4","3306") or die ("fail");
    $query="Select FName,LName,DOB,PhoneNo,Email,Result from Person, Diagnostics where TestResultDate='$date' and
                                                                           Medicare=PatientMediCare order by Result desc";
    $record=mysqli_query($db,$query);
    while($data = mysqli_fetch_array($record))
    {
        ?>
        <tr style="height: 35px">
            <td><?php echo $data['FName']; ?></td>
            <td><?php echo $data['LName']; ?></td>
            <td><?php echo $data['DOB']; ?></td>
            <td><?php echo $data['PhoneNo']; ?></td>
            <td><?php echo $data['Email']; ?></td>
            <td><?php echo $data['Result']; ?></td>
        </tr>
        <?php
    }
}
    ?>

    </table>
</div>
</body>