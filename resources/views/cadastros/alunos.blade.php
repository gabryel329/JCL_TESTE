@extends('layouts.app')

@section('content')
<main class="app-content">
    
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Lista de Alunos Matriculados</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Alunos</a></li>
        </ul>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-warning">
        {{ session('error') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Novo</h3>
                <form method="POST" action="{{ route('aluno.store') }}" class="form-horizontal">
                    @csrf
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label class="form-label">Nome do Aluno</label>
                            <input name="nome" class="form-control" type="text" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">CPF</label>
                            <input name="cpf" id="cpf" class="form-control" type="text" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label class="form-label">Data Nascimento</label>
                            <input name="data_nascimento" class="form-control" type="date" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Curso</label>
                            <select class="form-control" name="curso_id" required>
                                <option disabled selected>Escolha</option>
                                @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label class="form-label">Telefone</label>
                            <input name="telefone" onkeyup="mascaraFone(event)" id="telefone" class="form-control" type="text" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Whatsapp</label>
                            <input name="whatsapp" onkeyup="mascaraFone1(event)" id="whatsapp" class="form-control" type="text" required>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-primary" type="submit">Salvar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Lista de Alunos
                    <a href="{{ route('aluno.excel') }}" class="btn btn-success float-end">Excel</a>
                    <a href="{{ route('aluno.pdf') }}" class="btn btn-warning float-end">PDF</a>
                </h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Curso</th>
                            <th>CPF</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alunos as $aluno)
                        <tr>
                            <td>{{ $aluno->id }}</td>
                            <td>{{ $aluno->nome }}</td>
                            <td>{{ optional($aluno->curso)->nome }}</td>
                            <td>{{ $aluno->cpf }}</td>
                            <td>
                                <div>
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal{{ $aluno->id }}">
                                        Editar
                                    </button>
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('aluno.destroy', $aluno->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')" class="btn btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>

                        <div class="modal fade" id="editModal{{ $aluno->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $aluno->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $aluno->id }}">Editar Aluno</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('aluno.update', $aluno->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3 row">
                                                <div class="col-md-6">
                                                    <label class="form-label">Nome do Aluno</label>
                                                    <input name="nome" class="form-control" value="{{ $aluno->nome }}" type="text">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">CPF</label>
                                                    <input name="cpf" id="cpf1" class="form-control" value="{{ $aluno->cpf }}" type="text">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-md-6">
                                                    <label class="form-label">Data Nascimento</label>
                                                    <input name="data_nascimento" class="form-control" value="{{ $aluno->data_nascimento }}" type="date">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Curso</label>
                                                    <select class="form-control" name="curso_id">
                                                        <option value="{{ $aluno->curso_id }}" selected>{{ optional($aluno->curso)->nome }}</option>
                                                        @foreach ($cursos as $curso)
                                                        <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-md-6">
                                                    <label class="form-label">Telefone</label>
                                                    <input name="telefone" id="telefone1" onkeyup="mascaraFone2(event)" class="form-control" value="{{ $aluno->telefone }}" type="text">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Whatsapp</label>
                                                    <input name="whatsapp" id="whatsapp1" onkeyup="mascaraFone3(event)" class="form-control" value="{{ $aluno->whatsapp }}" type="text">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection