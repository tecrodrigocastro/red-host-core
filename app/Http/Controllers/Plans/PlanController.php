<?php

namespace App\Http\Controllers\Plans;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     schema="Plan",
 *     type="object",
 *     title="Plan",
 *     properties={
 *         @OA\Property(property="id", type="integer", example=1),
 *         @OA\Property(property="name", type="string", example="Basic Plan"),
 *         @OA\Property(property="description", type="string", example="This is a basic plan"),
 *         @OA\Property(property="price", type="number", format="float", example=9.99),
 *         @OA\Property(property="created_at", type="string", format="date-time", example="2023-07-13T10:12:34.000000Z"),
 *         @OA\Property(property="updated_at", type="string", format="date-time", example="2023-07-13T10:12:34.000000Z"),
 *     }
 * )
 */
class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    /**
     * @OA\Get(
     *     path="/api/plans",
     *     tags={"Plans"},
     *     summary="Get list of plans",
     *     description="Returns a list of plans",
     *     @OA\Response(
     *         response=200,
     *         description="Successful retrieval",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Plan")),
     *             @OA\Property(property="message", type="string", example="Plans retrieved successfully"),
     *             @OA\Property(property="status_code", type="integer", example=200),
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthorized"),
     *             @OA\Property(property="status_code", type="integer", example=401),
     *         )
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        $plans = Plan::all();

        return $this->success($plans, 'Plans retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        //
    }
}
