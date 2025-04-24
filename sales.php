<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        *{
            padding:0;
            margin:0;
            box-sizing: border-box;
        }
        body{
            background: linear-gradient(to right, #ffecd2, #fcb69f); 
            font-family: 'Poppins', sans-serif;
        }
        nav{
            width:100%;
            padding:15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #2c3e50;
            color:white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        ul{
            display:flex;
            gap:15px;
            list-style: none;
            font-size: 18px;
        }
        .a1{
            color:white;
            text-decoration:none;
        }
        .container{
            margin-top: 20px;
        }
        .table {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        th {
            background-color: #2c3e50;
            color: white;
        }
    </style>
</head>
<body>
    <nav>
        <h3>Book Sales</h3>
        <ul>
            <li><a class="a1" href="home.html">Home</a></li>
            <li><a class="a1" href="add_book.html">Add Book</a></li>
            <li><a class="a1" href="display_books.php">View Books</a></li>
        </ul>
    </nav>
    <div class="container">
    <table class="table table-striped table-bordered table-hover text-center mt-4">
        <tr>
            <th>Date</th>
            <th>Book Name</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
        <?php
$servername="localhost";
$username="root";
$password="";
$db="bookstore";

$conn=mysqli_connect($servername,$username,$password,$db);
$totalQuantity = 0;
$totalRevenue = 0;
if($conn)
{
    $sql="SELECT * FROM sales";
    $query=$conn->query($sql);
    if($query->num_rows>0)
    {
        while($row=$query->fetch_assoc())
        {
            echo "<tr>";
            echo "<td>$row[purchase_date]</td>";
            echo "<td>$row[BookName]</td>";
            echo "<td>$row[Quantity]</td>";
            echo "<td>$row[Price]</td>";
            $totalQuantity += $row["Quantity"];
            $totalRevenue += $row["Price"] ;
        }
    }
    else {
        echo "<tr><td colspan='4'>No books sold</td></tr>";
    }
}
else
{
    echo "<h2>Database connection failed</h2>";
}
?>
    </table>
    <div class="row mt-4">
      <div class="col-md-6">
        <div class="card text-center">
          <div class="card-body">
            <h4 class="card-title">Total Books Sold</h4>
            <p class="card-text"><?php echo $totalQuantity; ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card text-center">
          <div class="card-body">
            <h4 class="card-title">Total Revenue</h4>
            <p class="card-text">₹<?php echo number_format($totalRevenue, 2); ?></p>
          </div>
        </div>
      </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
