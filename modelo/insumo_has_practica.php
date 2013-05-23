<?php

/**
 * clase que guarda los datos de la tabla intercepto entre las tablas insumo y practica
 * @autores: 
 * javier morales <ing.morales.javer@gmail.com>
 * luis figueroa <>
 */

class insumo_has_practica extends Modelo {
    
    private $Insumo_idInsumos; // numero de identificacion de insumo que se va a utilizar en la practica
    private $Practica_idPractica; // numero de identificaion de la practica que se va a realizar 
    private $cantidad; // cantidad de cada uno de los insumos que se va a utilizar en la practica la cual se resta del inventario 
    
    // mapear la tabla insumo has practica
    /**
      * Trae los valores de la base de datos y los mapea con los campos de la clase.
      * @param Simulador $Smulador
      * @param array $props
      */
    
    private function mapearinsumo_has_practica (insumo_has_practica $insumo_has_practica, array $props) {
       if (array_key_exists('Insumo_idInsumos', $props)){
           $insumo_has_practica->setInsumo_idInsumos($props['Insumo_idInsumos']);
       }    
       if (array_key_exists('Practica_idPractica', $props)){
           $insumo_has_practica->setPractica_idPractica($props['Practica_idPractica']);
       } 
       if (array_key_exists('cantidad', $props)){
           $insumo_has_practica->setCantidad($props['cantidad']);
       } 
    }


    //getter and setter
    
    /**
     * 
     * @return type
     */
    
    public function getInsumo_idInsumos() {
        return $this->Insumo_idInsumos;
    }

    public function setInsumo_idInsumos($Insumo_idInsumos) {
        $this->Insumo_idInsumos = $Insumo_idInsumos;
    }

    public function getPractica_idPractica() {
        return $this->Practica_idPractica;
    }

    public function setPractica_idPractica($Practica_idPractica) {
        $this->Practica_idPractica = $Practica_idPractica;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }  
}
?>
