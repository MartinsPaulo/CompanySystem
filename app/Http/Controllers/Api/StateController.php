<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateFormRequest;
use App\Models\State;
use Illuminate\Http\Request;
use DB;

class StateController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(State::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StateFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateFormRequest $request)
    {
        return response()->json(State::create($request->all()),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $state = State::find($id);

        if($state == null) {
            return response()->json(['message' => 'State not found'],404);
        }

        return $state; //return json code 200
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ReqStateFormRequestuest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StateFormRequest $request, $id)
    {
        $state = State::find($id);

        if($state == null) {
            return response()->json(['message' => 'State not found'],404);
        }

        $state->update($request->all());
        return $state;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($state = State::destroy($id)){
            return response()->noContent();
        }else{
            return response()->json(['message' => 'State not found'],404);
        }
        
    }
}
