


<form method="POST" id="formulario_video" action="<?php $_SERVER["PHP_SELF"] ?>" enctype="multipart/form-data">

    <label for="video">Video</label>
    <input type="file" name="video[]">
    <br>
    <label for="texto">Texto</label>
    <input type="text" name="texto">
    <br>
    <button type="submit" name="submit">Guardar</button>

</form>

<?php 

    if(isset($_POST["submit"])){
        
        if(isset($_FILES['video']['name'])){
            echo "qualquer coisa";
        }
     
  $video= $_FILES['video']['name'];
       var_dump($video);
        $caminho = 'assets/video/';
        $ext = pathinfo($video, PATHINFO_EXTENSION);
        var_dump($ext);

        $newExt = $caminho.microtime().".".$ext;
       
        
    }else{
       
        
            $maxsize = 1000000000; // 1GB
      
            $name = $_FILES['video']['name'];
            $target_dir = "assets/video/";
            $target_file = $target_dir . $name;
     
            // Select file type
            $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
     
            // Valid file extensions
            $extensions_arr = array("mp4","avi","3gp","mov","mpeg");
     
            // Check extension
            if( in_array($videoFileType,$extensions_arr) ){
      
               // Check file size
               if(($_FILES['video']['size'] >= $maxsize) || ($_FILES["video"]["size"] == 0)) {
                 echo "File too large. File must be less than 1GB.";
               }else{
                 // Upload
                 if(move_uploaded_file($_FILES['video']['tmp_name'],$target_file)){
                   // Insert record
                   $query = "INSERT INTO home(video,texto) VALUES('".$target_file."','".$name."')";
     
                   mysqli_query($conn,$query);
                   echo "Upload successfully.";
                 }
               }
     
            }else{
               echo "Invalid file extension.";
            }
      
          
          
      
    }


?>