<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>region Form</title>
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
$region = $_SESSION['region'];
$db= mysqli_connect("fec353.encs.concordia.ca", "fec353_4","353y2021", "fec353_4","3306") or die ("fail");
$query = "Select * from region where region='$region' ";
$result = mysqli_query($db,$query);
?>


<div id="addForm" style="width: 70%; float: right; margin-right: 3%;margin-top: 10%" >
    <form method="post"  >
    <div class="row" style="width:100% ">
            <div class="col">
            <input name="region" type="text" class="form-control" placeholder="region"
                       value="<?php echo $region;?>" readonly>
            </div>

            <div class="col" id="addcity" >
            <?php
             while ($row = mysqli_fetch_array($result)){ 
                $city=$row['city'];
                    ?>
                <input name="city[]" type="text" class="form-control" placeholder="city" value="<?php echo $city;?>">
            <?php
            }
            ?>
            </div>
        </div>
        <div class="row">
            <input name="another" type="button" class="btn btn-primary" onclick="addcity()" value="add another city">
        </div>


        <br/><br/>
        <button name="Save" type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
        <?php
        if(isset($_POST['Save'])) {
            $region = isset($_POST['region']) ? $_POST['region'] : '';
            $city = isset($_POST['city']) ? $_POST['city'] : '';
            $deletequery ="DELETE FROM region where region='$region'";
            mysqli_query($db,$deletequery);
            foreach ($city as $value){
            $query="insert into region values ('$value','$region')";
                mysqli_query($db,$query);
            }
            echo "<script>
            window.location.href='Region.html';
            </script>";
        }


        ?>
    </form>
</div>

<script>
    function addcity(){
        var t= $(' <input name="city[]" type="text" class="form-control" placeholder="city" value=""> ');
        $('#addcity').append(t);
    }
</script>

</div>
</body>
</html>
