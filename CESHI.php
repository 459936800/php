<?php
include "conn.php";

$sql="select * from t_user";

if (($result=mysqli_query($mysqli,$sql))!== false)
{
    echo $result;
    // Return the number of rows in result set
    $rowcount=mysqli_num_rows($result);
    printf("Result set has %d rows.n",$rowcount);
    echo $rowcount;
    // Free result set
    mysqli_free_result($result);
}

mysqli_close($mysqli);



?>