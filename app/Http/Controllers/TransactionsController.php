<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use Redirect;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function index(){
        $transactions = Transaction::get();

        return view('transactions.list', ['transactions' => $transactions]);
    }

    public function new(){
        return view('transactions.form');
    }

    public function add( Request $request ){
        $transaction = new Transaction;
        $transaction = $transaction -> create( $request -> all() );

        return Redirect::to('/transactions');
    }

    public function edit( $id ) {
      $transaction = Transaction::findOrFail( $id );
      return view('transactions.form', ['transaction' => $transaction]);
    }

    public function update( $id, Request $request ){
      $transaction = new Transaction;
      $transaction = Transaction::findOrFail( $id );
      $transaction -> update( $request -> all() );
      \Session::flash('msg_update', 'Atualizado com sucesso!');
      return Redirect::to('/transactions');
    }

    public function delete( $id ) {
      $transaction = new Transaction;
      $transaction = Transaction::findOrFail( $id );
      $transaction -> delete();
      return Redirect::to('/transactions');
    }
}
