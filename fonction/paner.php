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
$_SESSION['productId']=[];
if(isset($_POST['ID_PRD'])){

    session_start();

    $_SESSION['productId'][] = $_POST['ID_PRD'];

}
$list=array_unique($_SESSION['productId']);

