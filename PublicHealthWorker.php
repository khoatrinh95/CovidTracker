<?php
session_start();
$medicare = isset($_POST['medicare']) ? $_POST['medicare'] : '';
$_SESSION['medicare'] = $medicare;

$db= mysqli_connect("fec353.encs.concordia.ca", "fec353_4","353y2021", "fec353_4","3306") or die ("fail");
$query="SELECT Medicare FROM PublicHealthWorker where Medicare='$medicare'";
$result=mysqli_query($db,$query);
if(isset($_POST['Add'])) {

    if ($result->num_rows!=0){
        echo "<script>
            alert('This medicare number already exists in the system ');
            window.location.href='PublicHealthWorker.html';
            </script>";
    }else{
        echo "<script>
            window.location.href='PublicHealthWorkerForm.html';
            </script>";
    }
}
if(isset($_POST['Delete'])) {

    if ($result->num_rows==0){
        echo "<script>
            alert('This medicare number does not exist in the system ');
            window.location.href='PublicHealthWorker.html';
            </script>";
    }else{
        $deletequery ="DELETE FROM PublicHealthWorker where Medicare='$medicare'";
        mysqli_query($db,$deletequery);
        $deleteparent="DELETE FROM Parents where PublicHealthWorker='$medicare'";
        mysqli_query($db,$deleteparent);

        echo "<script>
            alert('PublicHealthWorker with this Medicare Number has been delete it form the System');
            window.location.href='PublicHealthWorker.html';
            </script>";
    }
}

if(isset($_POST['Edit'])) {

    if ($result->num_rows==0){
        echo "<script>
            window.location.href='PublicHealthWorker.html';
            alert('This medicare number does not exist in the system ');
            </script>";
    }else{
        echo "<script>
            window.location.href='editPublicHealthWorker.php';
            </script>";

    }
}


