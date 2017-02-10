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
class Email extends CI_Controller {
    //put your code here
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        // $config = array(
        //   'protocol' => 'smtp',
        //    'smtp_host' => 'ssl://smtp.googlemail.com',
        //     'smtp_port' => 465,
        //     'smtp_user' => 'bjack0470@gmail.com',
        //             'smtp_pass' => 'Take@ride'
        // );
        $this->load->library('email');

$this->email->from('your@example.com', 'Your Name');
$this->email->to('shakyavi@gmail.com');

$this->email->subject('Email Test');
$this->email->message('Testing the email class.');

if($this->email->send()){
	echo 'Done';
}else{ echo "error";}

 //        $this->load->library('email');
 //        $this->email->set_newline("\r\n");
        
 //        $this->email->from('info@cruva.com', 'CREWGO');
 //        $this->email->to('shakyavi@gmail.com');
 //        $this->email->subject('Test');
 //        $this->email->message('info@cruva');
        
 //        if($this->email->send()){
 //            echo "Successful";
 //        }
 // else 
 //     {
 //            show_error($this->email->print_debugger());
            
 //     }
    }
    
    function index1234(){
        $config = array(
          'protocol' => 'smtp',
           'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'bjack0470@gmail.com',
                    'smtp_pass' => 'Take@ride'
        );
        
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        
        $this->email->from('bjack0470@gmail.com', 'black jack');
        $this->email->to('shakyavi@gmail.com');
        $this->email->subject('Test test test test');
        $this->email->message('From bjack0470');
        
        if($this->email->send()){
            echo "Successful";
        }
 else 
     {
            show_error($this->email->print_debugger());
            
     }
    }

    public function email_check(){
        $this->load->view('email_field');
    }
    
    }
