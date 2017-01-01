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
        <?php 
            echo form_open('BooksController/addNewBook');
            echo form_label('Book Title');
            echo "<br/>"; 
            echo form_input(array('id'=>'bookTitle','name'=>'bookTitle')); 
            echo "<br/>"; 
			
            echo form_label('Price'); 
            echo "<br/>";
            echo form_input(array('id'=>'bookPrice','name'=>'bookPrice')); 
            echo "<br/>"; 
            
            echo form_label('Quantity'); 
            echo "<br/>";
            echo form_input(array('id'=>'bookQuantity','name'=>'bookQuantity')); 
            echo "<br/>";
            echo "<br/>";
            
            
            echo form_submit(array('id'=>'addNewBook','value'=>'Add')); 
            echo "<br/>";
            echo "<br/>";
            echo form_close(); 
         ?> 
    </body>
</html>
