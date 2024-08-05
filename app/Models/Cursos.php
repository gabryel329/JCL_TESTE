<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cursos extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cursos';
    protected $fillable = ['nome'];
    protected $dates=['deleted_at'];

    public function aluno()
    {
        return $this->hasMany(Alunos::class, 'curso_id');
    }
}
