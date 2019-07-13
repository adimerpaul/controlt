<?php
class Bus extends CI_Controller{
    function index(){
        if ($_SESSION['tipo']==""){
            header("Location: ".base_url());
        }
        $this->load->view('templates/header');
        $this->load->view('bus');
        $this->load->view('templates/footer');
    }
    function buscarbus(){
        $placa=$_POST['placa'];
        $consulta="SELECT * FROM transporte WHERE placa='$placa'";
        $query=$this->db->query($consulta);
        echo json_encode($query->result_array());

    }
}

    
