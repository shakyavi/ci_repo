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
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>
    <body> 
    <div class="container">
    <div class="row">
    <div class="panel panel-primary col-md-8">
    
      <div class="panel-heading">        
        <?php echo $info;?>
        </div>
    
    <div class="panel-body">
    
      
      <div class="table-responsive">
      <table class="table"> 
         <thead> 
            <tr>
             <th>Book Id</th>
             <th>Book Title</th>
             <th>Price</th>
             <th>Quantity</th>
             <th>Edit</th>
             <th>Delete</th>
             </tr>
         </thead>
         <tbody>
            <?php                             
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
         </tbody>
        
      </table> 
      <a href = "<?php echo site_url(); ?>booksController/addBooks">Add New Books</a>
      </div>

       <div class="row"> 
      <div class="panel-group" style="margin:25px"> 
        
        <div class="col-md-3">
        
                <button type="button" onclick="location.href='<?php echo base_url('Create_Pdf');?>' ">Generate PDF</button> 

        </div>
        
        <div class="col-md-3">
        <button type="button" onclick="location.href = '<?php echo base_url('booksController/maps'); ?>' ">Google Maps</button>
        </div>
        
        <div class="col-md-3">
        <button type="button" onclick="location.href = '<?php echo base_url('upload'); ?>' ">Upload Images</button>
        </div>
        
        <div class="col-md-3">
        <button type="button" onclick="location.href = '<?php echo base_url('BooksController');?>' ">Home Page</button>
        </div>
      </div>
      </div>
  
  <div class="panel-group" style="margin: 25px">
      <form action="uploadFunc" method="post" enctype="multipart/form-data">
                <input type = "file" name = "excelfile" size = "20">
                <input type="hidden" name="fileFlag" value="1">
                <input type = "submit" value = "Import Data (csv,xlsx)"> 
                  
     </form>
     </div>   
   
     </div>
     </div>

    </div>
  </div>
   </body>
</html>

