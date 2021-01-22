<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use Redirect;
use Illuminate\Http\Request;

class TransactionsController extends Controller {
  public function index(){
    $transactions = Transaction::where('user_id', auth()->user()->id)->get();

    return view('transactions.list', ['transactions' => $transactions]);
  }

  public function new(){
    return view('transactions.form');
  }

  public function add( Request $request ){
    // $request->validate([
    //   'file' => 'required|mimes:pdf,jpg,png|max:2048'
    // ]);
    $transaction = new Transaction;

    // if($request->file()) {
    //   $fileName = time().'_'.$request->file->getClientOriginalName();
    //   $filePath = $request->file('file')->store('uploads', $fileName, 'public');

    //   $transaction->file_name = time().'_'.$request->file->getClientOriginalName();
    //   $transaction->file_path = '/storage/' . $filePath;
    // }

    // $content = $request->file;
    // Storage::put($fileName, $content->output());

    $request->request->add(['user_id' => auth()->user()->id]);
    $request->request->add(['user' => auth()->user()->name]);

    $transaction = $transaction -> create( $request -> all() );

    return Redirect::to('/transactions');
  }

  public function view( $id ) {
    $transaction = Transaction::findOrFail( $id );
    return view('transactions.form', ['transaction' => $transaction]);
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
