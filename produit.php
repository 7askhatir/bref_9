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
    if(isset($_GET['ID'])){
        session_start();
        $_SESSION['ID']=$_GET['ID'];
     }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/produit.css" />
    <title>Document</title>
</head>
<style>


</style>
<body>
<div class="ha">
    <?php
      $id=$_SESSION['ID'];
      $query2="select * from produit where ID_PRD = $id " ;
      $result=mysqli_query($connect,$query2);
      if(!$result){
          die("erreur in querysss");
      }

    while($row=mysqli_fetch_assoc($result))
    echo'
<h1 >'.$row["NOM"].'</h1>
     <br>
</div>
<div class="products" ng-app="app" ng-controller="AppCtrl"> 
    <div class="tablesP" >
      <table class="table  table-striped table-bordered table-hover table-checkable order-column dataTable">
      <thead style="font-size: 14px;"><tr>
        <th>ID</th>
        <th>Name</th>
        <th>Categorie</th>
        <th>Prix</th>
        <th>URL image</th>
        <th>Quantité</th>
        <th>Status</th>
        <th>ajouter au Quantity de produit </th>
        </tr></thead>
        <tbody>';
     ?>
<?php
      $id=$_SESSION['ID'];
      $query2="select * from produit where ID_PRD = $id &&  Stochage>0 ";
      $result=mysqli_query($connect,$query2);
      if(!$result){
          die("erreur in querysss");
      }

    while($row=mysqli_fetch_assoc($result))
    echo'
          <tr>
          <td>'.$row["ID_PRD"].'</td>
          <td><span class="name">'.$row["NOM"].'</span></td>
          <td>'.str_replace("_"," ",$row["Nom_cat"]).'</td>
          <td>'.$row["Stochage"].'</td>
          <td>'.$row["PRIX"].'</td>
          <td>'.$row["Stochage"].'</td>
          <td>
          <span class="label label-success" style="text-align: center;" ><a herf="produit.php?ID='.$row["ID_PRD"].'">Produit exist <a>  </span>
          
          </td>
          
          <form  method="POST"  action="admin.php">
            <td>
            <input name="idd" style="display:none;" value="'.$row["ID_PRD"].'">
             <input type="range" name="rangeInput" min="0" max="50" onchange="updateTextInput(this.value);">
             <input     style ="border: none;    width: 15px;" type="text" id="textInput" value="" name="plus">
             <input type="submit" value="ajouter" style="color: white; box-sizing: 15px; background-color: #0992F9;border: none;">
            </td>
             </form>';
            ?>

             <?php
      $id=$_SESSION['ID'];
      $query2="select * from produit where ID_PRD = $id &&  Stochage=0 ";
      $result=mysqli_query($connect,$query2);
      if(!$result){
          die("erreur in querysss");
      }

    while($row=mysqli_fetch_assoc($result))
    echo'
          <tr>
          <td>'.$row["ID_PRD"].'</td>
          <td><span class="name">'.$row["NOM"].'</span></td>
          <td>'.str_replace("_"," ",$row["Nom_cat"]).'</td>
          <td>'.$row["PRIX"].'</td>
          <td>'.$row["IMAGE"].'</td>
          <td>'.$row["Stochage"].'</td>
          <td><span class="label label-danger" style="text-align: center;" >Produit exist   </span></td>
          <form  method="POST"  action="admin.php">
          <td>
          <input name="idd" style="display:none;" value="'.$row["ID_PRD"].'">
           <input type="range" name="rangeInput" min="0" max="50" onchange="updateTextInput(this.value);">
           <input     style ="border: none;    width: 15px;" type="text" id="textInput" value="" name="plus">
           <input type="submit" value="ajouter" style="color: white; box-sizing: 15px; background-color: #0992F9;border: none;">
          </td>
           </form>';

            
             ?>
          </tr>
        </tbody>
      </table>
    </div>
  </md-content>
</div>
<br><br><br>
<div class="ha">
<h1 >Autre produits</h1>
</div>
<div class="products" ng-app="app" ng-controller="AppCtrl">

  <md-content layout-padding>
    <div class="tables">
      <table class="table  table-striped table-bordered table-hover table-checkable order-column dataTable">
      <thead><tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Quantity</th>
        <th>Status</th>
        </tr></thead>
        <tbody>
        <?php

          $query2="select * from produit where Stochage = 0";
          $result=mysqli_query($connect,$query2);
          if(!$result){
              die("erreur in querysss");
          }

        while($row=mysqli_fetch_assoc($result)){
            echo'
            <td>'.$row["ID_PRD"].'</td>
            <td><span class="name">'.$row["NOM"].'</span>
            </td>
            <td>'.str_replace("_"," ",$row["Nom_cat"]).'</td>
            <td>'.$row["Stochage"].'</td>
            <td><span class="label label-danger"> n\'existe pas  </span></td>
          </tr>';}
          $query1="select * from produit where Stochage > 0";
          $result=mysqli_query($connect,$query1);
          if(!$result){
              die("erreur in querysss");
          }

        while($row=mysqli_fetch_assoc($result)){
        echo'
          <tr>
            <td>'.$row["ID_PRD"].'</td>
            <td><span class="name">'.$row["NOM"].'</span>
            </td>
            <td>'.str_replace("_"," ",$row["Nom_cat"]).'</td>
            <td>'.$row["Stochage"].'</td>
            <td><span class="label label-success" style="text-align: center;" >Produit exist   </span></td>
          </tr>
          <tr>';}
          ?>
        </tbody>
      </table>
    </div>
  </md-content>
</div>
<script>
    function updateTextInput(val) {
          document.getElementById('textInput').value=val; 
        }
</script>
</body>
</html>
