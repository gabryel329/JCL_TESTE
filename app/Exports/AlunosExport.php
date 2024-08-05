<?php

namespace App\Exports;

use App\Models\Alunos;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class AlunosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('alunos')
            ->join('cursos', 'alunos.curso_id', '=', 'cursos.id')
            ->select('alunos.id', 'alunos.nome', 'alunos.cpf', 'alunos.data_nascimento', 'cursos.nome as curso_nome', 'alunos.telefone', 'alunos.whatsapp')
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nome',
            'CPF',
            'Data de Nascimento',
            'Curso',
            'Telefone',
            'Whatsapp'
        ];
    }

    public function map($aluno): array
    {
        return [
            $aluno->id,
            $aluno->nome,
            $aluno->cpf,
            $aluno->data_nascimento,
            $aluno->curso_nome,
            $aluno->telefone,
            $aluno->whatsapp,
        ];
    }
}
