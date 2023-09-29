<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CalculoAjusteDePrecoIgpmTest extends TestCase
{

    public function testCalculoAjusteDePrecoIgpm()
    {
        $response = $this->get('/api/ajusteDePrecoPeriodo/igpm/200/?de=30/01/2022&ate=30/01/2023');
        $response->assertStatus(200);
        $response->assertJson([
            'data' => '286,15',
        ]);
    }
}
