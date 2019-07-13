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
    function insertucoi(){
        $iddestino=$_POST['iddestino'];
        $pia=$_POST['pia'];
        $acta=$_POST['acta'];
        $idtipomercaderia=$_POST['idtipomercaderia'];
        $cantidad=$_POST['cantidad'];
        $placa=$_POST['placa'];
        $tipotransporte=$_POST['tipotransporte'];
        $idtransporte=$_POST['idtransporte'];
        $unidad=$_POST['unidad'];
        $this->db->query("INSERT INTO ucoi SET 
        iddestino='$iddestino',
        pia='$pia',
        acta='$acta',
        idtipomercaderia='$idtipomercaderia',
        cantidad='$cantidad',
        placa='$placa',
        tipotransporte='$tipotransporte',
        idtransporte='$idtransporte$',
        unidad='$unidad',
        iduser='".$_SESSION['iduser']."'
        ");
        echo "1";
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
    function delete(){
        $id=$_POST['id'];
        $this->db->query("DELETE FROM ucoi WHERE iducoi='$id'");
        echo "1";

    }
}

    