if(isset($_POST['Submit'])){

    $Medicare = isset($_POST['Medicare']) ? $_POST['Medicare'] : '';
    $FirstName = isset($_POST['FirstName']) ? $_POST['FirstName'] : '';
    $LastName = isset($_POST['LastName']) ? $_POST['LastName'] : '';
    $DOB = isset($_POST['DOB']) ? $_POST['DOB'] : '';
    $Email = isset($_POST['Email']) ? $_POST['Email'] : '';
    $Phone = isset($_POST['Phone']) ? $_POST['Phone'] : '';
    $DoorNo = isset($_POST['DoorNo']) ? $_POST['DoorNo'] : '';
    $AppN0 = isset($_POST['AppN0']) ? $_POST['AppN0'] : '';
    $street = isset($_POST['street']) ? $_POST['street'] : '';
    $City = isset($_POST['City']) ? $_POST['City'] : '';
    $Province = isset($_POST['Province']) ? $_POST['Province'] : '';
    $PC = isset($_POST['PC']) ? $_POST['PC'] : '';
    $citi = isset($_POST['citi']) ? $_POST['citi'] : '';

    $Father = isset($_POST['Father']) ? $_POST['Father'] : '';
    $Mother = isset($_POST['Mother']) ? $_POST['Mother'] : '';

    $Group = isset($_POST['Group']) ? $_POST['Group'] : '';
    $Department = isset($_POST['Department']) ? $_POST['Department'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $Gcity = isset($_POST['Gcity']) ? $_POST['Gcity'] : '';
    $GProvince = isset($_POST['GProvince']) ? $_POST['GProvince'] : '';
    $GPC = isset($_POST['GPC']) ? $_POST['GPC'] : '';

    $CenterID = isset($_POST['CenterID']) ? $_POST['CenterID'] : '';



    $AddPersonQuery="insert into Person values ('$FirstName','$LastName','$DOB','$Email','$Phone','$Medicare','$DoorNo',
                           '$street','$AppN0','$City','$Province','$PC','$citi')";
    $AddPublicHealthWorkerQuery="insert into PublicHealthWorker values ('$CenterID','$Medicare')";
    $parentQuery="insert into Parents values ('$Medicare','$Father','$Mother')";
    mysqli_query($db,$AddPersonQuery);
    mysqli_query($db,$AddPublicHealthWorkerQuery);
    mysqli_query($db,$parentQuery);

    $groupZone = "Select Id From GroupZone where GroupName='$Group' and Department='$Department'";
    $result=mysqli_query($db,$groupZone);

    if ($result->num_rows!=0){
        $row = $result->fetch_assoc();
        $id=$row['Id'];
        $query = "insert into In_GroupZone values ('$id','$Medicare')";
        mysqli_query($db,$query);
    }else{
        $queryZone= "insert into GroupZone values (null,'$Group','$Department','$address','$Gcity','$GProvince','$GPC')";
        mysqli_query($db,$queryZone);

        $groupZone = "Select Id From GroupZone where GroupName='$Group' and Department='$Department'";
        $result=mysqli_query($db,$groupZone);
        $row = $result->fetch_assoc();
        $id=$row['Id'];
        $query = "insert into In_GroupZone values ('$id','$Medicare')";
        mysqli_query($db,$query);

    }

    $Group1 = isset($_POST['Group1']) ? $_POST['Group1'] : '';
    $Department1 = isset($_POST['Department1']) ? $_POST['Department1'] : '';
    $address1 = isset($_POST['address1']) ? $_POST['address1'] : '';
    $Gcity1 = isset($_POST['Gcity1']) ? $_POST['Gcity1'] : '';
    $GProvince1 = isset($_POST['GProvince1']) ? $_POST['GProvince1'] : '';
    $GPC1 = isset($_POST['GPC1']) ? $_POST['GPC1'] : '';

    if($Group1!="") {
        $groupZone1 = "Select Id From GroupZone where GroupName='$Group1' and Department='$Department1'";
        $result1 = mysqli_query($db, $groupZone1);

        if ($result1->num_rows != 0) {
            $row1 = $result1->fetch_assoc();
            $id1 = $row1['Id'];
            $query1 = "insert into In_GroupZone values ('$id1','$Medicare')";
            mysqli_query($db, $query1);
        } else {
            $queryZone1 = "insert into GroupZone values (null,'$Group1','$Department1','$address1','$Gcity1','$GProvince1','$GPC1')";
            mysqli_query($db, $queryZone1);

            $groupZone1 = "Select Id From GroupZone where GroupName='$Group1' and Department='$Department1'";
            $result = mysqli_query($db, $groupZone1);
            $row = $result->fetch_assoc();
            $id = $row['Id'];
            $query = "insert into In_GroupZone values ('$id','$Medicare')";
            mysqli_query($db, $query);

        }
    }

    echo "<script>
          window.location.href='PublicHealthWorker.html';
          alert('This PublicHealthWorker have been added successfully into the system');
          </script>";
}
if(isset($_POST['Save'])) {
    $Medicare = isset($_POST['Medicare']) ? $_POST['Medicare'] : '';
    $FirstName = isset($_POST['FirstName']) ? $_POST['FirstName'] : '';
    $LastName = isset($_POST['LastName']) ? $_POST['LastName'] : '';
    $DOB = isset($_POST['DOB']) ? $_POST['DOB'] : '';
    $Email = isset($_POST['Email']) ? $_POST['Email'] : '';
    $Phone = isset($_POST['Phone']) ? $_POST['Phone'] : '';
    $DoorNo = isset($_POST['DoorNo']) ? $_POST['DoorNo'] : '';
    $AppN0 = isset($_POST['AppN0']) ? $_POST['AppN0'] : '';
    $street = isset($_POST['street']) ? $_POST['street'] : '';
    $City = isset($_POST['City']) ? $_POST['City'] : '';
    $Province = isset($_POST['Province']) ? $_POST['Province'] : '';
    $PC = isset($_POST['PC']) ? $_POST['PC'] : '';
    $citi = isset($_POST['citi']) ? $_POST['citi'] : '';
echo $medicare;
    $query= "UPDATE Person 
SET FName = '$FirstName', LName='$LastName', DOB='$DOB',Email='$Email',PhoneNo='$Phone',Door_num='$DoorNo',Street='$street'
    ,apt_no='$AppN0',City ='$City', Province='$Province', Postal_code='$PC',Citizenship='$citi'
WHERE Medicare='$Medicare'";
    mysqli_query($db,$query);
    echo "<script>
          window.location.href='PublicHealthWorker.html';
          alert('This PublicHealthWorker information has been updated successfully into the system');
          </script>";
}

if(isset($_POST['Display'])) {

    if ($result->num_rows==0){
        echo "<script>
            window.location.href='PublicHealthWorker.html';
            alert('This medicare number does not exist in the system ');
            </script>";
    }else{





        echo "<script>
            window.location.href='DisplayPublicHealthWorker.php';
            </script>";

    }
}

?>