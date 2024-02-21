<?php

namespace Tests\Feature\TestesIntegracao;

use App\Models\Livro;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LivrosControllerGetTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Um exemplo de básico de Asserção (Afirmação, Retorno) de Busca de Livros
     */
    public function test_livros_get(): void
    {
        // Criar 3 livros
        $livros = Livro::factory(5)->create();

        // Enviar requisição get ao endpoint de livros para recuperar todos
        $response = $this->getJson('/api/livros');

        // Se precisar verificar o retorno dos headers, data
        // dd($response->baseResponse);

        // Implementa as Asserções
        $response->assertStatus(200);
        $response->assertJsonCount(5);
        
    }

}
