<?php

/**
 * clase que guarda los datos de los insumos con los que cuenta el laboratorio
 * @autores: 
 * javier morales <ing.morales.javer@gmail.com>
 * luis figueroa <>
 */

class Insumos extends Modelo {
    private $idInsumo; // para el nuemro de identificacion del insumo
    private $nomInsumo; // para el nombre de imsumo
    private $cantidad; // catidad del insumo en el inventario del laboratorio
    private $unidad; // unidad en la que se encuenra el insumo (litro, par etc)
    
    // mapear datos de la tabla Insumos
    /**
      * Trae los valores de la base de datos y los mapea con los campos de la clase.
      * @param Insumo $Insumo
      * @param array $props
      */
    private function mapearInsumos (Insumos $Insumos, array $props) {
       if (array_key_exists('idInsumo', $props)){
           $Insumos->setIdInsumo($props['idInsumo']);
       }    
       if (array_key_exists('nomInsumo', $props)){
           $Insumos->setNomInsumo($props['nomInsumo']);
       } 
       if (array_key_exists('cantidad', $props)){
           $Insumos->setCantidad($props['cantidad']);
       } 
       if (array_key_exists('unidad', $props)){
           $Insumos->setUnidad($props['unidad']);
       } 
    }
    
    //getter and setter
    public function getIdInsumo() {
        return $this->idInsumo;
    }

    public function setIdInsumo($idInsumo) {
        $this->idInsumo = $idInsumo;
    }

    public function getNomInsumo() {
        return $this->nomInsumo;
    }

    public function setNomInsumo($nomInsumo) {
        $this->nomInsumo = $nomInsumo;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function getUnidad() {
        return $this->unidad;
    }

    public function setUnidad($unidad) {
        $this->unidad = $unidad;
    }

   
}
?>
