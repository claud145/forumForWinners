<?php

namespace conference\Http\Controllers;

use Illuminate\Http\Request;

use conference\Http\Requests;
use conference\Sector;
use Auth;
use conference\Transaction;
use conference\Http\Requests\TransactionCreateRequest;


class TransactionController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectors = Sector::where('state','=','enable')->pluck('name', 'id');
        $sectorsDetail = Sector::where('state','=','enable')->get();
        return view('transactions.index', compact('sectors','sectorsDetail'));
    }

    public function transaction_finish()
    {
      return view('transactions.finish');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //  TransactionCreateRequest
    public function store(TransactionCreateRequest $request)
    {
        $sector = Sector::find($request->input('sector'));
        $userAuth = Auth::user()->id;
        if ($request->ajax()) {
          if ($request->input('payment_type') == 'multipago') {
            $transactionUser = Transaction::create($request->all());
              $transactionUser->payment_type = $request->input('payment_type');
            $transactionUser->save();
            return response()->json([
              "mensaje" => $request->all(),
              "mensajes" => 'La compra fue realizada'
            ]);
          }else{
            $transactionUser = Transaction::create($request->all());
              $transactionUser->payment_type = $request->input('payment_type');
            $transactionUser->save();
            return response()->json([
              "mensaje" => $request->all(),
              "mensajes" => 'La compra fue realizada',
            ]);
          }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
