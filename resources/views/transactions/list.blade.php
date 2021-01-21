@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"><a href="{{ url('transactions/new') }}">Nova Transação</a></div>

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
                <td colspan="2">
                  {{ $transaction -> value }} -
                  {{ $transaction -> status }}
                </td>
                <td>
                  <a
                    href="transactions/edit/{{ $transaction -> id }}"
                    class="btn btn-info"
                  >
                    Editar
                  </a>
                </td>
                <td>
                  <form action="transactions/delete/{{ $transaction -> id }}" method="post">
                  @csrf
                  @method('delete')
                    <button class="btn btn-danger">Deletar</button>
                  </form>
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
