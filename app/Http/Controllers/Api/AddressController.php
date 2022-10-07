<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressFormRequest;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return response()->json(Address::with('city')->with('state')->get());
    }


    public function store(AddressFormRequest $request)
    {
        $city = Address::create($request->all());
        return response()->json($city,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = Address::with('city')->with('state')->whereId($id)->first();

        if($city == null) {
            return response()->json(['message' => 'Address not found'],404);
        }

        return $city;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ReqcityFormRequestuest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city = Address::with('city')->with('state')->whereId($id)->first();

        if($city == null) {
            return response()->json(['message' => 'Address not found'],404);
        }

        $city->update($request->all());

        return $city;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($city = Address::destroy($id)){
            return response()->noContent();
        }else{
            return response()->json(['message' => 'Address not found'],404);
        }

    }
}
