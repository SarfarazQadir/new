<?php

// $serverName = "SARFARAZ";
// $database = "Class_db";
// $userid = "";
// $password = "";

// $connection = [
//     "Database" => $database,
//     "Uid" => $userid,
//     "PWD" => $password
// ];

// $conn = sqlsrv_connect($serverName,$connection);
// if($conn){
//     $query = "select * from Cities";
//     $result = sqlsrv_connect($conn,$query);

//     foreach($result as $data){
//         echo"<tr>";
//         echo"<td>$data[City_Id]</td>";
//         echo"<td>$data[City_Name]</td>";
//         echo "</tr>";
//     }

// }else{
//     echo"Database not Connected";
// }

?>

<?php

$serverName = "SARFARAZ";
$database = "Class_db";
$userid = "";   
$password = "";

$connection = [
    "Database" => $database,
    "Uid" => $userid,
    "PWD" => $password
];

$conn = sqlsrv_connect($serverName, $connection);

if ($conn) {
    $query = "SELECT * FROM Cities";
    $result = sqlsrv_query($conn, $query);

    if ($result === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    echo "<table>";
    while ($data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($data['City_Id']) . "</td>";
        echo "<td>" . htmlspecialchars($data['City_Name']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Free the statement and close the connection
    sqlsrv_free_stmt($result);
    sqlsrv_close($conn);
} else {
    echo "Database not Connected";
    die(print_r(sqlsrv_errors(), true));
}

?>
