<?php
session_start();
$CenterID = isset($_POST['CenterID']) ? $_POST['CenterID'] : '';
$_SESSION['CenterID'] = $CenterID;

$db= mysqli_connect("fec353.encs.concordia.ca", "fec353_4","353y2021", "fec353_4","3306") or die ("fail");
$query="SELECT CenterID FROM PublicHealthCenter where CenterID='$CenterID'";
$result=mysqli_query($db,$query);
if(isset($_POST['Add'])) {

    if ($result->num_rows!=0){
        echo "<script>
            alert('This CenterID number already exists in the system ');
            window.location.href='Facility.html';
            </script>";
    }else{
        echo "<script>
            window.location.href='FacilityForm.html';
            </script>";
    }
}
if(isset($_POST['Delete'])) {

    if ($result->num_rows==0){
        echo "<script>
            alert('This CenterID number does not exist in the system ');
            window.location.href='Facility.html';
            </script>";
    }else{
        $deletequery ="DELETE FROM PublicHealthCenter where CenterID='$CenterID'";
        mysqli_query($db,$deletequery);

        echo "<script>
            alert('Facility with this CenterID Number has been delete it form the System');
            window.location.href='Facility.html';
            </script>";
    }
}

if(isset($_POST['Edit'])) {

    if ($result->num_rows==0){
        echo "<script>
            window.location.href='Facility.html';
            alert('This CenterID number does not exist in the system ');
            </script>";
    }else{
        echo "<script>
            window.location.href='editFacility.php';
            </script>";

    }
}


if(isset($_POST['Submit'])){

    $CenterID = isset($_POST['CenterID']) ? $_POST['CenterID'] : '';
    $name = isset($_POST['Name']) ? $_POST['Name'] : '';
    $Address = isset($_POST['Address']) ? $_POST['Address'] : '';
    $PhoneNo = isset($_POST['PhoneNo']) ? $_POST['PhoneNo'] : '';
    $Type = isset($_POST['Type']) ? $_POST['Type'] : '';
    $WebAddress = isset($_POST['WebAddress']) ? $_POST['WebAddress'] : '';
    $Accept = isset($_POST['Accept']) ? $_POST['Accept'] : '';





    $AddFacilityQuery="insert into PublicHealthCenter values ('$CenterID','$name','$Address','$PhoneNo','$Type','$WebAddress','$Accept')";
    mysqli_query($db,$AddFacilityQuery);

    

    echo "<script>
          window.location.href='Facility.html';
          alert('This Facility have been added successfully into the system');
          </script>";
}

if(isset($_POST['Save'])) {
    $CenterID = isset($_POST['CenterID']) ? $_POST['CenterID'] : '';
    $name = isset($_POST['Name']) ? $_POST['Name'] : '';
    $Address = isset($_POST['Address']) ? $_POST['Address'] : '';
    $PhoneNo = isset($_POST['PhoneNo']) ? $_POST['PhoneNo'] : '';
    $Type = isset($_POST['Type']) ? $_POST['Type'] : '';
    $WebAddress = isset($_POST['WebAddress']) ? $_POST['WebAddress'] : '';
echo $CenterID;
    $query= "UPDATE PublicHealthCenter 
SET CenterID = '$CenterID', name='$name', Address='$Address',PhoneNo='$PhoneNo',Type='$Type',WebAddress='$WebAddress'
WHERE CenterID='$CenterID'";
    mysqli_query($db,$query);
    echo "<script>
          window.location.href='Facility.html';
          alert('This Facility information has been updated successfully into the system');
          </script>";
}

if(isset($_POST['Display'])) {

    if ($result->num_rows==0){
        echo "<script>
            window.location.href='Facility.html';
            alert('This CenterID number does not exist in the system ');
            </script>";
    }else{

        echo "<script>
            window.location.href='DisplayFacility.php';
            </script>";

    }
}

?>