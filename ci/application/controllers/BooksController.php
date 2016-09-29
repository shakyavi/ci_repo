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
     $this->load->helper('url');
    }
    
    public function index(){
        $this->load->helper('url');
        
        $selectQuery = $this->db->get('book_details');
        $bookDetails['records'] = $selectQuery->result(); 
        
        $this->load->view('showBooksView',$bookDetails);
    }
    
    public function addBooks(){
         $this->load->helper('form'); 
         $this->load->view('bookAddView'); 
    }
    
    public function addNewBook(){
         $this->load->model('Book_Model');
			
         $data = array( 
            'book_title' => $this->input->post('bookTitle'), 
            'book_qty' => $this->input->post('bookQuantity'), 
            'book_price' => $this->input->post('bookPrice') 
         ); 
			
         $this->Book_Model->insert($data); 
   
         $query = $this->db->get("book_details"); 
         $data['records'] = $query->result(); 
         $this->load->view('showBooksView',$data); 
    }
    
    public function delete($book_id){
        $this->load->model('Book_Model');
        $book_id = $this->uri->segment('3');
        $this->Book_Model->delete($book_id);
        
        $query = $this->db->get("book_details"); 
         $data['records'] = $query->result(); 
         $this->load->view('showBooksView',$data);           
        
    }
    
    public function edit($book_id){
         $this->load->helper('form'); 
         $book_id = $this->uri->segment('3'); 
         $query = $this->db->get_where("book_details",array("book_id"=>$book_id));
         $data['records'] = $query->result(); 
         $data['old_book_id'] = $book_id; 
         $this->load->view('bookEditView',$data); 
    }
    
    public function editBooks(){
         $this->load->model('Book_Model');
			
         $newData = array( 
            'book_title' => $this->input->post('bookTitle'), 
            'book_qty' => $this->input->post('bookQuantity'), 
            'book_price' => $this->input->post('bookPrice') 
         ); 
         
         $oldId = $this->input->post('old_book_id');
                 
         $this->Book_Model->update($newData,$oldId); 
   
         $query = $this->db->get("book_details"); 
         $info['records'] = $query->result(); 
         $this->load->view('showBooksView',$info); 
    }
    
    public function maps(){
        $this->load->view('googleMapsView');
    }
}
