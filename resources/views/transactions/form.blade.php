@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <a href="{{ url('transactions') }}">Voltar</a>
        </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            @if (Request::is('*/view/*'))
            <div class="form-group">
              <label for="input-transId">ID - Transação</label>
              <input
                type="text"
                name="id"
                class="form-control"
                id="input-transId"
                value="{{ $transaction -> id }}"
                disabled
              >
            </div>

            <div class="form-group">
              <label for="input-cpf">CPF</label>
              <input
                type="text"
                name="cpf"
                class="form-control"
                id="input-cpf"
                value="{{ $transaction -> cpf }}"
                disabled
              >
            </div>

            <label for="input-value">Valor</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">R$</span>
              </div>
              <input
                type="text"
                name="value"
                class="form-control"
                id="input-value"
                value="{{ $transaction -> value }}"
                aria-label="Valor em reais para a transação."
                disabled
              >
            </div>

            <div class="form-group">
              <label for="input-status">Status</label>
              <input
                type="text"
                name="status"
                class="form-control"
                id="input-status"
                value="{{ $transaction -> status }}"
                disabled
              >
            </div>

            <a
              href="/transactions/edit/{{$transaction -> id}}"
              class="btn btn-primary"
            >
              Editar
            </a>

            @elseif (Request::is('*/edit/*'))
            <form action="{{ url('transactions/update') }}/{{ $transaction -> id }}" method="post">
            @csrf
              <div class="form-group">
                <label for="input-transId">ID - Transação</label>
                <input
                  type="text"
                  name="id"
                  class="form-control"
                  id="input-transId"
                  value="{{ $transaction -> id }}"
                  disabled
                >
              </div>

              <div class="form-group">
                <label for="input-userId">ID - Usuário (Criador)</label>
                <input
                  type="text"
                  name="user_id"
                  class="form-control"
                  id="input-userId"
                  value="{{ $transaction -> user_id }}"
                  disabled
                >
              </div>

              <div class="form-group">
                <label for="input-user">Criado por</label>
                <input
                  type="text"
                  name="user"
                  class="form-control"
                  id="input-user"
                  value="{{ $transaction -> user }}"
                  disabled
                >
              </div>

              <div class="form-group">
                <label for="input-cpf">CPF</label>
                <input
                  type="text"
                  name="cpf"
                  class="form-control"
                  id="input-cpf"
                  value="{{ $transaction -> cpf }}"
                >
              </div>

              <label for="input-value">Valor</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">R$</span>
                </div>
                <input
                  type="text"
                  name="value"
                  class="form-control"
                  id="input-value"
                  value="{{ $transaction -> value }}"
                  aria-label="Valor em reais para a transação."
                >
              </div>

              <div class="form-group">
                <label for="select-status">Status</label>
                <select class="form-control" name="status" id="select-status">
                  <option value="Em processamento">Em processamento</option>
                  <option value="Aprovada">Aprovada</option>
                  <option value="Negada">Negada</option>
                </select>
              </div>

              <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>

            @else
            <form action="{{ url('transactions/add') }}" method="post" enctype="multipart/form-data">
            @csrf

              <div class="form-group">
                <label for="input-cpf">CPF</label>
                <input
                  type="text"
                  name="cpf"
                  class="form-control"
                  id="input-cpf"
                >
              </div>

              <label for="input-value">Valor</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">R$</span>
                </div>
                <input
                  type="text"
                  name="value"
                  class="form-control"
                  id="input-value"
                  aria-label="Valor em reais para a transação."
                >
              </div>

              <div class="form-group">
                <label for="input-file">Comprovante</label>
                <input type="file" name="file" class="form-control-file" id="input-file">
              </div>

              <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
