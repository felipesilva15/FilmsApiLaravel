<?php

namespace App\Helpers\Schemas;

/**
 * @OA\Schema(
 *      schema="UserDTO",
 *      required={"name", "email", "password"},
 *      @OA\Property(property="id", type="integer", example=1),
 *      @OA\Property(property="name", type="string", example="Felipe", maxLength=20),
 *      @OA\Property(property="email", type="string", format="email", example="mail@example.com")
 * )
 */
class UserDTO {

}