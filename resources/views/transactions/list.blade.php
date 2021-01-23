@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <a href="{{ url('/') }}">Dashboard</a>
          <a style="padding: 1rem" href="{{ url('transactions/new') }}">Nova Transação</a>
        </div>

        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif

          <h1>Transações</h1>



          <table class="table table-bordered">
            <tbody>
              @foreach( $transactions as $transaction )
              <tr>
                <td colspan="2" class="align-middle">
                  R$ {{ $transaction -> value }} -
                  {{ $transaction -> status }} - {{ $transaction -> created_at }}
                </td>
                <td>
                  <div class="dropdown" style="display: flex; justify-content: center;">
                    <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      ...
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a
                          href="transactions/view/{{ $transaction -> id }}"
                          class="dropdown-item"
                        >
                          Ver
                      </a>
                      <a
                          href="transactions/edit/{{ $transaction -> id }}"
                          class="dropdown-item"
                        >
                          Editar
                      </a>
                      <form action="transactions/delete/{{ $transaction -> id }}" method="post">
                        @csrf
                        @method('delete')
                          <button class="dropdown-item">Excluir</button>
                      </form>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
