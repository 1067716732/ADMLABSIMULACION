<?php

/**
 * clase que guarda los datos de las personas encargadas de recibir los modulos del laboratorio para las practicas
 * @autores: 
 * javier morales <ing.morales.javer@gmail.com>
 * luis figueroa <>
 */

class personas extends Modelo {
    
    private $idencargado; // numero de identificacion de la persona encargada de recibir el modulo para realizar las practicas (docente o estudiante)
    private $nombre; // para el primer y segundo nombre del encargado de recibir el modulo
    private $apellido; // para los apellidos del encargado de recibir el modulo 
    private $asignatura; // para la asignatura de la cual se va a realizar la practica en el laboratorio
    private $telefono; // numero telefonico del encargado de recibir la sala
    
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
        if (array_key_exists('nombre', $props)) {
            $personas->setNombre($props['nombre']);
        }
        if (array_key_exists('apellido', $props)) {
            $personas->setApellido($props['apellido']);
        }
        if(array_key_exists('asignatura', $props)){
            $personas->setAsignatura($props['asignatura']);
        }
        
        
       // aca hay una prueba
        if(array_key_exists('telefono', $props)){
            $personas->setTelefono($props['telefono']);
        }
    }
    
    //getter and setter
    public function getIdencargado() {
        return $this->idencargado;
    }

    public function setIdencargado($idencargado) {
        $this->idencargado = $idencargado;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
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
  
}

?>
