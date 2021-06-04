<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Clientes;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientesTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCreate(){

        

        $cliente = Clientes::create([   'nome' => 'Hugo', 
                                        'email' => 'hugo@hugo.com',
                                        'endereco' => 'Rua, tres',
                                        'nascimento' => '1979-01-31']);

        $this->assertDatabaseHas('Clientes', ['nome' => 'Hugo']);

       
    }

}
