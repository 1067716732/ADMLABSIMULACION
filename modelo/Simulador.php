<?php

/**
 * clase que guarda los datos de los simuladores con los que cuenta el laboratorio
 * @autores: 
 * javier morales <ing.morales.javer@gmail.com>
 * luis figueroa <ing.lefigueroa.hernandez@gmail.com>
 */

class Simulador extends Modelo {
    private $idSimulador; // numero de identificacion del simulador
    private $nomSimulador; // nombre del simulador
    private $fecha_ingreso; // fecha en la cual el simulador ingreso al laboratorio
    private $mante_preventivo; //para la fecha de mantenimiento preventivo que es el que se les realiza a los equipos semestralmente
    private $mante_correctivo; // para la fecha de mantenimiento correctivo que es cuando los equipos presentaqn fallos durante el semestre y se les hace mantenimiento
    private $casa_distribuidora; // nombre de la casa a la cual se le compro el simulador 
    
    /**
     * 
     */
    public function __construct() {
        parent::__construct();
    }
     // mapear datos de la tabla de Simulador
     /**
      * Trae los valores de la base de datos y los mapea con los campos de la clase.
      * @param Simulador $Smulador
      * @param array $props
      */
    private function mapearSimulador(Simulador $Simulador, array $props) {
       
        if (array_key_exists('idSimulador', $props)) {
            $Simulador->setIdSimulador($props['idSimulador']);
        }
        if (array_key_exists('nomSimulador', $props)) {
            $Simulador->setNomSimulador($props['nomSimulador']);
        }
        if (array_key_exists('fecha_ingreso', $props)) {
            $Simulador->setFecha_ingresoecha_ingreso(self::crearFecha($props['fecha_ingreso']));
        }
        if (array_key_exists('mante_preventivo', $props)){
           $Simulador->setMante_preventivo(self::crearFecha($$props['mante_preventivo']));
       } 
       if (array_key_exists('mante_correctivo', $props)){
           $Simulador->setMante_correctivo(self::crearFecha($props['mante_correctivo']));
       } 
        if (array_key_exists('casa_distribuidora', $props)) {
            $Simulador->setCasa_distribuidora($props['casa_distribuidora']);
        }
    }
    
    /**
     * 
     * @param Simulador $Simulador
     * @return type
     */
    private function getParametros(Simulador $Simulador) {
        $parametros = array(
            ':idSimulador' => $Simulador->getIdSimulador(),
            ':nomSimulador' => $Simulador->getNomSimulador(),
            ':fecha_ingreso' => $this->formatearFecha($Simulador->getFecha_ingreso()),
            ':mante_preventivo' => $this->formatearFecha($Simulador->getMante_preventivo()),
            ':mante_correctivo' => $this->formatearFecha($Simulador->getMante_correctivo()),
            ':casa_distribuidora' => $Simulador->getCasa_distribuidora(),
        );
        return $parametros;
    }
    
    // getter and setter
    /**
     * 
     * @return type
     */
    
    public function getIdSimulador() {
        return $this->idSimulador;
    }

    public function setIdSimulador($idSimulador) {
        $this->idSimulador = $idSimulador;
    }

    public function getNomSimulador() {
        return $this->nomSimulador;
    }

    public function setNomSimulador($nomSimulador) {
        $this->nomSimulador = $nomSimulador;
    }

    public function getFecha_ingreso() {
        return $this->fecha_ingreso;
    }

    public function setFecha_ingreso($fecha_ingreso) {
        $this->fecha_ingreso = $fecha_ingreso;
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

    public function getCasa_distribuidora() {
        return $this->casa_distribuidora;
    }

    public function setCasa_distribuidora($casa_distribuidora) {
        $this->casa_distribuidora = $casa_distribuidora;
    }

// funciones CRUD

/**
 * 
 * @param Simulador $Simulador
 */
public function crearSimulador(Simulador $Simulador) {
        $sql = "INSERT INTO Simulador (idSimulador, nomSimulador, fecha_ingreso, mante_preventivo, mante_correctivo, casa_distribuidora) ";
        $sql .= " VALUES (:idSimulador, :nomSimulador, :fecha_ingreso, :mante_preventivo, :mante_correctivo, :casa_distribuidora)";
        $this->__setSql($sql);
        $this->prepararSentencia($sql);
        $this->sentencia->bindParam(":idSimulador", $Simulador->getIdSimulador(),PDO::PARAM_STR);
        $this->sentencia->bindParam(":nomSimulador", $Simulador->getNomSimulador(),PDO::PARAM_STR);
        $this->sentencia->bindParam(":fecha_ingreso", $this->formatearFecha($Simulador->getFecha_ingreso()),PDO::PARAM_STR);
        $this->sentencia->bindParam(":mante_preventivo", $this->formatearFecha($Simulador->getMante_preventivo()),PDO::PARAM_STR);
        $this->sentencia->bindParam(":mante_correctivo", $this->formatearFecha($Simulador->getMante_correctivo()),PDO::PARAM_STR);
         $this->sentencia->bindParam(":casa_distribuidora", $Simulador->getCasa_distribuidora(),PDO::PARAM_STR);
       
        $this->ejecutarSentencia();
    }
}
?>
