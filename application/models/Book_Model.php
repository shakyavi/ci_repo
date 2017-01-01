<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Book_Model
 *
 * @author €€€€
 */
class Book_Model extends CI_Model{
    //put your code here
     function __construct() { 
         parent::__construct(); 
      } 
      public function get_books(){
    
          $selectQuery = $this->db->get('book_details');
        $bookDetails = $selectQuery->result(); 
      
      return $bookDetails;
      
      }
      public function insert($data) { 
         if ($this->db->insert("book_details", $data)) { 
            return true; 
      }
      
       } 
      public function delete($book_id) {
          if ($this->db->delete("book_details","book_id = ".$book_id))
             {return true;}
    }
    
    public function update($data,$book_id){
         $this->db->set($data); 
         $this->db->where("book_id", $book_id); 
         $this->db->update("book_details", $data); 
         return $book_id;
      } 
      
      public function get_edit_record($book_id){
          $query = $this->db->get_where("book_details",array("book_id"=>$book_id));
          return $query->result(); 
      }
         public function get_users(){
      //echo ".";
          $selectQuery = $this->db->get('user_login');
        $users = $selectQuery->result();
        $out = json_encode($users);
      
      return  $users;
      
      }
} 
   

