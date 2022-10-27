<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityFormRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function index()
    {
        return response()
                    ->json(City::with('state')->get());
    }

    public function getCitiesForState($idState)
    {
        return response()
                    ->json(City::where('state_id',$idState)->get());
    }

    public function store(CityFormRequest $request)
    {
        $city = City::create($request->all());
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
        $city = City::with('state')->whereId($id)->get();

        if($city == null) {
            return response()->json(['message' => 'city not found'],404);
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
        $city = City::find($id);

        if($city == null) {
            return response()->json(['message' => 'city not found'],404);
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
        if($city = City::destroy($id)){
            return response()->noContent();
        }else{
            return response()->json(['message' => 'city not found'],404);
        }

    }
}
