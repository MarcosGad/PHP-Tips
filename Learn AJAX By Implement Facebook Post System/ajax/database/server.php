<?php
include("db.php");

$name = $_REQUEST['n'];
$id   = $_REQUEST['id'];

//echo $name;

if($name != "") {
    $ins = "INSERT INTO name (name) VALUES ('$name')";

    $a = mysqli_query($conn, $ins);
}

if($id != ''){
    
    $del = "DELETE FROM name WHERE id = $id";
    $run = mysqli_query($conn, $del);
    
}

//if($a) {
//    echo "Done";
//}else {
//    echo "Faild";
//}

$sel = "SELECT * FROM name";
$s = mysqli_query($conn, $sel);
$count = 1;
while( $res = mysqli_fetch_assoc($s) ) {
    
?>
<tr>
   <td> <?php echo $count ?> </td>
   <td> <?php echo $res['name'] ?> </td>
   <td> <button type="button" onclick="syaHello('<?php echo $res['id'] ?>')">Delete</butto> </td>
</tr>


<?php
        $count++;
}
?>