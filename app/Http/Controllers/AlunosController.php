<?php

namespace App\Http\Controllers;

use App\Models\Alunos;
use App\Models\Cursos;
use Illuminate\Http\Request;

class AlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alunos = Alunos::all();
        $cursos = Cursos::all();
        return view('cadastros.alunos', compact(['alunos', 'cursos']));
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
        $cpf = $request->input('cpf');
        $data_nascimento = $request->input('data_nascimento');
        $telefone = $request->input('telefone');
        $whatsapp = $request->input('whatsapp');
        $curso_id = $request->input('curso_id');
    
        $existeAluno = Alunos::where('cpf', $cpf)->first();
    
        if ($existeAluno) {
            return redirect()->route('aluno.index')->with('error', 'Aluno já cadastrado!');
        }
    
        Alunos::create([
            'nome' => $nome,
            'cpf' => $cpf,
            'data_nascimento' => $data_nascimento,
            'telefone' => $telefone,
            'whatsapp' => $whatsapp,
            'curso_id' => $curso_id,
        ]);
    
        return redirect()->route('aluno.index')->with('success', 'Aluno cadastrado(a)!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alunos $alunos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alunos $alunos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $alunos = Alunos::find($id);

        if (!$alunos){
            return redirect()->back()->with('error', 'Aluno(a) não encontrado!');
        }

        $alunos->nome = $request->input('nome');
        $alunos->cpf = $request->input('cpf');
        $alunos->data_nascimento = $request->input('data_nascimento');
        $alunos->telefone = $request->input('telefone');
        $alunos->whatsapp = $request->input('whatsapp');
        $alunos->curso_id = $request->input('curso_id');

        $alunos->save();

        return redirect()->back()->with('success', 'Aluno(a) Atualizado com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alunos = Alunos::findOrFail($id);
    
        $alunos->delete();
    
        return redirect()->route('aluno.index')->with('error', 'Aluno(a) excluído com sucesso!');
    } 
}
