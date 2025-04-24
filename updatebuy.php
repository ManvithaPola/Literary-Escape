<?php
$conn = mysqli_connect("localhost", "root", "", "bookstore");
if ($conn) 
{  
    $SerialNo = $_GET["SerialNo"];
    $quantity1 = $_GET["quantity1"];
    $purchase_date = $_GET["purchase_date"];

    // Fetch book details
    $sql = "SELECT * FROM books WHERE SerialNo = '$SerialNo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $BookName = $row["BookName"];
        $Price = $row["Price"];
        $currentQuantity = $row['Quantity'];

        // Ensure enough quantity is available
        if ($currentQuantity >= $quantity1) {
            $newQuantity = $currentQuantity - $quantity1;
            $updateSQL = "UPDATE books SET Quantity = '$newQuantity' WHERE SerialNo = '$SerialNo'";
            $updateQuery = $conn->query($updateSQL);

            if ($updateQuery) {
                echo "<script>alert('Sold Successfully!');
                </script>";
                
                // Calculate total price
                $totalprice = $quantity1 * $Price;
                // Insert into sales table
                $insertSQL = "INSERT INTO sales (purchase_date, BookName, Quantity, Price) 
                              VALUES ('$purchase_date', '$BookName', '$quantity1', '$totalprice')";
                $insertQuery = $conn->query($insertSQL);

                if ($insertQuery) {
                    echo "<script>
                      window.location.href='sales.php';
                </script>";
                }
            } else {
                echo "Error updating quantity.";
            }
        } else {
            echo "Not enough stock available.";
        }
    } else {
        echo "Book not found.";
    }
} 
else 
{
    echo "Failed to connect to database.";
}
?>