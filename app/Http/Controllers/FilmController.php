<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends MasterController
{
    public function __construct(Film $model, Request $request) {
        $this->storageFolder = "films";
        $this->uploadField = "cover_image";
        $this->model = $model;
        $this->request = $request;
    }


    /**
     * @OA\Get(
     *      path="/api/film",
     *      tags={"Film"},
     *      summary="List all films",
     *      @OA\Parameter(
     *          name="id",
     *          in="query",
     *          description="Film ID",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Parameter(
     *          name="title",
     *          in="query",
     *          description="Film title",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *          name="cover_image",
     *          in="query",
     *          description="Film cover image name",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="200", 
     *          description="Film list",
     *          @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Film")
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
     *      path="/api/film/{id}",
     *      tags={"Film"},
     *      summary="List an film by ID",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Film ID",
     *         @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response="200", 
     *          description="Film data",
     *          @OA\JsonContent(ref="#/components/schemas/Film")
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
     *      path="/api/film",
     *      tags={"Film"},
     *      summary="Registers an film",
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data for creating a new film",
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(ref="#/components/schemas/Film")
     *          )
     *      ),
     *      @OA\Response(
     *          response="201", 
     *          description="Registered film data",
     *          @OA\JsonContent(ref="#/components/schemas/Film")
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
     *      path="/api/film/{id}",
     *      tags={"Film"},
     *      summary="Update an film",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Film ID",
     *         @OA\Schema(type="integer")
     *      ),
     *      @OA\RequestBody(
     *         required=true,
     *         description="Data for update film",
     *         @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(ref="#/components/schemas/Film")
     *          )
     *      ),
     *      @OA\Response(
     *          response="200", 
     *          description="Updated film data",
     *          @OA\JsonContent(ref="#/components/schemas/Film")
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
     *      path="/api/film/{id}",
     *      tags={"Film"},
     *      summary="Deletes an film",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Film ID",
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
