<?php

namespace App\Http\Controllers;

use App\Models\Wallet;

use Illuminate\Http\Request;

class WalletController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallets = Wallet::all();
        return response()->json([
            'status'=> true,
            'data'=> $wallets,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $wallet = Wallet::create($request->all());

        return response()->json([
            'status'=>true,
            'message'=>'Wallet created with success.',
            'data'=> $wallet,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wallet = Wallet::find($id);
        if(empty($wallet)){
            return response()->json([
                'status'=>false,
                'message'=>'Wallet not fund'
            ]);
        }

        return response()->json([
            'status'=>true,
            'data'=> $wallet,
        ]);
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
        $wallet = Wallet::find($id);
        if (empty($wallet)) {
            return response()->json([
                'status' => false,
                'message' => 'Wallet not fund'
            ]);
        }

        $wallet->update($request->all());

        return response()->json([
            'status' => true,
            'data' => $wallet,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wallet = Wallet::find($id);
        if (empty($wallet)) {
            return response()->json([
                'status' => false,
                'message' => 'Wallet not fund'
            ]);
        }

        $wallet->delete();

        return response()->json([
            'status' => true,
            'message' => 'Wallet delete with success'
        ]);

    }
}
