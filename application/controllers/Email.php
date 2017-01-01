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
        $this->email->to('bjack0470@gmail.com');
        $this->email->subject('Test test');
        $this->email->message('Workin, working');
        
        if($this->email->send()){
            echo "Successful";
        }
 else 
     {
            show_error($this->email->print_debugger());
            
     }
    }
    
    }
