<?php

/**
 * clase que guarda los datos de los equipos de laboratorio
 * @autores: 
 * javier morales <ing.morales.javer@gmail.com>
 * luis figueroa <ing.lefigueroa.hernandez@gmail.com>
 */

class Equipo extends Modelo {
private $idEquipo; // para el numero de identificacion del equipo
private $nomEquipo; // para el nombre del equipo
private $mante_preventivo; // para la fecha de mantenimiento preventivo que es el que se les realiza a los equipos semestralmente
private $mante_correctivo; // para la fecha de mantenimiento correctivo que es cuando los equipos presentaqn fallos durante el semestre y se les hace mantenimiento

/**
 * 
 */
public function __construct() {
        parent::__construct();
    }

// mapear datos de la tabla de Equipos
     /**
      * Trae los valores de la base de datos y los mapea con los campos de la clase.
      * @param Equipo $Equipo
      * @param array $props
      */
        
 private function mapearEquipo (Equipo $Equipo, array $props) {
       if (array_key_exists('idEquipo', $props)){
           $Equipo->setIdEquipo($props['idEquipo']);
       }    
       if (array_key_exists('nomEquipo', $props)){
           $Equipo->setNomEquipo($props['nomEquipo']);
       } 
       if (array_key_exists('mante_preventivo', $props)){
           $Equipo->setMante_preventivo(self::crearFecha($$props['mante_preventivo']));
       } 
       if (array_key_exists('mante_correctivo', $props)){
           $Equipo->setMante_correctivo(self::crearFecha($props['mante_correctivo']));
       } 
    }
    
     /**
      * 
      * @param Equipo $Equipo
      * @return type
      */
    private function getParametros(Equipo $Equipo) {
        $parametros = array(
            ':idEquipo' => $Equipo->getIdEquipo(),
            ':nomEquipo' => $Equipo->getNomEquipo(),
            ':mante_preventivo' => $this->formatearFecha($Equipo->getMante_preventivo()),
            ':mante_correctivo' => $this->formatearFecha($Equipo->getMante_correctivo()),
        );
        return $parametros;
    }
//getter and setter
/**
 * 
 * @return type
 */
public function getIdEquipo() {
    return $this->idEquipo;
}

public function setIdEquipo($idEquipo) {
    $this->idEquipo = $idEquipo;
}

public function getNomEquipo() {
    return $this->nomEquipo;
}

public function setNomEquipo($nomEquipo) {
    $this->nomEquipo = $nomEquipo;
}

public function getMante_preventivo() {
    return $this->mante_preventivo;
}

public function setMante_preventivo($mante_preventivo) {
    $this->mante_preventivo = $mante_preventivo;
}

public function getMante_correctivo() {
    return $this->mante_correctivo;
}

public function setMante_correctivo($mante_correctivo) {
    $this->mante_correctivo = $mante_correctivo;
}

// funciones CRUD

/**
 * 
 * @param Equipo $Equipo
 */
public function crearEquipo(Equipo $Equipo) {
        $sql = "INSERT INTO Equipo (idEquipo, nomEquipo, mante_preventivo, mante_correctivo) ";
        $sql .= " VALUES (:idEquipo, :nomEquipo, :mante_preventivo, :mante_correctivo)";
        $this->__setSql($sql);
        $this->prepararSentencia($sql);
        $this->sentencia->bindParam(":idEquipo", $Equipo->getIdEquipo(),PDO::PARAM_STR);
        $this->sentencia->bindParam(":nomEquipo", $Equipo->getNomEquipo(),PDO::PARAM_STR);
        $this->sentencia->bindParam(":mante_preventivo", $this->formatearFecha($Equipo->getMante_preventivo()),PDO::PARAM_STR);
        $this->sentencia->bindParam(":mante_correctivo", $this->formatearFecha($Equipo->getMante_correctivo()),PDO::PARAM_STR);
       
        $this->ejecutarSentencia();
    }
    
}
?>
