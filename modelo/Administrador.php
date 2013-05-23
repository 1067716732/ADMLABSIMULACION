<?php

/**
 * clase que guarda los datos del administrador
 * @autores: 
 * javier morales <ing.morales.javer@gmail.com>
 * luis figueroa <>
 */

class Administrador extends Modelo {
    private $idAdministrador; // campo para el numero de identificacion de administrador
    private $nomAdministrador; // campo para los nombres del administrador
    private $apeAdministrador; // campo para los apellidos del administrador
    private $telAdministrador; // campo para el numero de telefono del administrador
    private $cargo; // campo para el cargo que ejerce el administrador dentro del laboratorio
    
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
 
}

?>
