<?php
defined('BASEPATH') or exit('No direct script access allowed');


class EmailController extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('email');
    }
   

    public function Send_mail()
    {
        
        $mailData = $this->input->post();

        // print_r($mailData);


      

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_port'] = 587; // Port 587 is for STARTTLS
        $config['smtp_user'] = 'dimpalbasnal0@gmail.com';
        $config['smtp_pass'] = 'lehk fctt zjvc ytsf'; // Replace with your Gmail App Password
        $config['smtp_crypto'] = 'tls';  // Enable STARTTLS
        $config['charset'] = 'utf-8';
        $config['mailtype'] = 'html';
        $config['newline'] = "\r\n"; // Correct newline format
        
        // Optional debugging:
        $config['smtp_debug'] = 2; // This will give more detailed debugging output.
        


        $this->email->initialize($config);

        $this->email->from('dimpalbasnal0@gmail.com', $mailData['sender']);
        $this->email->to($mailData['send_to']);
        $this->email->attach($mailData['pdf_path']);

        $this->email->subject($mailData['subject']);
        $this->email->message($mailData['content']);

        if($this->email->send()){

            echo json_encode(['success'=>true]);

        }else{
            echo json_encode(['success'=>$this->email->print_debugger()]);
        }
    }

   

}
