
<?php
$servername = "172.31.22.43";
$username = "Jermaine200551273";
$password = "DggZ3qGI7h";
$dbname = "Jermaine200551273";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST["name"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$size = $_POST["size"];
$toppings = implode(", ", $_POST["toppings"]);

$sql = "INSERT INTO orders (name, address, phone, size, toppings)
        VALUES ('$name', '$address', '$phone', '$size', '$toppings')";

if ($conn->query($sql) === TRUE) {
    $orderId = $conn->insert_id; // Get the ID of the inserted order
    echo "Order placed successfully. Your Order ID is: $orderId<br>";
    echo "Name: $name<br>";
    echo "Address: $address<br>";
    echo "Phone: $phone<br>";
    echo "Size: $size<br>";
    echo "Toppings: $toppings<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>