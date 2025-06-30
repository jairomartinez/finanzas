<?php

namespace Tests\Unit;

use App\Hepers\FinanzasHelper;
use PHPUnit\Framework\TestCase;

class FinanzasHelperTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_calculoDeImpuestoCorrectoPorDefecto(): void
    {
        $impuesto = FinanzasHelper::calcularImpuesto(100);
        $this->assertTrue($impuesto == 15.00, "Error en el calculo del impueto, se esperaba 15.00 y se recibió ".$impuesto);
    }

    public function test_calculoDeImpuestoCorrecto(): void
    {
        $impuesto = FinanzasHelper::calcularImpuesto(100, 20);
        $this->assertTrue($impuesto == 20.00);
    }
    public function test_calculoDeImpuestoMontoNegativo()
    {
        $impuesto = FinanzasHelper::calcularImpuesto(-100, 20);
        $this->assertFalse($impuesto == -20.00);
    }

    public function test_calculoDeImpuestoTasaCero() {
        $impuesto = FinanzasHelper::calcularImpuesto(100, 0);
        $this->assertTrue($impuesto == 0.00);
    }

    public function test_calculoDeImpuestoTasaNegativa()
    {
        $impuesto = FinanzasHelper::calcularImpuesto(100, -20);
        $this->assertFalse($impuesto == -20.00);
    }

    public function test_calculoDeImpuestoMontoCero()
    {
        $impuesto = FinanzasHelper::calcularImpuesto(0);
        $this->assertTrue($impuesto == 0.00);
    }

    public function test_calculoDeImpuestoDecimales()
    {
        $impuesto = FinanzasHelper::calcularImpuesto(100.75, 9.25);
        $this->assertTrue($impuesto == 9.32);
    }

    public function test_calculoDeImpuestoMontoLetras()
    {
        $impuesto = FinanzasHelper::calcularImpuesto("cien", 9.25);

        // TODO: Convertir en una exception.
        $this->assertTrue($impuesto == false);
    }

    public function test_calculoDeImpuestoTasaLetras()
    {
        $impuesto = FinanzasHelper::calcularImpuesto(100, "cero");

        // TODO: Convertir en una exception.
        $this->assertTrue($impuesto == false);
    }

    public function test_calculoDeImpuestoMontoYTasaEnLetras()
    {
        $impuesto = FinanzasHelper::calcularImpuesto("cien", "cero");

        // TODO: Convertir en una exception.
        $this->assertTrue($impuesto == false);
    }

    public function test_calculoDeImpuestoMontoEnCadena()
    {
        $impuesto = FinanzasHelper::calcularImpuesto("100", 30);
        $this->assertTrue($impuesto == 30.00);
    }

    public function test_calculoDeImpuestoMontoEsUnArray()
    {
        $impuesto = FinanzasHelper::calcularImpuesto([2 ,3, 5], 25);

        // TODO: Convertir en una exception.
        $this->assertTrue($impuesto == false);
    }
}
