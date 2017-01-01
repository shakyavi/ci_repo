<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UploadModel
 *
 * @author ubuntu
 */
class UploadModel extends CI_Model{
    //put your code here
    function __construct() {
        parent::__construct();
    }
       public function insertImage($imageData=array()) { 
         $data = array(
             'fileName' => $imageData['file_name'],
             'filePath' => $imageData['full_path']
         );
           if ($this->db->insert("image_table", $data)) 
            return true; 
      }
      
      public function fileInsert($fileData=array()){
          
          $new_id = $fileData['book_id'];
          $query = $this->db->get_where('book_details',array('book_id' => $new_id));
          $count = $query->num_rows();
          if($count==0){
                if($this->db->insert('book_details',$fileData)){
                    echo "<br>Successful";                        
                        }
                    else {echo "<br>Failed";
                    }
          }
        else{
            
            $this->db->where('book_id',$new_id);
            $this->db->update('book_details',$fileData);
            echo "<br> id ".$new_id." already exists, db updated";
            
        }
            

      }
  }
