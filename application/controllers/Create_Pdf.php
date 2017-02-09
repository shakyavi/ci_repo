<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Email
 *
 * @author ubuntu
 */
class Create_Pdf extends CI_Controller {
    //put your code here
    function __construct() {
        parent::__construct();
         $this->load->model('Book_Model');
          $this->load->helper('dompdf_helper');
    }
    
    function index(){    
        $this->load->helper('dompdf_helper');

        $bookList['records'] = $this->Book_Model->get_books();
        if($bookList){
            $bookList['info'] ="List of Available Books";
        }
    else {
        $bookList['info'] = "Database Error";
        }

        $html = $this->load->view('showBooksView', $bookList, TRUE);
        to_pdf($html,'sample',TRUE);
    }    
}
