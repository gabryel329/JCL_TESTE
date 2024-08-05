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
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Novo</h3>
            <form method="POST" action="{{route('aluno.store')}}" class="form-horizontal">
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
                            @foreach ($cursos as $item)
                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label class="form-label">Telefone</label>
                        <input name="telefone" class="form-control" type="text">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Whatsapp</label>
                        <input name="whatsapp" class="form-control" type="text" required>
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
            <h3 class="tile-title">Lista de Alunos</h3>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nome</th>
                  <th>CPF</th>
                  <th>Curso</th>
                  <th>Editar</th>
                  <th>Excluir</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($alunos as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nome }}</td>
                            <td>{{ $item->cpf }}</td>
                            <td>{{ $item->curso->nome }}</td>
                            <td>
                                <div>
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                        Editar
                                    </button>
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('aluno.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')"; class="btn btn-danger">Excluir</button>
                                </form>
                            </td>                            
                        </tr>

                        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Editar Curso</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('aluno.update', $item->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3 row">
                                                <div class="col-md-6">
                                                    <label class="form-label">Nome do Aluno</label>
                                                    <input name="nome" class="form-control" value="{{ $item->nome }}" type="text" >
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">CPF</label>
                                                    <input name="cpf" class="form-control" value="{{ $item->cpf }}" type="text" >
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-md-6">
                                                    <label class="form-label">Data Nascimento</label>
                                                    <input name="data_nascimento" class="form-control" value="{{ $item->data_nascimento }}" type="date" >
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Curso</label>
                                                    <select class="form-control" name="curso_id" >
                                                        <option selected>{{ $item->curso->nome }}</option>
                                                        @foreach ($cursos as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-md-6">
                                                    <label class="form-label">Telefone</label>
                                                    <input name="telefone" class="form-control" value="{{ $item->telefone }}" type="text">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Whatsapp</label>
                                                    <input name="whatsapp" class="form-control" value="{{ $item->whatsapp }}" type="text" >
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
    </main>
@endsection
