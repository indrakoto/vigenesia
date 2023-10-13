
<?php



class Listuser extends CI_Controller{


    public function index() {

        $data['title'] = "Data User";
        //$data['getdata'] = self::getAll();

        $this->load->view('listuser', $data);
    }

    function getAll() 
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => base_url().'api/user',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Cookie: PHPSESSID=l1kkhkek1fp96051q8fskh1kn6'
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;

    }
}