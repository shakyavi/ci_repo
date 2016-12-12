<?php
require(APPPATH.'libraries/REST_Controller.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Topic
 *
 * @author ubuntu
 */
class BookRest extends REST_Controller{
    //put your code here
    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model('Book_Model');
        
    }
    
//    public function index_get(){
//    
//          $this->book_get();
//    }
//public function index_post(){
//    
//}
//public function index_put(){
//echo "index_put<br>";    
//
//}
//public function index_delete(){
//    echo "index_delete<br>";    
//}

public function test_get() {
    //echo "test<br>";
      $output = $this->Book_Model->get_users();
        if($output){
            $this->response($output,200);
        }
 else {
            $this->response(array('error'=>'Read error'),404);
 }
}
public function book_get() {

        //$this->response(array('error'=>'ID is required'),404);
        $output = $this->Book_Model->get_books();
        if($output){
            $this->response($output,200);
        }
 else {
            $this->response(array('error'=>'Read error'),404);
 }
  
    }
    

public function book_post() {
    if(!$this->post('title')){
        $this->response(array('error'=>'Title is required'),404);
    }
    $output = $this->book_model->insert($data);
    if($output){
        $this->response($output,200);
    }
    else
    {
        $this->response(array('error'=>'Insert Error'),404);
    }
    
}
public function book_put() {
    $id = $this->uri->segment(3);
    //$id=$this->put('id');
    if($id == NULL)
    {   $id=$this->put('id');
       //   $id = $this->uri->segment(3);
    }
echo "book_put<br> id = ".$id;
//    if(!$this->update('id')){
//        $this->response(array('error'=>'ID is required'),404);
//    }
//    $output = $this->book_model->update($data,$this->update('id'));
//    
//    if($output){
//        $this->response($output,200);
//    }
//    else{
//        $this->response(array('error'=>'Insert Error'),404);
//    }
}
public function book_delete() {
    echo $this->delete('id');
    echo "book-delete<br>";
//    if(!$this->delete('id')){
//        $this->response(array('error'=>'ID is required'),404);
//    }
//    $output=  $this->book_model->delete($this->delete('id'));
//    
//    if($output){
//        $this->response($output,200);
//    }
//    else{
//        $this->response(array('error'=>'Delete error'),404);
//    }
//}
            
}
}