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
            echo form_open('BooksController/editBooks'); 
            echo form_hidden('old_book_id',$old_book_id); 
            
            echo form_label('Book Title'); 
            echo form_input(array('id'=>'bookTitle',
                                    'name'=>'bookTitle',
                                    'value'=>$records[0]->book_title)); 
            echo "<br/>"; 
				
            echo form_label('Price'); 
            echo form_input(array('id'=>'bookPrice',
                                    'name'=>'bookPrice',
                                    'value'=>$records[0]->book_price)); 
            echo "<br/>"; 
	
            echo form_label('Quantity'); 
            echo form_input(array('id'=>'bookQuantity','name'=>'bookQuantity',
               'value'=>$records[0]->book_qty)); 
            echo "<br/>"; 
            
            echo form_submit(array('id'=>'submit','value'=>'Edit')); 
            echo form_close();
         ?> 
	
    </body>
</html>
