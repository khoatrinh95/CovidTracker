<?php
session_start();
$region = isset($_POST['region']) ? $_POST['region'] : '';
$_SESSION['region'] = $region;

$db= mysqli_connect("fec353.encs.concordia.ca", "fec353_4","353y2021", "fec353_4","3306") or die ("fail");
$query="SELECT region FROM region where region='$region'";
$result=mysqli_query($db,$query);
if(isset($_POST['Add'])) {

     if ($result->num_rows!=0){
         echo "<script>
             alert('This region name already exists in the system ');
             window.location.href='region.html';
             </script>";
     }else{
        echo "<script>
            window.location.href='regionForm.html';
            </script>";
    }
}
if(isset($_POST['Delete'])) {

    if ($result->num_rows==0){
        echo "<script>
            alert('This region name does not exist in the system ');
            window.location.href='region.html';
            </script>";
    }else{
        $deletequery ="DELETE FROM region where region='$region'";
        mysqli_query($db,$deletequery);

        echo "<script>
            alert('region with this region name has been delete it form the System');
            window.location.href='region.html';
            </script>";
    }
}

if(isset($_POST['Edit'])) {

    if ($result->num_rows==0){
        echo "<script>
            window.location.href='region.html';
            alert('This region name does not exist in the system ');
            </script>";
    }else{
        echo "<script>
            window.location.href='editregion.php';
            </script>";

    }
}


if(isset($_POST['Submit'])){

    $region = isset($_POST['region']) ? $_POST['region'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';

    foreach ($city as $value) {
        $AddregionQuery = "insert into region values ('$value','$region')";
        $query= "insert into Alert values ('$region',1)";
        mysqli_query($db, $AddregionQuery);
        mysqli_query($db, $query);

    }
    

    echo "<script>
          window.location.href='region.html';
          alert('This region have been added successfully into the system');
          </script>";
}

if(isset($_POST['Save'])) {
    $region = isset($_POST['region']) ? $_POST['region'] : '';
    $i =0;
    $city=[];
    while ($row = mysqli_fetch_array($result)){
        $city[$i] = isset($_POST['city']) ? $_POST['city'] : '';
    echo $region;
        $query= "UPDATE region 
        SET city='$city[$i]', region = '$region' 
        WHERE region='$region' AND city='$city[$i]'";
        $i++;
    }

    mysqli_query($db,$query);
    echo "<script>
          window.location.href='region.html';
          alert('This region information has been updated successfully into the system');
          </script>";
}

if(isset($_POST['Display'])) {

    if ($result->num_rows==0){
        echo "<script>
            window.location.href='region.html';
            alert('This region number does not exist in the system ');
            </script>";
    }else{

        echo "<script>
            window.location.href='Displayregion.php';
            </script>";

    }
}

?>