<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Motivasi extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }
        //$this->load->database();
        
    }

    function index_get($id=null)
    {
        if ($id == '') {
            $this->db->order_by('tanggal_input', 'DESC');
            $api = $this->db->get('motivasi')->result();
        } else {
            $this->db->where('id', $id);
            $api = $this->db->get('motivasi')->result();
        }
        $this->response($api, 200);
    }


    public function index_post()
    {
        $this->load->model('Motivasi_model');

        $data = array(
            'isi_motivasi' => $this->input->post("isi_motivasi"),
            'iduser' => $this->input->post("iduser")
        );

        //print_r($data); die();

        $insert = $this->Motivasi_model->insert($data);

        // Check if the user data is inserted
        if ($insert) {
            // Set the response and exit
            $this->response([
                'message' => 'Postingan berhasil ditambah. Added successfully.',
                'data' => $insert
            ], REST_Controller::HTTP_OK);
        }
    }

    function index_put()
    {
        $this->load->model('motivasi');

        $id = $this->put('id');

        // Get the post data
        $isi_motivasi = strip_tags($this->put('isi_motivasi'));

        // Validate the post data
        if (!empty($isi_motivasi)) {
            // Update motivasi's 
            $Data = array();
            if (!empty($isi_motivasi)) {
                $Data['isi_motivasi'] = $isi_motivasi;
            }

            $update = $this->motivasi->update($Data, $id);

            // Check if the user data is updated
            if ($update) {
                // Set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'user berhasil updated postingan.'
                ], REST_Controller::HTTP_OK);
            } else {
                // Set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            // Set the response and exit
            $this->response("Provide at least one user info to update.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    function index_delete()
    {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('motivasi');
        if ($delete) {
            $this->response([
                'message' => 'Postingan Berhasil di Hapus.',
                'data' => $delete
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
