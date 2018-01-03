<?php
/**
 * Created by PhpStorm.
 * User: FAISAL ABDUL HAMID
 * Date: 14/09/2017
 * Time: 5:39
 */

namespace App\Algoritma;

class Genetika
{
    public $mutasi;
    public $crossover;
    public $populasi;

    public function __construct($mutasi, $crossover, $populasi)
    {
        $this->mutasi = $mutasi;
        $this->crossover = $crossover;
        $this->populasi = $populasi;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }



}