<?php
defined('BASEPATH') or exit('No direct script access allowed');

class inicio extends CI_Controller
{

    public function __construct ()
    {
        $this->load-> helper ('url');
    }


    public function index()
    {

        $this->output->set_status_header ('404'); 
        $this->load-> view ('Error_404_view');



    }



}