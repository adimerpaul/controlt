<?php


class Busprint extends CI_Controller{
    function index(){
        if ($_SESSION['tipo']==""){
            header("Location: ".base_url());
        }
        $this->load->view('templates/header');
        $this->load->view('busprint');
        $this->load->view('templates/footer');
    }
    function datosucoi(){
        $mes=$_POST['mes'];
        $anio=$_POST['anio'];
        $query=$this->db->query("SELECT u.iducoi,d.nombre destino,date(fecha) fecha,time(fecha) hora,pia,acta,ti.nombre tipomercaderia,cantidad,unidad,u.tipotransporte,u.placa,u.idtransporte,comiso
FROM ucoi u 
INNER JOIN transporte t ON u.idtransporte=t.idtransporte
INNER JOIN destino d ON d.iddestino=u.iddestino
INNER JOIN tipomercaderia ti ON ti.idtipomercaderia=u.idtipomercaderia
WHERE MONTH(fecha)=$mes AND YEAR(fecha)=$anio");
        echo json_encode($query->result_array());
    }
}
