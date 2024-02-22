<?php

namespace Tests\Feature\TestesIntegracao;

use App\Models\Livro;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LivrosControllerCreateTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

     /**
     * Um exemplo básico de Asserção (Afirmação, Retorno) de Criação de Livros
     */

    public function testCreateLivro()
    {
        // Gerar dados faker para o livro
        $livroData = [
            'titulo' => $this->faker->sentence(4),
            'autor' => $this->faker->name,
            'ano_publicacao' => $this->faker->year
        ];

        // Enviar uma requisição POST para o endpoint de criação de livro
        $response = $this->post('/api/livros/create', $livroData);

        // Verificar se a resposta foi bem-sucedida
        $response->assertStatus(201);

        // Verificar se o livro foi criado no banco de dados
        $this->assertDatabaseHas('livros', $livroData);

        // Verificar se a resposta contém os dados do livro criado
        $response->assertJson($livroData);
    }

}
