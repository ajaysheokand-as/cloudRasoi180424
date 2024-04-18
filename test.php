<?php 
include './config.php';
echo "\ntest 10 <br\>";
$timer = 20;
// while($timer > 0){
    $query = "INSERT INTO `test`( `data`) VALUES('data ij')";
if($res = mysqli_query($con, $query)){
    echo ' inserted ';
}else{
    echo ' error: '.$con->error;
    printf("Errormessage: %s\n", mysqli_error($con));

}
    // sleep(1);
    // $timer--;
// }

echo "<br \>end";

?>
