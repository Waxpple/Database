<?php

/*取名*/
foreach ($_POST as $key => $value) {
     $$key=$value;  
}

$servername = "localhost";
$username = "resdata";
$password = "";
$dbname ="resistance";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


function update($conn,$u){



    $sql= "UPDATE resistance SET quantity=$u WHERE name='RT500-a'";

    if($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else{
        echo "ERR updating". $conn->error;
    }
}

function delete($conn,$d){

    $sql="DELETE FROM resistance WHERE name = 'RT500-a'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
    echo "Error deleting record: " . $conn->error;
}

}

function insert($conn,$i){
echo "Connected successfully";
$sql= "INSERT INTO resistance (value , quantity , Accuracy , Name)
VALUES ('100', $i ,'0.05','RT500-b')";

if($conn -> query($sql) === TRUE) {
    echo "New component created successfully";
} else{
    echo "ERR".$sql."<br>".$conn->error;
}
}
function select($conn){
    $sql = "SELECT value, quantity, Accuracy , Name FROM resistance";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "產品型號". $row["Name"]. "    電阻值    " . $row["value"]. "    精度   " . $row["Accuracy"]. "數量" . $row["quantity"]."<br>";
    }
} else {
    echo "0 results";
}
}

insert($conn,$resdata);



$conn->close();
?>