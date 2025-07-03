<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FinanzasTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_páginaIndex(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee("descuento");
        $response->assertSee("impuesto");
        $response->assertSee("precio final");
    }

    public function test_getFormularioImpuesto()
    {
        $response = $this->get('/impuesto');
        $response->assertStatus(200);
        $response->assertSee("Monto");
        $response->assertSee("Tasa");
        $response->assertSee("Cálculo de Impuesto");
        $response->assertSee("Calcular");
        $response->assertSee("form");
        $response->assertSee("post");
    }

    public function test_impuestoDatosPorDefecto() {
        $response = $this->post('/impuesto', ["monto"=>50]);
        $response->assertStatus(200);
        $response->assertSee("El impuesto es de 7.50 lps.");
    }

    public function test_impuestoDatosCorrectos() {
        $response = $this->post('/impuesto', ["monto"=>50, "tasa"=>20]);
        $response->assertStatus(200);
        $response->assertSee("El impuesto es de 10.00 lps.");
    }

    public function test_impuestoMontoNegativo() {
        $response = $this->post('/impuesto', ["monto"=>-50, "tasa"=>20]);
        $response->assertStatus(200);
        $response->assertDontSee("El impuesto es de -10.00 lps.");
        $response->assertSee("El monto deber un valor positivo o cero.");
    }

    public function test_impuestoTasaNegativa() {
        $response = $this->post('/impuesto', ["monto"=>50, "tasa"=>-20]);
        $response->assertOk();
        $response->assertDontSee("El impuesto es de -10.00 lps.");
        $response->assertSee("La tasa de impuesto deber un valor positivo o cero.");
    }




}
