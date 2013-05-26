<?php

/**
 * clase que guarda los datos de las practicas que se realizan en el laboratorio
 * @autores: 
 * javier morales <ing.morales.javer@gmail.com>
 * luis figueroa <ing.lefigueroa.hernandez@gmail.com>
 */

class practica extends Modelo {
    
    private $idPractica; // para el numero de indentificacion de la practica
    private $nomPractica; // para el nombre del taller que se va a realizar
    private $fecha_practica; // para la fecha en la que se realizo la practica
    private $asignatura; // asignatura a la cual corresponde el taller que se realizo
    private $modulo; // numero del modulo donde se realizo la practica
    private $Simulador_idSimulador; // numero de identificacion del simulador que se utilizo en la practica 
    private $Equipo_idequipo; // numero de identificacion del equipo que se utilizo en la practica
    private $personas_idencargado; // numero de identificacion del encargado de recibir el modulo para la realizacion de la practica
    private $grupo; // numero del grupo del cual va a realizar la practica
    private $num_estudiantes; // numero de estudiantes que van a realizar la practica
    private $hora; // hora en que se realizo la practica 
    /**
     * 
     */
    public function __construct() {
        parent::__construct();
 }
    
    // mapear datos de la tabla de practica
     /**
      * Trae los valores de la base de datos y los mapea con los campos de la clase.
      * @param practica $practica
      * @param array $props
      */
    private function mapearpractica(practica $practica, array $props) {
        if (array_key_exists('idPractica', $props)) {
            $practica->setIdPractica($props['idPractica']);
        }
        if (array_key_exists('nomPractica', $props)) {
            $practica->setNomPractica($props['nomPractica']);
        }
        if (array_key_exists('fecha_practica', $props)) {
            $practica->setFecha_practica(self::crearFecha($props['fecha_practica']));
        }
        if(array_key_exists('asignatura', $props)){
            $practica->setAsignatura($props['asignatura']);
        }
        if(array_key_exists('modulo', $props)){
            $practica->setModulo($props['modulo']);
        }
        if (array_key_exists('Simulador_idSimulador', $props)) {
            $practica->setSimulador_idSimulador($props['Simulador_idSimulador']);
        }
        if (array_key_exists('Equipo_idequipo', $props)) {
            $practica->setEquipo_idequipo($props['Equipo_idequipo']);
        }
        if(array_key_exists('personas_idencargado', $props)){
            $practica->setPersonas_idencargado($props['personas_idencargado']);
        }
        if(array_key_exists('grupo', $props)){
            $practica->setGrupo($props['grupo']);
        }
         if(array_key_exists('hora', $props)){
            $practica->setHora($props['hora']);
        }
    }
    
    /**
     * 
     * @param practica $practica
     * @return type
     */
     private function getParametros(practica $practica) {
        $parametros = array(
            ':idPractica' => $practica->getIdPractica(),
            ':nomPractica' => $practica->getNomPractica(),
            ':fecha_practica' => $practica->getFecha_practica(),
            ':asignatura' => $this->formatearFecha($practica->getAsignatura()),
            ':modulo' => $practica->getModulo(),
            ':Simulador_idSimulador' => $practica->getSimulador_idSimulador(),
            ':Equipo_idequipo' => $practica->getEquipo_idequipo(),
            ':num_estudiantes' => $practica->getNum_estudiantes(),
            ':hora' => $practica->getHora(),
            ':personas_idencargado' => $practica->getPersonas_idencargado(),
            ':grupo' => $practica->getGrupo()
                
        );
        return $parametros;
    }
    //getter and setter
    /**
     * 
     * @return type
     */
    
    public function getIdPractica() {
        return $this->idPractica;
    }

    public function setIdPractica($idPractica) {
        $this->idPractica = $idPractica;
    }

    public function getNomPractica() {
        return $this->nomPractica;
    }

    public function setNomPractica($nomPractica) {
        $this->nomPractica = $nomPractica;
    }

    public function getFecha_practica() {
        return $this->fecha_practica;
    }

    public function setFecha_practica($fecha_practica) {
        $this->fecha_practica = $fecha_practica;
    }

    public function getAsignatura() {
        return $this->asignatura;
    }

    public function setAsignatura($asignatura) {
        $this->asignatura = $asignatura;
    }

    public function getModulo() {
        return $this->modulo;
    }

    public function setModulo($modulo) {
        $this->modulo = $modulo;
    }

    public function getSimulador_idSimulador() {
        return $this->Simulador_idSimulador;
    }

    public function setSimulador_idSimulador($Simulador_idSimulador) {
        $this->Simulador_idSimulador = $Simulador_idSimulador;
    }

    public function getEquipo_idequipo() {
        return $this->Equipo_idequipo;
    }

    public function setEquipo_idequipo($Equipo_idequipo) {
        $this->Equipo_idequipo = $Equipo_idequipo;
    }

    public function getPersonas_idencargado() {
        return $this->personas_idencargado;
    }

    public function setPersonas_idencargado($personas_idencargado) {
        $this->personas_idencargado = $personas_idencargado;
    }

    public function getGrupo() {
        return $this->grupo;
    }

    public function setGrupo($grupo) {
        $this->grupo = $grupo;
    }

    public function getNum_estudiantes() {
        return $this->num_estudiantes;
    }

    public function setNum_estudiantes($num_estudiantes) {
        $this->num_estudiantes = $num_estudiantes;
    }

    public function getHora() {
        return $this->hora;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

// funciones CRUD

/**
 * 
 * @param practica $practica
 */
public function crearPractica(practica $practica) {
        $sql = "INSERT INTO Practica (idPractica, nomPractica, fecha_practica, asignatura, modulo, Simulador_idSimulador, Equipo_idequipo, personas_idencargado, grupo, num_estudiantes, hora) ";
        $sql .= " VALUES (:idPractica, :nomPractica, :fecha_practica, :asignatura, :modulo, :Simulador_idSimulador, :Equipo_idequipo, :personas_idencargado, :grupo, :num_estudiantes, :hora)";
        $this->__setSql($sql);
        $this->prepararSentencia($sql);
        $this->sentencia->bindParam(":idPractica", $practica->getIdPractica(),PDO::PARAM_STR);
        $this->sentencia->bindParam(":nomPractica", $practica->getNomPractica(),PDO::PARAM_STR);
        $this->sentencia->bindParam(":fecha_practica", $this->formatearFecha($practica->getFecha_practica()),PDO::PARAM_STR);
        $this->sentencia->bindParam(":asignatura", $practica->getAsignatura(),PDO::PARAM_STR);
        $this->sentencia->bindParam(":modulo", $practica->getModulo(),PDO::PARAM_STR);
        $this->sentencia->bindParam(":Simulador_idSimulador", $practica->getSimulador_idSimulador(),PDO::PARAM_STR);
        $this->sentencia->bindParam(":Equipo_idequipo", $practica->getEquipo_idequipo(),PDO::PARAM_STR);
        $this->sentencia->bindParam(":personas_idencargado", $practica->getPersonas_idencargado(),PDO::PARAM_STR);
        $this->sentencia->bindParam(":grupo", $practica->getGrupo(),PDO::PARAM_STR);
        $this->sentencia->bindParam(":num_estudiantes", $practica->getNum_estudiantes(),PDO::PARAM_STR);
        $this->sentencia->bindParam(":hora", $practica->getHora(),PDO::PARAM_STR);
       
        $this->ejecutarSentencia();
    }
    
}
?>
