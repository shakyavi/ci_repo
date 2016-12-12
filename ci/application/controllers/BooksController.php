<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of booksController
 *
 * @author €€€€
 */
class BooksController extends CI_Controller {
    //put your code here
    function __construct() {
        parent::__construct();
           $this->load->model('Book_Model');
    
    }
    
    public function index(){
            $bookList['records'] = $this->Book_Model->get_books();
        if($bookList){
            $bookList['info'] ="List of Available Books";
        }
 else {
     $bookList['info'] = "Database Error";
 }
        $this->load->view('showBooksView',$bookList);
    }
    
    public function addBooks(){
         $this->load->helper('form'); 
         $this->load->view('bookAddView'); 
    }
    
    public function addNewBook(){
      
        echo "welcome to addNewBook Controller";			
         $data = array( 
            'book_title' => $this->input->post('bookTitle'), 
            'book_qty' => $this->input->post('bookQuantity'), 
            'book_price' => $this->input->post('bookPrice') 
         ); 
			
         if($this->Book_Model->insert($data)){
             $json = array('status' => '1', 'msg' => 'successfully added data');
         } 
         else{
             $json = array('status' => '0', 'msg' => 'operation failed');
         }

          $query = $this->db->get("book_details"); 
         $data['records'] = $query->result(); 
         $this->load->view('showBooksView',$data); 
    }
    
    public function delete($book_id){
        $book_id = $this->uri->segment('3');
        $this->Book_Model->delete($book_id);
        
        $list['records'] = $this->Book_Model->get_books(); 
         if($list){
             $list['info'] = "Book with id : ".$book_id." deleted !";
         }
 else {
             $list['info'] = "Operation failed ";
 }
         $this->load->view('showBooksView',$list);           
         }
    
    
    public function edit($book_id){
         $book_id = $this->uri->segment('3'); 
         
         $data['records'] = $this->Book_Model->get_edit_record($book_id);
         $data['old_book_id'] = $book_id; 
         
         if($data['records'])
         {
             $this->load->view('bookEditView',$data); 
         }
 else {
     $data['info'] ="Operation failed";
             $this->load->view('showBooksView',$data);
 }
         
    }
    
    public function editBooks(){
        
			
         $newData = array( 
            'book_title' => $this->input->post('bookTitle'), 
            'book_qty' => $this->input->post('bookQuantity'), 
            'book_price' => $this->input->post('bookPrice') 
         ); 
         
         $oldId = $this->input->post('old_book_id');
                 
         $book_id=$this->Book_Model->update($newData,$oldId); 
   
          $list['records'] = $this->Book_Model->get_books(); 
         if($list['records']){
             $list['info'] = "Book with id : ".$book_id." edited !";
         }
 else {
             $list['info'] = "Operation failed ";
 }
         $this->load->view('showBooksView',$list); 
    }
    
    public function maps(){
        $this->load->view('googleMapsView');
    }
    
 }
