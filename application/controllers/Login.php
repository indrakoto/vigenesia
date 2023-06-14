<?php

class Login extends CI_Controller 
{


    public function index(){
        $this->load->helper('form');

        if($this->input->post('submit')){

            $email = $this->input->post('email');
            $password =  $this->input->post('password');

            $result = json_decode( self::getAkses($email,$password) );

            print_r($result);

        }

        $data['title'] = 'Login';
        $this->load->view('login',$data);
    }

    function getAkses($email,$password){
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://localhost/oprek/vigenesia/api/login',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => 'email='.$email.'&password='.$password,
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'Cookie: PHPSESSID=l1kkhkek1fp96051q8fskh1kn6'
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;

    }


}

