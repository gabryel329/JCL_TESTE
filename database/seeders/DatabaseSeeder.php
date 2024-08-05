<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@jcl.com',
                'password' => bcrypt('12345678'),
            ],
        ]);

        $cursos = [
            ['nome' => 'Engenharia de Software'],
            ['nome' => 'Ciência da Computação'],
            ['nome' => 'Sistemas de Informação'],
            ['nome' => 'Engenharia Civil'],
            ['nome' => 'Medicina'],
            ['nome' => 'Direito'],
            ['nome' => 'Administração'],
            ['nome' => 'Contabilidade'],
            ['nome' => 'Pedagogia'],
            ['nome' => 'Psicologia'],
        ];

        foreach ($cursos as $curso) {
            DB::table('cursos')->insert([
                'nome' => $curso['nome'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        $alunos = [
            ['nome' => 'João Silva', 'data_nascimento' => '2000-01-01', 'cpf' => '111.111.111-11', 'telefone' => '(11) 1111-1111', 'whatsapp' => '(11) 11111-1111', 'curso_id' => 1],
            ['nome' => 'Maria Oliveira', 'data_nascimento' => '2000-02-01', 'cpf' => '222.222.222-22', 'telefone' => '(22) 2222-2222', 'whatsapp' => '(22) 22222-2222', 'curso_id' => 2],
            ['nome' => 'Carlos Souza', 'data_nascimento' => '2000-03-01', 'cpf' => '333.333.333-33', 'telefone' => '(33) 3333-3333', 'whatsapp' => '(33) 33333-3333', 'curso_id' => 3],
            ['nome' => 'Ana Pereira', 'data_nascimento' => '2000-04-01', 'cpf' => '444.444.444-44', 'telefone' => '(44) 4444-4444', 'whatsapp' => '(44) 44444-4444', 'curso_id' => 4],
            ['nome' => 'Paulo Santos', 'data_nascimento' => '2000-05-01', 'cpf' => '555.555.555-55', 'telefone' => '(55) 5555-5555', 'whatsapp' => '(55) 55555-5555', 'curso_id' => 5],
            ['nome' => 'Fernanda Lima', 'data_nascimento' => '2000-06-01', 'cpf' => '666.666.666-66', 'telefone' => '(66) 6666-6666', 'whatsapp' => '(66) 66666-6666', 'curso_id' => 6],
            ['nome' => 'Rafael Almeida', 'data_nascimento' => '2000-07-01', 'cpf' => '777.777.777-77', 'telefone' => '(77) 7777-7777', 'whatsapp' => '(77) 77777-7777', 'curso_id' => 7],
            ['nome' => 'Juliana Rodrigues', 'data_nascimento' => '2000-08-01', 'cpf' => '888.888.888-88', 'telefone' => '(88) 8888-8888', 'whatsapp' => '(88) 88888-8888', 'curso_id' => 8],
            ['nome' => 'Bruno Costa', 'data_nascimento' => '2000-09-01', 'cpf' => '999.999.999-99', 'telefone' => '(99) 9999-9999', 'whatsapp' => '(99) 99999-9999', 'curso_id' => 9],
            ['nome' => 'Aline Barbosa', 'data_nascimento' => '2000-10-01', 'cpf' => '000.000.000-00', 'telefone' => '(10) 1010-1010', 'whatsapp' => '(10) 10101-0101', 'curso_id' => 10],
        ];

        foreach ($alunos as $aluno) {
            DB::table('alunos')->insert([
                'nome' => $aluno['nome'],
                'data_nascimento' => Carbon::parse($aluno['data_nascimento']),
                'cpf' => $aluno['cpf'],
                'telefone' => $aluno['telefone'],
                'whatsapp' => $aluno['whatsapp'],
                'curso_id' => $aluno['curso_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
