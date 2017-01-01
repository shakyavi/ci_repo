<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Upload
 *
 * @author €€€€
 */
class Upload extends CI_Controller{
    //put your code here
     public function __construct() { 
         parent::__construct(); 
         $this->load->model('Book_Model');
         $this->load->model('UploadModel');
      }
		
      public function index() { 
        //echo "Hello"; 
        $this->load->view('Upload_form', array('error' => ' ' )); 
      } 
		
      public function uploadFunc() { 
         
          //for importin files
         if(isset($_POST['fileFlag']) && isset($_FILES['excelfile']['name']))
         {
                $file_name = $_FILES['excelfile']['name'];
                $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                //echo $file_name."<br>".$ext;
                        //Checking the file extension
                        if($ext == "xlsx" || $ext == "csv")
                            {
                                    $file_name = $_FILES['excelfile']['tmp_name'];
                                    //$inputFileName = $file_name;
                            /**********************PHPExcel Script to Read Excel File**********************/
                            //  Read your Excel workbook
//                            try 
//                                    {
//                                    $inputFileType = PHPExcel_IOFactory::identify($inputFileName); //Identify the file
//                                    $objReader = PHPExcel_IOFactory::createReader($inputFileType); //Creating the reader
//                                     $objPHPExcel = $objReader->load($inputFileName); //Loading the file
//                                      } 
//                            catch (Exception $e) 
//                                    {
//                                    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME). '": ' . $e->getMessage());
//                                      }
//
//                            //Table used to display the contents of the file
//                            echo '<center><table style="width:50%;" border=1>';
//                           //  Get worksheet dimensions
//                            $sheet = $objPHPExcel->getSheet(0);     //Selecting sheet 0
//                            $highestRow = $sheet->getHighestRow();     //Getting number of rows
//                            $highestColumn = $sheet->getHighestColumn();     //Getting number of columns
//                             //  Loop through each row of the worksheet in turn
//                             for ($row = 1; $row <= $highestRow; $row++) 
//                                    {
//                                      //  Read a row of data into an array
//                                      $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
//                                      // This line works as $sheet->rangeToArray('A1:E1') that is selecting all the cells in that row from cell A to highest column cell
//                                      echo "<tr>";
//                                      //echoing every cell in the selected row for simplicity. You can save the data in database too.
//                                      foreach($rowData[0] as $k=>$v)
//                                                echo "<td>".$v."</td>";
//
//                                      echo "</tr>";
//                                      }
//
//                            echo '</table></center>';
                            //echo "<input type='button' value='Import to DB'>"; 
                           // echo anchor('upload/extract/'.$inputFileName, 'Update in DB');
                           $this->extract($file_name);
                             }
        
                        else
                            {
                            //$data['error']="Incorrect file format (use xlsx or csv)";
                            redirect('BooksController',' ');
                            }
         }
         	//Image Upload		
        else
         {
                $config['upload_path']   = './uploads/'; 
                $config['allowed_types'] = 'gif|jpg|png'; 
                $config['max_size']      = 100; 
                $config['max_width']     = 1024; 
                $config['max_height']    = 768;  
                $this->load->library('upload', $config);
               
                if ( !$this->upload->do_upload('userfile')) 
                    {
                        $error = array('error' => $this->upload->display_errors()); 
                        $this->load->view('Upload_form', $error); 
                    }
			
                else
                    { 
                        $this->load->model('UploadModel');
                        $this->UploadModel->insertImage($this->upload->data());
                        $data = array('upload_data' => $this->upload->data()); 
                        $this->load->view('Upload_success', $data); 
                    }
         }
      
      }         
      //just for test
        public function useReader(){
            $file = './files/test.xlsx';
            //loading a spreadsheet file
            $objPHP = PHPExcel_IOFactory::load($file);
            $obj = $objPHP->getActiveSheet()->toArray(null,true,true,true);
            //var_dump($obj);
            $no=1;
            foreach($obj as $rec){
                echo "<br>".$no." : ";
                var_dump($rec);
                $no++;
            }
            
            //creating a reader and loading a spreadsheet file
            $fileType = PHPExcel_IOFactory::identify($file);//identify file type
            $objReader = PHPExcel_IOFactory::createReader($fileType);//create a reader of file type
            $objPHPExcel = $objReader->load($file);//load the file
            $obj = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true); 
            
            //var_dump($obj);
        }   
        
             public function extract($file){
 //$file = $this->uri->segment('3'); 
$msg = array();        
$error_count =0;
        //load the file 
$objPHPExcel = PHPExcel_IOFactory::load($file);


        $sheet = $objPHPExcel->getSheet(0);     //Selecting sheet 0
$highestRow = $sheet->getHighestRow();     //Getting number of rows
$highestColumn = $sheet->getHighestColumn();     //Getting number of columns

  $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);
 
//loop from second record untill last
          for($i=1;$i<=$highestRow;$i++)
          {
              $id= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
              $title= $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
              $price =$objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
              $qty = $objWorksheet->getCellByColumnAndRow(3,$i)->getValue();
           
              $data_user=array('book_id'=>$id, 'book_title'=>$title, 'book_price'=>$price,'book_qty'=>$qty);
              $pr=is_numeric($price);
              $qt=is_numeric($qty);
              $emp=  in_array(NULL, $data_user);
              if( $emp || !($pr && $qt) ){
                  //echo "<br> One of the consists of null data";
                  $msg['id'] = $id;
//                  echo "<br>id= ".$msg['id'];
//                  echo "<br>price= ".$pr."<br>";
//                  echo "<br>qty= ".$qt."<br>";
//                  echo "<br>is null= ".$emp."<br>";
                  $error_count++;
                   }
 else {
     
     //echo "<br>importing data";
              $this->UploadModel->fileInsert($data_user);
          }
          if($error_count==0)
          {
              $msg['info'] = "<br>Data Import Successful";
          }
          else
          {
              $msg['info'] = '<br>Data Import Failed';
          }
          $msg['records'] = $this->Book_Model->get_books();
           
          
          
                  
 }
    $this->load->view('showBooksView',$msg);
                //Read excel rows as array
//   $file_name = $_FILES['excelfile']['tmp_name'];
//    $inputFileName = $file_name;
//                 $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
//            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
//            $objPHPExcel = $objReader->load($inputFileName);
//                  $sheetInsertData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
//      foreach($sheetInsertData as $rec)
//      { 
//          //If you want row as a array use $rec
//          $this->UploadModel->fileInsert($rec);
//
//          //Get column values from row array
//          /*foreach($rec as $recm)
//          {
//               echo $recm."<br>";
//          }*/
//      }   
      }
} 
