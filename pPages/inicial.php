<?php 
unset($_SESSION["error"]["emptypass"]);
unset($_SESSION["error"]["emptyemail"]);
unset($_SESSION["inputs"]["email"]);
unset($_SESSION["inputs"]["password"]);
unset($_SESSION["error"]["verificar"]);
$_SESSION["fields"]=array();
$_SESSION["errors"]=array();
$_SESSION["recuperar"]=array();
?>


<!-- MAIN CONTENT -->
<div id="video" controls autoplay >
    <?php 
    
    $sql= "SELECT video from home Where id_home = 1;";
    $result =  mysqli_query($conn,$sql);

    if($result){
        $row = $result->fetch_assoc();
        $caminho = $row["video"];
        echo "<video id='videopromocional' controls autoplay loop controlsList='nodownload'>
                <source src=' $caminho' type='video/mp4'>
            </video>";

        }

    ?>
    
</div>






