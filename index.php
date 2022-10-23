<?php include_once "include/header.php";
    include "include/databaseconnection.php";?>
        <?php
            if(isSet($_SESSION['username'])){
                if($_SESSION['usertype'] == "volunteer"){
                    echo '<form class="flex-row searchbar" method="post">
                    <input name="city" type="text" class="input-text" placeholder="Wpisz miasto" id="input-text">
                    <input name="submit" type="submit" class="input-submit" value="Szukaj"></button>
                    </form>';
                    
                    if(isSet($_POST['submit']) && !empty($_POST['city'])){
                        $searchcity = $_POST['city'];
                        $stmt = mysqli_stmt_init($conn);
                        $sql = "SELECT * FROM events WHERE eventsCity = '$searchcity'";
                        // GET /v1/geo/cities/93344/nearbyCities?limit=5&offset=10&radius=30&languageCode=en

                        $result = mysqli_query($conn, $sql);
                        

                    }else{
                        $sql = "SELECT * FROM events";
                        $result = mysqli_query($conn, $sql);
                    }
                    $resultCheck = mysqli_num_rows($result);

                    if($resultCheck > 0){
                        echo '<div class="article-container flex-row">';
                        while($row = mysqli_fetch_assoc($result)){
                            if(empty($row["eventsImage"])){
                                $row["eventsImage"] = "include/default-image.png";
                            }
                            echo '<article>
                            <fieldset class="flex-column">
                                <legend class="flex-row article-city">'.$row["eventsCity"].'</legend>
                                <p class=" flex-column article-title">'.$row["eventsTitle"].'</p>
                                <p class=" flex-column article-content">'.$row["eventsDesc"].'</p>
                                <div class="article-image" style="background-image: url('.$row["eventsImage"].')"></div>
                            </fieldset>
                        </article>';
                        }
                        echo '</div>';
                    }  
                }else{
                    include_once "include/createevent.php";
                }
            }else{
                include_once "include/welcomescreen.php";
            }
        ?>
    </main>
    <?php include_once "include/footer.php" ?>
</body>
</html>