<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="API Documentation",
 *      description="API Documentation for the application",
 * )
 */
class AuthController extends Controller
{
    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Post(
     *     path="/api/login",
     *     tags={"Auth"},
     *     summary="Login client",
     *     description="Returns the authenticated client data",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email","password"},
     *             @OA\Property(property="email", type="string", format="email", example="client@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="password"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful login",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="John Doe"),
     *                 @OA\Property(property="email", type="string", format="email", example="client@example.com"),
     *                 @OA\Property(property="created_at", type="string", format="date-time", example="2023-07-13T10:12:34.000000Z"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2023-07-13T10:12:34.000000Z"),
     *             ),
     *             @OA\Property(property="message", type="string", example="User authenticated successfully"),
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
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::guard('client')->attempt($request->only('email', 'password'))) {
            $client = Auth::guard('client')->user();
            // $token = $client->createToken('Personal Access Token')->accessToken;
            return $this->success($client, 'User authenticated successfully', 200);
        }

        return $this->error('Unauthorized', 401);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Post(
     *     path="/api/register",
     *     tags={"Auth"},
     *     summary="Register client",
     *     description="Registers a new client and returns the client data with an access token",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name","email","password","phone"},
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="email", type="string", format="email", example="client@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="password"),
     *             @OA\Property(property="phone", type="string", example="1234567890"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successful registration",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="John Doe"),
     *                 @OA\Property(property="email", type="string", format="email", example="client@example.com"),
     *                 @OA\Property(property="phone", type="string", example="1234567890"),
     *                 @OA\Property(property="created_at", type="string", format="date-time", example="2023-07-13T10:12:34.000000Z"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2023-07-13T10:12:34.000000Z"),
     *             ),
     *             @OA\Property(property="message", type="string", example="User registered successfully"),
     *             @OA\Property(property="status_code", type="integer", example=201),
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation Error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The given data was invalid."),
     *             @OA\Property(property="errors", type="object", example={"email": {"The email field is required."}})
     *         )
     *     )
     * )
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'password' => 'required|string|min:6',
            'phone' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->error($validator->errors(), 400);
        }

        $password = bcrypt($request->password);

        $client = Client::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $password,
        ]);

        //$token = $client->createToken('Personal Access Token')->accessToken;

        return $this->success($client, 'User registered successfully', 201);
    }

    /**
     * Handle a logout request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->user('client')->token()->revoke();
        return response()->json(['message' => 'Successfully logged out'], 200);
    }

    /**
     * Get the authenticated User.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function user(Request $request): JsonResponse
    {
        return response()->json($request->user('client'));
    }

    /**
     * Refresh a token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function refresh(Request $request): JsonResponse
    {
        $request->user('client')->token()->revoke();
        $token = $request->user('client')->createToken('Personal Access Token')->accessToken;
        return response()->json(['token' => $token], 200);
    }
}
