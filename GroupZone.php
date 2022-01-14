<?php
session_start();
$GroupName = isset($_POST['GroupName']) ? $_POST['GroupName'] : '';
$Department = isset($_POST['Department']) ? $_POST['Department'] : '';
$_SESSION['GroupName'] = $GroupName;
$_SESSION['Department'] = $Department;

$db= mysqli_connect("fec353.encs.concordia.ca", "fec353_4","353y2021", "fec353_4","3306") or die ("fail");
$query="SELECT GroupName FROM GroupZone where GroupName='$GroupName' && Department ='$Department'";
$result=mysqli_query($db,$query);
if(isset($_POST['Add'])) {

    if ($result->num_rows!=0){
        echo "<script>
            alert('This GroupZone name already exists in the system ');
            window.location.href='GroupZone.html';
            </script>";
    }else{
        echo "<script>
            window.location.href='GroupZoneForm.html';
            </script>";
    }
}
if(isset($_POST['Delete'])) {

    if ($result->num_rows==0){
        echo "<script>
            alert('This GroupZone name does not exist in the system ');
            window.location.href='GroupZone.html';
            </script>";
    }else{
        $deletequery ="DELETE FROM GroupZone where GroupName='$GroupName' && Department ='$Department'";
        mysqli_query($db,$deletequery);

        echo "<script>
            alert('GroupZone with this GroupZone name has been delete it form the System');
            window.location.href='GroupZone.html';
            </script>";
    }
}

if(isset($_POST['Edit'])) {

    if ($result->num_rows==0){
        echo "<script>
            window.location.href='GroupZone.html';
            alert('This GroupZone name does not exist in the system ');
            </script>";
    }else{
        echo "<script>
            window.location.href='editGroupZone.php';
            </script>";

    }
}


if(isset($_POST['Submit'])){


    $GroupName = isset($_POST['GroupName']) ? $_POST['GroupName'] : '';
    $Department = isset($_POST['Department']) ? $_POST['Department'] : '';
    $Address = isset($_POST['Address']) ? $_POST['Address'] : '';
    $City = isset($_POST['City']) ? $_POST['City'] : '';
    $Province = isset($_POST['Province']) ? $_POST['Province'] : '';
    $PostalCode = isset($_POST['PostalCode']) ? $_POST['PostalCode'] : '';
   

    $AddGroupZoneQuery="insert into GroupZone values (null,'$GroupName','$Department','$Address','$City','$Province','$PostalCode')";
    mysqli_query($db,$AddGroupZoneQuery);

    

    echo "<script>
          window.location.href='GroupZone.html';
          alert('This GroupZone have been added successfully into the system');
          </script>";
}

if(isset($_POST['Save'])) {
    $GroupName = isset($_POST['GroupName']) ? $_POST['GroupName'] : '';
    $Department = isset($_POST['Department']) ? $_POST['Department'] : '';
    $Address = isset($_POST['Address']) ? $_POST['Address'] : ''; // note toke of s because the query was seeing adress as smtg else
    $City = isset($_POST['City']) ? $_POST['City'] : '';
    $Province = isset($_POST['Province']) ? $_POST['Province'] : '';
    $PostalCode = isset($_POST['PostalCode']) ? $_POST['PostalCode'] : '';
   
echo $GroupName;
    $query= "UPDATE GroupZone 
SET GroupName = '$GroupName', Department='$Department', Address = '$Address', City='$City',Province = '$Province', PostalCode='$PostalCode' 
WHERE GroupName='$GroupName' AND Department='$Department'";
    mysqli_query($db,$query);
    echo "<script>
          window.location.href='GroupZone.html';
          alert('This GroupZone information has been updated successfully into the system');
          </script>";
}

if(isset($_POST['Display'])) {

    if ($result->num_rows==0){
        echo "<script>
            window.location.href='GroupZone.html';
            alert('This GroupZone number does not exist in the system ');
            </script>";
    }else{

        echo "<script>
            window.location.href='DisplayGroupZone.php';
            </script>";

    }
}

?>