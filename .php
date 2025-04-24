<?php
$conn=mysqli_connect("localhost","root","","bookstore");
if($conn){
    $bname=$_GET["bname"];
    $price=$_GET["price"];
    $no=$_GET["no"];
    $qu="Select * from bookstore where bookname='$bname'";
    $sq=$conn->query($qu);
    if($sq->num_rows>0){
        $q="select no from bookstore where bookname='$bname'";
        $s=$conn->query($q);
        if($s->num_rows>0)
        {
            while($row=$s->fetch_array())
            {
                $fno=$row[0]+$no;
            }
        }
        $que="UPDATE bookstore SET price='$price',no='$fno' where bookname='$bname'";
        $sqll=$conn->query($que);
        if($sqll)
        {
            echo
            "<script>
                window.location.href='table.php';
            </script>";
        }
        else{
            echo "Not Inserted";
        }
    }
    else{
        $sql="INSERT INTO bookstore(bookname, price, no) VALUES ('$bname','$price','$no')";
        $query=$conn->query($sql);
        if($query){
            echo
            "<script>
                window.location.href='table.php';
            </script>";
        }
        else{
            echo "Not Inserted";
        }
    }
}
else{
    echo "Connection Not Success";
}
?>