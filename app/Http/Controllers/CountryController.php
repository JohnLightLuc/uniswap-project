<?php

namespace App\Http\Controllers;
use App\Models\Country;

use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        
        return response()->json([
            "status"=> true,
            "data"=> $countries
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
        $country = Country::create($data);

        return response()->json([
            'status' => false,
            'message' => "Country create with success",
            "data"=> $country
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
        $country = Country::find($id);
        if(empty($country)){
            return response()->json([
                'status'=>false,
                'message'=>"Country not fund",
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $country,
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
        $country = Country::find($id);
        if (empty($country)) {
            return response()->json([
                'status' => false,
                'message' => "Country not fund",
            ]);
        }
        $country->update($request->all());

        return response()->json([
            'status' => true,
            "message"=>"Update with success",
            'data' => $country,
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
        $country = Country::find($id);
        if (empty($country)) {
            return response()->json([
                'status' => false,
                'message' => "Country not fund",
            ]);
        }
        $country->delete();

        return response()->json([
            'status' => true,
            'message' => "Country delete with success",
        ]);
    }
}
