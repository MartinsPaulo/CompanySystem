<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Company;
use App\Models\State;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
    * @OA\Get(
    *     tags={"Company"},
    *     path="/api/company",
    *     summary="Show all companys",
    *     @OA\Response(
    *         response=200,
    *         description="Show all states."
    *     )
    * )
    */
    public function index()
    {
        return response()->json(Company::paginate(10));
    }

    /**
    * @OA\Get(
    *     tags={"Company"},
    *     path="/api/company/find/state/{state_id}",
    *     summary="Find state for id",
    * @OA\Parameter(
    *       description="state_id",
    *       in="path",
    *       name="state_id",
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
    public function companyFindForState($state_id)
    {
        $company = Company::with('city','city.state')
                    ->join('cities','companies.city_id', '=' , 'cities.id')
                    ->join('states', 'states.id', '=', 'cities.state_id')
                    ->where('states.id','=',$state_id)
                    ->paginate(10);

        return response()->json($company);
    }

    /**
    * @OA\Get(
    *     tags={"Company"},
    *     path="/api/company/find/city/{city_id}",
    *     summary="Find state for id",
    * @OA\Parameter(
    *       description="city_id",
    *       in="path",
    *       name="city_id",
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
    public function companyFindForCity($city_id)
    {
        $company = Company::with('city','city.state')->where('companies.city_id','=',$city_id)->paginate(10);
        return response()->json($company);
    }

    /**
    * @OA\Get(
    *     tags={"Company"},
    *     path="/api/company/find/name/{name}",
    *     summary="Find state for id",
    * @OA\Parameter(
    *       description="name",
    *       in="path",
    *       name="name",
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
    public function companyFindForName($name)
    {
        $company = Company::where('name', 'like', '%'.$name.'%')->with('city','city.state')->paginate(10);
        return response()->json($company);
    }
}
