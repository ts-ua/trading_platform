<?php
$servername = "localhost";  // Replace with your database server
$username = "root";         // Replace with your database username
$password = "";             // Replace with your database password
$dbname = "bendey";         // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add new compra
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $precio_unitario = $_POST['precioUnitario'];

    $sql = "INSERT INTO compras (producto, cantidad, precio_unitario)
            VALUES ('$producto', '$cantidad', '$precio_unitario')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true, "message" => "Purchase added successfully", "id" => $conn->insert_id]);
    } else {
        echo json_encode(["success" => false, "message" => "Error: " . $sql . "<br>" . $conn->error]);
    }
    
}

// Update existing compra
if (isset($_POST['update_compra'])) {
    $id = $_POST['id'];
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $precio_unitario = $_POST['precio_unitario'];
    $total = $_POST['total'];
    $estado = $_POST['estado'];

    $sql = "UPDATE compras SET producto='$producto', cantidad='$cantidad', precio_unitario='$precio_unitario', total='$total', estado='$estado' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Delete compra
if (isset($_POST['delete_compra'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM compras WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
