<nav>
        <a href="../html/home.php" class="logo"> </a>
        <input type="checkbox" id="checkboxNavbar">
        <label id="checkNavBtn" for="checkboxNavbar">
            <div class="menuIcon">
            <span></span>
            <span></span>
            <span></span>
            </div>
        </label>
       

        <div id="topNav">
            <ul>
                <li class="categorie">
                    <input type="checkbox" id="checkboxCategorie">
                    <a href="#">
                        <label class="categorieTitle" for="checkboxCategorie">
                            <div class="categorieIcon">
                            <span></span>
                            <span></span>
                            <span></span>
                            </div>
                            <p>Catégories</p> 
                        </label>
                    </a>
                    <?php  
                   echo  '<ul id="categorieDropdown">';    
                    require('fonction/table.php');
                    for($i=0;$i<count($array);$i++){
                    echo '
                    <a herf="#'.$array[$i].'">
                    <li><button style="border: none;background-color: #ffffff;">'.str_replace("_"," ",$array[$i]).'</button></li>
                    </a>';
                    }

                      
                   echo '</ul>';
                   ?>
                </li>
                <li class="search">
                    <form action="recherche.php">
                        <input type="text" placeholder="Cherchez un produit ou une marque" name="search">
                        <button  type="submit"><img src=" codesource/view/icons/Icon-search.png"  ></button>
                    </form> 
                </li>
                <?php
                require('fonction/notification.php');
                echo 
                '<li class="panier"><button style="border: none;background-color: #ffffff;"><a href="produit.php?ID=0">
                        <div class="panier">
                        <svg class="bi bi-bell-fill" style="color:red;" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                        </svg>
                        </div>
                        <span><h5 style="color:red;">('.$i.')</h5></span>
                    </a> </button>
                </li>'
                ?>
                
                <li class="deconnexion">
                    <form action="" method="POST">
                    <input type="text" name="cc" style="display: none;" >
                    <button style="border: none;background-color: #ffffff;">
                        <a >
                        <div class="deconnexionIcon"></div>
                        <a href="codesource/view/html/deconnecter.php">Déconnexion</a>
                    </button>
                    </a></form> 
                </li>
                
            </ul>
        </div>;
      
        
    </nav>
