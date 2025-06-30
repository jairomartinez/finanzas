<?php

namespace App\Hepers;

class FinanzasHelper
{

    /**
     * @param $monto
     * @param $tasa
     * @return float|int
     */
    public static function calcularImpuesto($monto, $tasa = 15)
    {
        return ($monto * $tasa)/100;
    }

    /**
     * @param $monto
     * @param $descuento
     * @return float|int
     */
    public static function calcularDescuento($monto, $descuento) {
        return $monto * ($descuento/100);
    }

    /**
     * @param $monto
     * @param $descuento
     * @param $tasa
     * @return float|int
     */
    public static function precioFinal($monto, $descuento, $tasa = 15) {
        return ($monto - $monto*($descuento/100))*(1+$tasa/100);
    }

}
