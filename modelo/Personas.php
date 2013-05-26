<?php

/**
 * clase que guarda los datos de las personas encargadas de recibir los modulos del laboratorio para las practicas
 * @autores: 
 * javier morales <ing.morales.javer@gmail.com>
 * luis figueroa <ing.lefigueroa.hernandez@gmail.com>
 */

class personas extends Modelo {
    
    private $idencargado; // numero de identificacion de la persona encargada de recibir el modulo para realizar las practicas (docente o estudiante)
    private $nombres; // para el primer y segundo nombre del encargado de recibir el modulo
    private $apellido; // para los apellidos del encargado de recibir el modulo 
    private $asignatura; // para la asignatura de la cual se va a realizar la practica en el laboratorio
    private $telefono; // numero telefonico del encargado de recibir la sala
    
    /**
     * 
     */
    public function __construct() {
        parent::__construct();
    }
    // mapear datos de la tabla de personas
     /**
      * Trae los valores de la base de datos y los mapea con los campos de la clase.
      * @param personas $personas
      * @param array $props
      */
     private function mapearpersonas(personas $personas, array $props) {
        if (array_key_exists('idencargado', $props)) {
            $personas->setIdencargado($props['idencargado']);
        }
        if (array_key_exists('nombres', $props)) {
            $personas->setNombres($props['nombres']);
        }
        if (array_key_exists('apellido', $props)) {
            $personas->setApellido($props['apellido']);
        }
        if(array_key_exists('asignatura', $props)){
            $personas->setAsignatura($props['asignatura']);
        }
        if(array_key_exists('telefono', $props)){
            $personas->setTelefono($props['telefono']);
        }
    }
    
    /**
     * 
     * @param personas $personas
     * @return type
     */
    private function getParametros(personas $personas) {
        $parametros = array(
            ':idencargado' => $personas->getIdencargado(),
            ':nombres' => $personas->getNombres(),
            ':apellido' => $personas->getApellido(),
            ':asignatura' => $personas->getAsignatura(),
            ':telefono' => $personas->getTelefono(),
        );
        return $parametros;
    }
    //getter and setter
    public function getIdencargado() {
        return $this->idencargado;
    }

    public function setIdencargado($idencargado) {
        $this->idencargado = $idencargado;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function setNombre($nombres) {
        $this->nombres = $nombres;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getAsignatura() {
        return $this->asignatura;
    }

    public function setAsignatura($asignatura) {
        $this->asignatura = $asignatura;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
  //Funciones CRUD
    
/**
 * 
 * @param personas $personas
 */
    public function crearPersonas(personas $personas) {
        $sql = "INSERT INTO personas (idencargado, nombres, apellido, asignatura, telefono) ";
        $sql .= " VALUES (:idencargado, :nombres, :apellidos, :asignatura, :telefono)";
        $this->__setSql($sql);
        $this->prepararSentencia($sql);
        $this->sentencia->bindParam(":idencargado", $personas->getIdencargado(),PDO::PARAM_STR);
        $this->sentencia->bindParam(":nombres", $personas->getNombres(),PDO::PARAM_STR);
        $this->sentencia->bindParam(":apellidos", $personas->getApellido(),PDO::PARAM_STR);
        $this->sentencia->bindParam(":asignatura", $personas->getAsignatura(),PDO::PARAM_STR);
        $this->sentencia->bindParam(":telefono", $personas->getTelefono(),PDO::PARAM_STR);
        $this->ejecutarSentencia();
    }
    
}

?>
