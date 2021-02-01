<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <style>
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

</script>
</head>
<body>
<div class="container">
<form action="" method="post" enctype="multipart/form-data">
 <h2> Select Files to upload:</h2>
  <input type="file" name="fileupload" id="fileToUpload"><br><br>
  <input type="submit" value="Upload" name="submit">
</form>
</div>
</body>
</html>
<?php

if (isset($_POST['submit'])){

    $open=array("jpg"=>"image/jpeg","pdf"=>"application/pdf","docx"=>"application/vnd.openxmlformats-officedocument.wordprocessingml.document","php"=>"application/octet-stream","mp3"=>"audio/mpeg");
    $name=$_FILES["fileupload"]["name"];
    $type=$_FILES["fileupload"]["type"];
    // echo $type;
    $ext=pathinfo($name,PATHINFO_EXTENSION);
    // echo $ext;

    if(!array_key_exists($ext,$open)) die("The File Format is not valid");

    if(in_array($type,$open))
    {
       if(file_exists("files/". $_FILES["fileupload"]["name"]))
       {
         echo "The File was Already Exists";
       }

       else
       {
           move_uploaded_file($_FILES["fileupload"]["tmp_name"],"files/" . $_FILES["fileupload"]["name"]);
       }
    }

    else
    {
        echo "The File was not Uploaded";
    }
}
?>
