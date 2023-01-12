<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Jeton;

class JetonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jetons = Jeton::all();
        return response()->json([
            'status'=> true,
            'data'=> $jetons,
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
        $data = $request->all();
        if($request->file('image')){
            $file = Storage::disk('local')->put( 'jetons', $request->file('image'));
            $image_url = asset($file);
            $data['image'] = $image_url;
        }

        $jeton = Jeton::create($data);

        return response()->json([
            'status'=>true,
            'message'=>'Jeton created with success',
            'data'=> $jeton,
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
        $jeton = Jeton::find($id);
        if(empty($jeton)){
            return response()->json([
                'status'=>false,
                'message'=>'Jeton not fund'
            ]);
        }

        return response()->json([
            'status'=>true,
            'data'=> $jeton,
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
        $jeton = Jeton::find($id);
        if (empty($jeton)) {
            return response()->json([
                'status' => false,
                'message' => 'Jeton not fund'
            ]);
        }

        $data = $request->all();
        if ($request->file('image')) {
            $file = Storage::disk('local')->put('jetons', $request->file('image'));
            $image_url = asset($file);
            $data['image'] = $image_url;
        }

        $jeton->update($data);

        return response()->json([
            'status' => true,
            'data' => $jeton,
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
        $jeton = Jeton::find($id);
        if (empty($jeton)) {
            return response()->json([
                'status' => false,
                'message' => 'Jeton not fund'
            ]);
        }

        $jeton->delete();

        return response()->json([
            'status' => true,
            'message' => 'Jeton jeton delete with success'
        ]);

    }
}
