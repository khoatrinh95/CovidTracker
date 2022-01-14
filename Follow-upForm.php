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
<?php
$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>
<div style="width: 70%; float: right; margin-right: 3%;margin-top: 3%">
    <form method="post">
        <div class="row">
            <div class="col">
                <input name="medicare" type="text" class="form-control" placeholder="Medicare Number">
            </div>
            <div class="col">
                <input name="date" type="date" class="form-control" placeholder="Current Date" value="<?php echo$today;?>" readonly>
            </div>
            <div class="col">
                <input name="time" type="time" class="form-control" placeholder="Current Time" value= "<?php echo date('H:i:s'); ?>" readonly>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col">
                <input name="Temp" type="text" class="form-control" placeholder="Current Temperature">
            </div>
        </div>
        <br/>
        <div>
        <label style="font-weight: bold;font-size: 20px">
            The main symptoms
        </label>
        </div>
        <div class="form-check">
            <input name="sym[]" class="form-check-input" type="checkbox" value="a1" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Fever.
            </label>
        </div>
        <div class="form-check">
            <input name="sym[]" class="form-check-input" type="checkbox" value="a2" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Cough.
            </label>
        </div>
        <div class="form-check">
            <input name="sym[]" class="form-check-input" type="checkbox" value="a3" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Shortness of breath or difficulty breathing.
            </label>
        </div>
        <div class="form-check">
            <input name="sym[]" class="form-check-input" type="checkbox" value="a4" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                 Loss of taste and smell.
            </label>
        </div>
        <br/>
        <div>
            <label style="font-weight: bold;font-size: 20px">
                Other symptoms
            </label>
        </div>
        <div class="form-check">
            <input name="sym[]" class="form-check-input" type="checkbox" value="b1" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
              Nausea.
            </label>
        </div>
        <div class="form-check">
            <input name="sym[]" class="form-check-input" type="checkbox" value="b2" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Stomach aches.
            </label>
        </div>
        <div class="form-check">
            <input name="sym[]" class="form-check-input" type="checkbox" value="b3" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Vomiting.
            </label>
        </div>
        <div class="form-check">
            <input name="sym[]" class="form-check-input" type="checkbox" value="b4" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Headache.
            </label>
        </div>
        <div class="form-check">
            <input name="sym[]" class="form-check-input" type="checkbox" value="b5" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Muscle pain
            </label>
        </div>
        <div class="form-check">
            <input name="sym[]" class="form-check-input" type="checkbox" value="b6" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Diarrhea.
            </label>
        </div>
        <div class="form-check">
            <input name="sym[]" class="form-check-input" type="checkbox" value="b7" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Sore throat.
            </label>
        </div>
        <br/>
        <div>
            <label style="font-weight: bold;font-size: 20px">
                Add other symptoms
            </label>
        </div>
        <div class="row">
            <div class="col">
                <input name="other" type="text" class="form-control" placeholder="">
            </div>
        </div>
        <br/>
        <button name="Submit" type="submit" class="btn btn-primary btn-lg btn-block" ">Submit</button>

    </form>
</div>
<?php
if(isset($_POST['Submit'])) {
    $db = mysqli_connect("fec353.encs.concordia.ca", "fec353_4", "353y2021", "fec353_4", "3306") or die ("fail");
    $sym= isset($_POST['sym']) ? $_POST['sym'] : '';
     $medicare=isset($_POST['medicare']) ? $_POST['medicare'] : '';
     $date=isset($_POST['date']) ? $_POST['date'] : '';
     $time=isset($_POST['time']) ? $_POST['time'] : '';
     $temp =isset($_POST['Temp']) ? $_POST['Temp'] : '';
     $other=isset($_POST['other']) ? $_POST['other'] : '';
     $Fever=0;
    $Cough=0;
    $Cough=0;
    $breath=0;
    $taste=0;

    $nausea=0;
    $stomach=0;
    $vomiting=0;
    $headache=0;
    $muscle=0;
    $diarrhea=0;
    $throat=0;


    foreach ($sym as $value){

        if($value=='a1'){
            $Fever=1;
        }
        if($value=='a2'){
            $Cough=1;
        }
        if($value=='a3'){
            $breath=1;
        }
        if($value=='a4'){
            $taste=1;
        }
        if($value=='b1'){
            $nausea=1;
        }
        if($value=='b2'){
            $stomach=1;
        }
        if($value=='b3'){
            $vomiting=1;
        }
        if($value=='b4'){
            $headache=1;
        }
        if($value=='b5'){
            $muscle=1;
        }
        if($value=='b6'){
            $diarrhea=1;
        }
        if($value=='b7'){
            $throat=1;
        }

    }
    $query= "insert into Symptoms values ('$medicare','$today','$time','$temp','$Fever','$Cough','$breath','$taste',
                             '$nausea','$stomach','$vomiting','$headache','$muscle','$throat','$other')";
    mysqli_query($db,$query);
    echo "<script>
            window.location.href='HomePage.html';
            </script>";
}

?>
</body>