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
<div style="width: 70%; float: right; margin-right: 3%;margin-top: 3%">
    <P>
        <form method="post" action="">
    <label for="s">Enter Province:</label>

<input type="text" id="s" name="Province"
       placeholder="QC,BC,ON...." required
       >

       <label for="e">Enter City:</label>

<input type="text" id="e" name="City"
       placeholder="Montreal,Vancouver...." required
       >
    
    
    </P>
    <p>
    <label for="stime">Enter PostalCode:</label>

<input type="text" id="stime" name="Post"
       
       placeholder="HPK 1I8" required>

       <label for="etime">End Street:</label>

<input type="text" id="etime" name="Street"
       
       placeholder="Rue ..." required>
    </p>


    <p>
    <label for="str">Enter Street number:</label>

<input type="text" id="str" name="Streetnum"
       
       placeholder="123..." required>

       <label for="num">Enter Apt num:</label>

<input type="text" id="num" name="Apt" 
       
       placeholder="223...">
    </p>
    <div>
    <button type="submit" class="btn btn-primary" name="submitInsert">Submit</button>
            </div>
</form>
   
            <?php
            if((isset($_POST['submitInsert']))){
                $Province=$_POST["Province"];
                $City=$_POST["City"];
                  $Post= $_POST["Post"];
                  $Street=$_POST["Street"];
                  $Streetnum=$_POST["Streetnum"];
                  $Apt=$_POST["Apt"];
                  $query="";
                if( strcmp($_POST['Apt'],"")==0){
                    $query="select Fname,LName,DOB,Medicare,PhoneNo,Citizenship,Email from Person where (Door_num = '$Streetnum' and Street='$Street') and (apt_no is null) and (City='$City') and (Province='$Province') and (Postal_code = '$Post')";
                    
                }else{
                    $query="select Fname,LName,DOB,Medicare,PhoneNo,Citizenship,Email from Person where (Door_num = '$Streetnum' and Street='$Street') and (apt_no= '$Apt') and (City='$City') and (Province='$Province') and (Postal_code = '$Post')";
                }
                    $db=mysqli_connect("fec353.encs.concordia.ca","fec353_4","353y2021","fec353_4","3306") or die("errorrrr");
                     $result=$db->query($query);

                foreach($result as $row){?>
                    <div style="width:30%; margin-left: 2%;margin-top: 3%; float: left">
                        <li>
                    <?php echo "First name: "." $row[Fname]";?><br>
                    <?php echo "Last name: "."$row[LName]";?><br>
                    <?php echo "   DOB: "."$row[DOB]";?><br>
                    
                    <?php echo "   Medicare: "."$row[Medicare]";?><br>
                    <?php echo "   Citizenship: "."$row[Citizenship]";?><br>
                    <?php 
                    if($row["PhoneNo"]!=null){?>
                       <?php echo "Phone:"."$row[PhoneNo]";?><br>
                    <?php } ?>

                    <?php $med=$row["Medicare"];
            
                    $father=$db->query("Select FatherMedicare from Parents where  PersonMedicare='$med'");
                  
                   $fatherrow= mysqli_fetch_row ($father);
                   
                        $fathermed=$fatherrow[0];
                        
                        if($fathermed==null||strval($fathermed)==""){
                           $messagef= "Father: Desceased";
                           
                        }else{
                            $fathermed=strval($fathermed);
                           $father=$db->query("Select FName,LName from Person where  Medicare='$fathermed'");
                           $fatherrow= mysqli_fetch_row ($father);
                           
                            $firstfathername=$fatherrow[0];
                            $lastfathername=$fatherrow[1];
                           $messagef="Father: ".$firstfathername." ".$lastfathername;
                       
                            
                        }
                    

                    
                    
                    
                    ?>
                    <?php echo $messagef;?><br>

                    <?php $med=$row["Medicare"];
            
            $father=$db->query("Select MotherMedicare from Parents where  PersonMedicare='$med'");
          
           $fatherrow= mysqli_fetch_row ($father);
           
                $fathermed=$fatherrow[0];
                
                if($fathermed==null||strval($fathermed)==""){
                   $messagef= "Mother: Desceased";
                   
                }else{
                    $fathermed=strval($fathermed);
                   $father=$db->query("Select FName,LName from Person where  Medicare='$fathermed'");
                   $fatherrow= mysqli_fetch_row ($father);
                   
                    $firstfathername=$fatherrow[0];
                    $lastfathername=$fatherrow[1];
                   $messagef="Mother: ".$firstfathername." ".$lastfathername;
               
                    
                }
            

            
            
            
            ?>
            <?php echo $messagef;?><br>

                    <?php 
                    if($row["Email"]!=null){?>
                       <?php echo "Email:"."$row[Email]";?><br>
                    <?php } ?>
                        </li>
                    </div>
                    <?php }
                 
                 }?>
                 



          
</div>
<br/>     <br/>
</body>
</html>