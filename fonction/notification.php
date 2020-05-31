<?php
$host="127.0.0.1";
$user="user1";
$password="yes";
$database="shopping";
$connect = mysqli_connect($host,$user,$password,$database);
if(mysqli_connect_errno()){
    die("cannot connect to database fieled :" .mysqli_connect_error());
}
?>
<?php
 $query="select * from produit where Stochage = 0";
 $result=mysqli_query($connect,$query);
 if(! $result){
     die("erreur in query");
 }
 $i=0;
 while($row=mysqli_fetch_assoc($result)) {
 $i++;

 }
 return $i;
