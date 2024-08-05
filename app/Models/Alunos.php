<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alunos extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='alunos';
    protected $fillable = [
        'nome',
        'data_nascimento',
        'cpf',
        'telefone',
        'whatsapp',
        'curso_id',
    ];
    protected $dates=['deleted_at'];

    public function curso()
    {
        return $this->belongsTo(Cursos::class, 'curso_id');
    }
}
