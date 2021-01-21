@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <a href="{{ url('users') }}">Voltar</a>
        </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            @if (Request::is('*/edit/*'))
            <form action="{{ url('transactions/update') }}/{{ $transaction -> id }}" method="post">
            @csrf
              <div class="form-group">
                <label for="input-user">User</label>
                <input
                  type="text"
                  name="user"
                  class="form-control"
                  id="input-user"
                  value="{{ $transaction -> user }}"
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

              <div class="form-group">
                <label for="input-value">Value</label>
                <input
                  type="text"
                  name="value"
                  class="form-control"
                  id="input-value"
                  value="{{ $transaction -> value }}"
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
                >
              </div>

              <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>

            @else
            <form action="{{ url('transactions/add') }}" method="post">
            @csrf
              <div class="form-group">
                <label for="input-user">User</label>
                <input
                  type="text"
                  name="user"
                  class="form-control"
                  id="input-user"
                >
              </div>

              <div class="form-group">
                <label for="input-cpf">CPF</label>
                <input
                  type="text"
                  name="cpf"
                  class="form-control"
                  id="input-cpf"
                >
              </div>

              <div class="form-group">
                <label for="input-value">Value</label>
                <input
                  type="text"
                  name="value"
                  class="form-control"
                  id="input-value"
                >
              </div>

              <div class="form-group">
                <label for="input-status">Status</label>
                <input
                  type="text"
                  name="status"
                  class="form-control"
                  id="input-status"
                  aria-describedby="statusHelp"
                >
              </div>

              <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
