<?php
$conn=mysqli_connect("localhost","root","","bookstore");
if($conn)
{
    $BookName=$_GET["BookName"];
    $Author=$_GET["Author"];
    $Price=$_GET["Price"];
    $Quantity=$_GET["Quantity"];
    $Genre=$_GET["Genre"];
    if($BookName!="" && $Author!="" && $Price!="" && $Quantity!="" && $Genre!="")
    {
        $sql="INSERT INTO `books`(`BookName`, `Author`, `Price`, `Quantity`, `Genre`) VALUES ('$BookName','$Author','$Price','$Quantity','$Genre')";
        $query=$conn->query($sql);
        if($query)
        {
            echo "<script>
               alert('Inserted successfully');
               window.location.href='display_books.php';
              </script>";
        }
        else
        {
            echo "<h2>Data not updated</h2>";
        }
    }
    else
    {
        echo "<h2>Details not available</h2>";
    }
}
else
{
   echo "<h2>Not connected</h2>";
}
?>