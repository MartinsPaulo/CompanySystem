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
    * @OA\Get(
    *     tags={"State"},
    *     path="/api/states",
    *     summary="Show all states",
    *     @OA\Response(
    *         response=200,
    *         description="Show all states."
    *     )
    * )
    */
    public function index()
    {
        return response()->json(State::all());
    }

    /**
     * @OA\Post(
     * path="/api/states",
     * summary="State registration",
     * operationId="states.store",
     * tags={"State"},
     * @OA\RequestBody(
     *    required=true,
     *    description="State data",
     *    @OA\JsonContent(
     *       required={"name","abbreviation"},
     *       @OA\Property(property="name", type="string", format="name", example="São Paulo"),
     *       @OA\Property(property="abbreviation", type="string", format="CC", example="SP"),
     *    ),
     * ),
     * @OA\Response(
     *    response=201,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(property="states", type="object")
     *        )
     *     )
     * )
     */
    public function store(StateFormRequest $request)
    {
        return response()->json(State::create($request->all()),201);
    }

    /**
    * @OA\Get(
    *     tags={"State"},
    *     path="/api/states/{id}",
    *     summary="Find state for id",
    * @OA\Parameter(
    *       description="id",
    *       in="path",
    *       name="id",
    *       required=true,
    *       example="1",
    * ),
    *     @OA\Response(
    *         response=200,
     *           description="Success",
     *           @OA\JsonContent(
     *              @OA\Property(property="state", type="object")
     *          )
    *     ),
    *     @OA\Response(
    *         response=404,
    *         description="State not found"
    *     )
    *   )
    * )
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
     * @OA\Put(
     * path="/api/states",
     * summary="State update for id",
     * operationId="states.update",
     * tags={"State"},
     * @OA\RequestBody(
     *    required=true,
     *    description="State data",
     *    @OA\JsonContent(
     *       required={"name","abbreviation"},
     *       @OA\Property(property="name", type="string", format="name", example="São Paulo"),
     *       @OA\Property(property="abbreviation", type="string", format="CC", example="SP"),
     *    ),
     * ),
    * @OA\Parameter(
    *       description="id",
    *       in="path",
    *       name="id",
    *       required=true,
    *       example="1",
    * ),
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(property="states", type="object")
     *        )
     *     ),
     * @OA\Response(
     *    response=404,
     *    description="State not found"
     *   )
     * )
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
    * @OA\Delete(
    *     tags={"State"},
    *     path="/api/states",
    *     summary="Delete state for id",
    *     operationId="states.delete",
    * @OA\Parameter(
    *       description="id",
    *       in="path",
    *       name="id",
    *       required=true,
    *       example="1",
    * ),
    *     @OA\Response(
    *         response=404,
    *         description="State not found"
    *     )
    *   )
    * )
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
