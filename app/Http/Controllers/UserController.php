<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends MasterController
{
    public function __construct(User $model, Request $request) {
        $this->storageFolder = "users";
        $this->model = $model;
        $this->request = $request;
    }

    /**
     * @OA\Get(
     *      path="/api/user",
     *      tags={"User"},
     *      summary="List all users",
     *      @OA\Parameter(
     *          name="id",
     *          in="query",
     *          description="User ID",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Parameter(
     *          name="name",
     *          in="query",
     *          description="User name",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *          name="email",
     *          in="query",
     *          description="User email",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="200", 
     *          description="User list",
     *          @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/User")
     *         )
     *      ),
     *      @OA\Response(
     *          response="401", 
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/ApiError")
     *      ),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function index(Request $request) {
        return parent::index($request);
    }

    /**
     * @OA\Get(
     *      path="/api/user/{id}",
     *      tags={"User"},
     *      summary="List an user by ID",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="User ID",
     *         @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response="200", 
     *          description="User data",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *      ),
     *      @OA\Response(
     *          response="401", 
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/ApiError")
     *      ),
     *      @OA\Response(
     *          response="404", 
     *          description="Record not found",
     *          @OA\JsonContent(ref="#/components/schemas/ApiError")
     *      ),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function show($id) {
        return parent::show($id);
    }

    /**
     * @OA\Post(
     *      path="/api/user",
     *      tags={"User"},
     *      summary="Registers an user",
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data for creating a new user",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *      ),
     *      @OA\Response(
     *          response="201", 
     *          description="Registered user data",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *      ),
     *      @OA\Response(
     *          response="401", 
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/ApiError")
     *      ),
     *      security={{"bearerAuth":{}}}
     * )
     */
    public function store(Request $request) {
        return parent::store($request);
    }

    /**
     * @OA\Put(
     *      path="/api/user/{id}",
     *      tags={"User"},
     *      summary="Update an user",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="User ID",
     *         @OA\Schema(type="integer")
     *      ),
     *      @OA\RequestBody(
     *         required=true,
     *         description="Data for update user",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *      ),
     *      @OA\Response(
     *          response="200", 
     *          description="Updated user data",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *      ),
     *      @OA\Response(
     *          response="401", 
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/ApiError")
     *      ),
     *      @OA\Response(
     *          response="404", 
     *          description="Record not found",
     *          @OA\JsonContent(ref="#/components/schemas/ApiError")
     *      ),
     *      security={{"bearerAuth":{}}}
     * )
     */
    public function update(Request $request, $id) {
        return parent::update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/api/user/{id}",
     *      tags={"User"},
     *      summary="Deletes an user",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="User ID",
     *         @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response="200", 
     *          description="Return message",
     *          @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Registro deletado com sucesso!")
     *         )
     *      ),
     *      @OA\Response(
     *          response="401", 
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/ApiError")
     *      ),
     *      @OA\Response(
     *          response="404", 
     *          description="Record not found",
     *          @OA\JsonContent(ref="#/components/schemas/ApiError")
     *      ),
     *      security={{"bearerAuth":{}}}
     * )
     */
    public function destroy( $id) {
        return parent::destroy($id);
    }
}
