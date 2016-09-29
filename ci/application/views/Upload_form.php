<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>File Upload</title>
    </head>
    <body>
      <?php
      echo "Hello"; 
      echo $error; 
      echo form_open_multipart('upload/do_upload');?> 
       <form action="" method="">
         <input type = "file" name = "userfile" size = "20" /> 
         <br /><br /> 
         <input type = "submit" value = "upload" /> 
     </form>
		
    </body>
</html>
