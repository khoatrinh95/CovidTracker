<!-- <!DOCTYPE html>
<html lang="en">

<form action="index.php" method="post">
    <div>
        <?php $use="22"?>
        <label> $use</label>
        <input name="<?=$use?>" type="checkbox" id="A" value="Yeso" checked>
    </div>
    <br/>
    <div>
        <label>last name</label>
        <input name="lastname" type="checkbox" id="B">
    </div>
    <div>
        <label>medicare no.</label>
        <input medicare="lastname" type="checkbox" id="C">
    </div>
    <div>
     <input type="submit"/>
       </div>
    </form>
</html> -->


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



    
<h1 style="text-align: center;margin-top: 2%"> Health Recommendations</h1>
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
<div class="list-group" style="width:20%; margin-right: 2%;margin-top: 3%; float: right">

    <a href="ShowRecommendations.php" class="list-group-item list-group-item-action">Show Recommendations</a>
    <a href="AddRecommendations.php" class="list-group-item list-group-item-action">Add Recommendations</a>
        <a href="MainRecommendations.php" class="list-group-item list-group-item-action">Edit Recommendations</a>
            <a href="DeleteRecommendations.php" class="list-group-item list-group-item-action">Delete Recommendations</a>
       <a href="HomePage.html" class="list-group-item list-group-item-action">Back to Home page</a>
   


</div>

<br/>     <br/>
<div style="width: 50%; float: right; margin-right: 3%;margin-top: 3%">
    <P>
    <form action="" method="post">
        <?php
        
        $i=0;
        $mapper=[];
        $db=mysqli_connect("fec353.encs.concordia.ca","fec353_4","353y2021","fec353_4","3306") or die("errorrrr");
        $result=$db->query("select * from Recommendations");
        foreach($result as $row){
            $use="33";
            
                $mapper[$i]=$row["Main"] ;
                $i++;
            
           
            ?>
     <p>

    <input name="<?=$i-1?>" type="checkbox" id="B" >
    <label> <?php echo $row["Main"] ?>  </label>
        </p>
   
   
   
<?php } ?>
<div>
     <input type="submit" name="submitdelete"/>
     <?php
     if(isset($_POST['submitdelete'])){
       
         foreach($_POST as $a=>$b){
             if ($a!="submitdelete"){
                $message= $mapper[intval($a,10)];
                $message="delete from Recommendations where Main='$message'";
             $db->query($message);
             
             }

         };
        ?>
        <script>
           window.location.href=window.location.pathname+window.location.search+window.location.hash;
        </script>
     <?php }?>

       </div>
        </form>
    </P>
</div>

</body>
</html>
