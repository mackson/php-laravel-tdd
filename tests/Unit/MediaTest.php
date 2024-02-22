<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class MediaTest extends TestCase
{
    /**
     * Um simples teste Unitário para cáclculo da media de notas
     */
    public function test_media(): void
    {
        $notasMatematica = [
            'nota1' => 7.2,
            'nota2' => 7.3,
            'nota3' => 8.5,
            'nota4' => 8.5,
        ];

        $notasCiencias = [
            'nota1' => 4.2,
            'nota2' => 7.0,
            'nota3' => 8.0,
            'nota4' => 6.0,
        ];

        $notasPortugues = [
            'nota1' => 8.2,
            'nota2' => 7.3,
            'nota3' => 7.5,
            'nota4' => 9.5,
        ];

        // Cálculo das médias
        $mediaMatematica = array_sum($notasMatematica) / count($notasMatematica);
        $mediaCiencias = array_sum($notasCiencias) / count($notasCiencias);
        $mediaPortugues = array_sum($notasPortugues) / count($notasPortugues);

        $this->assertGreaterThanOrEqual(7, $mediaMatematica, 'A Média de Matemática foi menor que 7');
        $this->assertGreaterThanOrEqual(6, $mediaCiencias, 'A Média de Ciências foi menor que 6');
        $this->assertGreaterThanOrEqual(8, $mediaPortugues, 'A Média de Lingua Portuguesa foi menor que 8');

        echo "Média de Matemática: " . $mediaMatematica . "\n";
        echo "Média de Ciências: " . $mediaCiencias . "\n";
        echo "Média de Língua Portuguesa: " . $mediaPortugues . "\n";

    }
}
