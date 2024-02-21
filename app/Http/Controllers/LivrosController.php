<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivrosController extends Controller
{
    
    public function index(Livro $livro)
    {
        // return response()->json([
        //     ['titulo'=>'teste', 'autor'=>'teste', 'ano_publicacao'=>'teste'],
        //     ['titulo'=>'teste', 'autor'=>'teste', 'ano_publicacao'=>'teste'],
        //     ['titulo'=>'teste', 'autor'=>'teste', 'ano_publicacao'=>'teste'],
        // ]);

        return response()->json($livro->all());
    }

    public function create(Request $request)
    {
        $livro = Livro::create([
            'titulo' => $request->input('titulo'),
            'autor' => $request->input('autor'),
            'ano_publicacao' => $request->input('ano_publicacao'),
        ]);

        return response()->json($livro, 201);
    }
}