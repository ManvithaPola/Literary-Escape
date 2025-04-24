<?php
$conn = mysqli_connect("localhost", "root", "", "bookstore");
if ($conn) {
    $SerialNo = $_GET["SerialNo"];
    $BookName = $_GET["BookName"];
    $Author = $_GET["Author"];
    $Price = $_GET["Price"];
    $Quantity = $_GET["Quantity"];
    $Genre = $_GET["Genre"];
} 
else {
    echo "Not connected";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #ffecd2, #fcb69f);
            font-family: 'Poppins', sans-serif;
        }
        .container {
            margin-top: 50px;
            max-width: 500px;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        h2 {
            text-align: center;
            color: #2c3e50;
        }
        label {
            font-weight: bold;
        }
        .btn-buy {
            width: 100%;
            background-color: #2c3e50;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Buy Book</h2>
    <form action="updatebuy.php" method="get">
        <input type="text" name="SerialNo" id="SerialNo" value="<?php echo $SerialNo; ?>" hidden>
        <div class="mb-3">
            <label>Book Name:</label>
            <input type="text" class="form-control" value="<?php echo $BookName; ?>" readonly>
        </div>
        <div class="mb-3">
            <label>Author:</label>
            <input type="text" class="form-control" value="<?php echo $Author; ?>" readonly>
        </div>
        <div class="mb-3">
            <label>Price:</label>
            <input type="text" class="form-control" value="<?php echo $Price; ?>" readonly>
        </div>
        <div class="mb-3">
            <label>Available Quantity:</label>
            <input type="text" class="form-control" value="<?php echo $Quantity; ?>" readonly>
        </div>
        <div class="mb-3">
            <label>Genre:</label>
            <input type="text" class="form-control" value="<?php echo $Genre; ?>" readonly>
        </div>
        <div class="mb-3">
            <label>Quantity to Buy:</label>
            <input type="number" class="form-control" name="quantity1" id="quantity1" min="1" max="<?php echo $Quantity; ?>" placeholder="Enter no.of books required" required>
        </div>
        <div class="mb-3">
            <label>Purchase Date:</label>
            <input type="date" class="form-control" name="purchase_date" id="purchase_date" required>
        </div>
        <button type="submit" class="btn btn-buy">Sell Now</button>
    </form>
</div>

</body>
</html>
