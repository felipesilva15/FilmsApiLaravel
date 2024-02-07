<?php

namespace App\Http\Controllers;

use App\Exceptions\MasterNotFoundHttpException;
use App\Models\Telephone;
use Illuminate\Http\Request;

class TelephoneController extends MasterController
{
    public function __construct(Telephone $model, Request $request) {
        $this->storageFolder = "";
        $this->uploadField = "";
        $this->model = $model;
        $this->request = $request;
    }

    public function customer($id) {
        $data = $this->model::with('customer')->find($id);

        if (!$data) {
            throw new MasterNotFoundHttpException;
        }

        return response()->json($data, 200);
    }

    /**
     * @OA\Get(
     *      path="/api/telephone",
     *      tags={"Telephone"},
     *      summary="List all telephones",
     *      @OA\Parameter(
     *          name="id",
     *          in="query",
     *          description="Telephone ID",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Parameter(
     *          name="number",
     *          in="query",
     *          description="Telephone number",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *          name="customer_id",
     *          in="query",
     *          description="Telephone Customer ID",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response="200", 
     *          description="Telephone list",
     *          @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Telephone")
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
     *      path="/api/telephone/{id}",
     *      tags={"Telephone"},
     *      summary="List an telephone by ID",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Telephone ID",
     *         @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response="200", 
     *          description="Telephone data",
     *          @OA\JsonContent(ref="#/components/schemas/Telephone")
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
     *      path="/api/telephone",
     *      tags={"Telephone"},
     *      summary="Registers an telephone",
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data for creating a new telephone",
     *          @OA\JsonContent(ref="#/components/schemas/Telephone")
     *      ),
     *      @OA\Response(
     *          response="201", 
     *          description="Registered telephone data",
     *          @OA\JsonContent(ref="#/components/schemas/Telephone")
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
     *      path="/api/telephone/{id}",
     *      tags={"Telephone"},
     *      summary="Update an telephone",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Telephone ID",
     *         @OA\Schema(type="integer")
     *      ),
     *      @OA\RequestBody(
     *         required=true,
     *         description="Data for update telephone",
     *         @OA\JsonContent(ref="#/components/schemas/Telephone")
     *      ),
     *      @OA\Response(
     *          response="200", 
     *          description="Updated telephone data",
     *          @OA\JsonContent(ref="#/components/schemas/Telephone")
     *      ),
     *      @OA\Response(
     *          response="401", 
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/ApiError")
     *      ),
     *      @OA\Response(
     *          response="404", 
     *          description="RRecord not found",
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
     *      path="/api/telephone/{id}",
     *      tags={"Telephone"},
     *      summary="Deletes an telephone",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Telephone ID",
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
