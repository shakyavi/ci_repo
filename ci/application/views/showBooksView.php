<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body> 
      	
      <table border = "1"> 
         <?php 
            
            echo "<tr>"; 
            echo "<td>Book Id</td>"; 
            echo "<td>Book Title</td>"; 
            echo "<td>Price</td>"; 
            echo "<td>Quantity</td>"; 
            echo "<td>Edit</td>";
            echo "<td>Delete</td>"; 
            echo "</tr>"; 
				
            foreach($records as $r) { 
               echo "<tr>"; 
               echo "<td>".$r->book_id."</td>"; 
               echo "<td>".$r->book_title."</td>"; 
               echo "<td>".$r->book_price."</td>";
               echo "<td>".$r->book_qty."</td>";
               echo "<td><a href = '".base_url()."index.php/booksController/edit/"
                  .$r->book_id."'>Edit</a></td>"; 
               echo "<td><a href = '".base_url()."index.php/booksController/delete/"
                  .$r->book_id."'>Delete</a></td>"; 
               echo "</tr>"; 
            } 
         ?>
      </table> 
        <br><br>
        <a href = "<?php echo base_url(); ?>index.php/booksController/addBooks">Add New Books</a>
        <br><br>
        <a href = "<?php echo base_url(); ?>index.php/booksController/maps">Google Maps</a>
        <br><br>
        <a href = "<?php echo base_url(); ?>index.php/upload">Upload Files</a>
   </body>
</html>
