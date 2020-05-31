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
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="codesource/view/style/home.css">
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/admin.css" />
    <title>Document</title>
</head>
<body>
    <!-- include navbar -->
    <?php require 'codesource/view/include/navbar4.php';?> <br><br>

<div id="content" class=" p-3 mb-5 bg-white rounded" >
   <?php 
   require('fonction/table.php');
   for($i=0;$i<count($array);$i++)
{
    $query="select * from produit where Nom_cat = '$array[$i]';";
    $result=mysqli_query($connect,$query);
    if(!$result){
        die("erreur in querysss");
    }
    echo 
    '
    <div class="btn"><h1>'.str_replace("_"," ",$array[$i]).'</h1></div><div id="produit" class="shadow-lg p-3 mb-5 bg-white rounded" >
    <form action="recherche.php" method="GET">
        </form>
        <div id="prd" >';
            while($row=mysqli_fetch_assoc($result)){
                
            echo
      ' <div id="prd1" >
                     <div class="imgP" >
                           <img src="img/'.$array[$i].'/'.$row["IMAGE"].'" alt="">
                      </div>
                      <div class="con">
                          <p class="p1">'.$row["NOM"].'</p>
                      </div>
                       <div class="prix">
                    <form action="admin.php" method="POST">
                    <input type="text" style="display:none" name="ID_PRD" value="'.$row["ID_PRD"].'">
                       <button  onclick="fon_Delet('.$row["ID_PRD"].')" >
                               <svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                               <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                             </svg>
                               </button>
                        </form>
                        <form action="produit.php" method="GET">
                               <input type="text" style="display:none;"  name="ID" value="'.$row["ID_PRD"].'" >
                               <button type="submit">
                               <svg class="bi bi-gear-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                               <path fill-rule="evenodd" d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 0 0-5.86 2.929 2.929 0 0 0 0 5.858z"/>
                               </svg>                             
                               </button>
                            </form>  
                       </div>
                       
            
        </div> ';
        } 
        echo       
        '</div>
    </div>';


}
?> 
<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $post = $_POST['ID_PRD'];
        if($post){
        $query="DELETE FROM produit WHERE  ID_PRD = $post ; ";
        $result=mysqli_query($connect,$query);
        header("Location:../../../admin.php");
        if(! $result){
            die("erreur in query");
        }
    } 

    }    
    
?>
 <?php
              if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $post = $_POST['rangeInput'];
                $id= $_POST['idd'];
                    if($post){
                    $query="UPDATE produit SET Stochage = Stochage + $post WHERE ID_PRD= $id; ";
                    $result=mysqli_query($connect,$query);
                    header("Location:../../../admin.php");
                    if(! $result){
                        die("erreur in query");
                    }
                } 
            
                }
             ?>
</div>
</div>
<?php require 'codesource/view/include/footer2.php'; ?>
<script>
function fon_Delet(a) {
    alert('supremer le produit qui possede cette ID :' + ' '+a);
}
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
<?php
mysqli_close($connect);

?>