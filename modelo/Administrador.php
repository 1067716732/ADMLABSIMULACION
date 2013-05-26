<?php

/**
 * clase que guarda los datos del administrador
 * @autores: 
 * javier morales <ing.morales.javer@gmail.com>
 * luis figueroa <ing.lefigueroa.hernandez@gmail.com>
 */

class Administrador extends Modelo {
    private $idAdministrador; // campo para el numero de identificacion de administrador
    private $nomAdministrador; // campo para los nombres del administrador
    private $apeAdministrador; // campo para los apellidos del administrador
    private $telAdministrador; // campo para el numero de telefono del administrador
    private $cargo; // campo para el cargo que ejerce el administrador dentro del laboratorio
    
   /**
    * 
    */
    
    public function __construct() {
        parent::__construct();
    }
    
    // mapear datos de la tabla Administrador
    /**
      * Trae los valores de la base de datos y los mapea con los campos de la clase.
      * @param Administrados $Administrador
      * @param array $props
      */
    
    private function mapearAdministrador (Administrador $Administrador, array $props) {
       if (array_key_exists('idAdministrador', $props)){
           $Administrador->setIdAdministrador($props['idAdministrador']);
       }    
       if (array_key_exists('nomAdministrador', $props)){
           $Administrador->setNomAdministrador($props['nomAdministrador']);
       } 
       if (array_key_exists('apeAdministrador', $props)){
           $Administrador->setApeAdministrador($props['apeAdministrador']);
       } 
       if (array_key_exists('cargo', $props)){
           $Administrador->setCargo($props['cargo']);
       } 
    }
    
    /**
     * 
     * @param Administrador $Administrador
     * @return type
     */
    private function getParametros(Administrador $Administrador) {
        $parametros = array(
            ':idAdministrador' => $Administrador->getIdAdministrador(),
            ':nomAdministrador' => $Administrador->getNomAdministrador(),
            ':apeAdministrador' => $Administrador->getApeAdministrador(),
            ':cargo' => $Administrador->getCargo(),
        );
        return $parametros;
    }
    //getter and setter
    /**
     * 
     * @return type
     */
    
    public function getIdAdministrador() {
        return $this->idAdministrador;
    }

    public function setIdAdministrador($idAdministrador) {
        $this->idAdministrador = $idAdministrador;
    }

    public function getNomAdministrador() {
        return $this->nomAdministrador;
    }

    public function setNomAdministrador($nomAdministrador) {
        $this->nomAdministrador = $nomAdministrador;
    }

    public function getApeAdministrador() {
        return $this->apeAdministrador;
    }

    public function setApeAdministrador($apeAdministrador) {
        $this->apeAdministrador = $apeAdministrador;
    }

    public function getTelAdministrador() {
        return $this->telAdministrador;
    }

    public function setTelAdministrador($telAdministrador) {
        $this->telAdministrador = $telAdministrador;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }
    
 //Funciones CRUD
    
/**
 * 
 * @param Administrador $Administrador
 */
    public function crearAdministrador(Administrador $Administrador) {
        $sql = "INSERT INTO Administrador (idAdministrador, nomAdministrador, apeAdministrador, telAdministrador, cargo) ";
        $sql .= " VALUES (:idAdministrador, :nomAdministrador, :apeAdministrador, :telAdministrador, :cargo)";
        $this->__setSql($sql);
        $this->prepararSentencia($sql);
        $this->sentencia->bindParam(":idAdministrador", $Administrador->getIdAdministrador(),PDO::PARAM_STR);
        $this->sentencia->bindParam(":nomAdministrador", $Administrador->getNomAdministrador(),PDO::PARAM_STR);
        $this->sentencia->bindParam(":apeAdministrador", $Administrador->getApeAdministrador(),PDO::PARAM_STR);
        $this->sentencia->bindParam(":telAdministrador", $Administrador->getTelAdministrador(),PDO::PARAM_STR);
        $this->sentencia->bindParam(":cargo", $Administrador->getCargo(),PDO::PARAM_STR);
        $this->ejecutarSentencia();
    }
    
}

?>
