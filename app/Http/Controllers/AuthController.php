<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * @OA\Post(
     *      path="/api/login",
     *      tags={"Authentication"},
     *      summary="Log in",
     *      @OA\RequestBody(
     *         required=true,
     *         description="Login details",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="email", type="string", example="mail@example.com"),
     *             @OA\Property(property="password", type="string", example="123456")
     *         )
     *     ),
     *     @OA\Response(
     *          response="200", 
     *          description="Token details",
     *          @OA\JsonContent(ref="#/components/schemas/AccessTokenDTO")
     *     ),
     *     @OA\Response(
     *          response="401", 
     *          description="Invalid credentials",
     *          @OA\JsonContent(ref="#/components/schemas/ApiError")
     *     )
     * )
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if ($token = JWTAuth::attempt($credentials)) {
            return $this->respondWithToken($token);
        }
    
        throw new UnauthorizedHttpException("error", "Unauthorized.");
    }

    /**
     * @OA\Get(
     *     path="/api/me",
     *     tags={"Authentication"},
     *     summary="Logged in user data",
     *     @OA\Response(
     *          response="200", 
     *          description="User data",
     *          @OA\JsonContent(ref="#/components/schemas/UserDTO")
     *     ),
     *     @OA\Response(
     *          response="401", 
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/ApiError")
     *     ),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out.']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}