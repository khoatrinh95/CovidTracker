<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PublicHealthWorker</title>
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
$query = "Select * from Person as P1, PublicHealthWorker as P2 where P1.Medicare='$medicare' AND  P1.Medicare=P2.MediCare";
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
$id=$row['CenterID'];
?>
<div style="width: 70%; float: right; margin-right: 3%;margin-top: 10%" >
<table style="width: 30%">
    <tr>
        <td style="font-size: 16px; font-weight: bold">Medicare Number</td>
        <td><?php echo $medicare;?></td>
    </tr>

    <tr>
        <td style="font-size: 16px; font-weight: bold">Center ID</td>
        <td><?php echo $id;?></td>
    </tr>
    <tr>
        <td style="font-size: 16px; font-weight: bold">First Name</td>
        <td><?php echo $FirstName;?></td>
    </tr>
    <tr>
        <td style="font-size: 16px; font-weight: bold">Last Name</td>
        <td><?php echo $LastName;?></td>
    </tr>
    <tr>
        <td style="font-size: 16px; font-weight: bold"> Date of Birth</td>
        <td><?php echo $DOB;?></td>
    </tr>
    <tr>
        <td style="font-size: 16px; font-weight: bold">Email</td>
        <td><?php echo $Email;?></td>
    </tr>
    <tr>
        <td style="font-size: 16px; font-weight: bold">Phone Number</td>
        <td><?php echo $Phone;?></td>
    </tr>
    <tr>
        <td style="font-size: 16px; font-weight: bold">Door Number</td>
        <td><?php echo $DoorNo;?></td>
    </tr>
    <tr>
        <td style="font-size: 16px; font-weight: bold">Apartment Number</td>
        <td><?php echo $AppN0;?></td>
    </tr>
    <tr>
        <td style="font-size: 16px; font-weight: bold">Street Name</td>
        <td><?php echo $street;?></td>
    </tr>
    <tr>
        <td style="font-size: 16px; font-weight: bold">City </td>
        <td><?php echo $City;?></td>
    </tr>
    <tr>
        <td style="font-size: 16px; font-weight: bold">Province</td>
        <td><?php echo $Province;?></td>
    </tr>
    <tr>
        <td style="font-size: 16px; font-weight: bold">Postal Code</td>
        <td><?php echo $PC;?></td>
    </tr>
    <tr>
        <td style="font-size: 16px; font-weight: bold">Citizenship</td>
        <td><?php echo $citi;?></td>
    </tr>
</table>
</div>
</table>
</body>