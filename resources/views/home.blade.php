@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Bem vindo {{ auth()->user()->name }},</h1>
                    <p>Escolha uma das opções abaixo para começar a usar o sistema.</p>
                    <a href="{{ url('transactions') }}">Transações</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
