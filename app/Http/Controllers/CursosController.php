<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Cursos::all();

        return view('cadastros.cursos', compact(['cursos']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nome = $request->input('nome');
    
        $existeCurso = Cursos::where('nome', $nome)->first();
    
        if ($existeCurso) {
            return redirect()->route('curso.index')->with('error', 'Curso já cadastrado!');
        }
    
        Cursos::create([
            'nome' => $nome,
        ]);
    
        return redirect()->route('curso.index')->with('success', 'Curso cadastrado!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cursos $cursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cursos $cursos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cursos = Cursos::find($id);

        if (!$cursos){
            return redirect()->back()->with('error', 'Curso não encontrado!');
        }

        $cursos->nome = $request->input('nome');

        $cursos->save();

        return redirect()->back()->with('success', 'Curso Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cursos = Cursos::findOrFail($id);
    
        $cursos->delete();
    
        return redirect()->route('curso.index')->with('error', 'Curso excluído com sucesso!');
    } 
}
