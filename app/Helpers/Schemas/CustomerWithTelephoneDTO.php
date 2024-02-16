<?php

namespace App\Helpers\Schemas;

/**
 * @OA\Schema(
 *      schema="CustomerWithTelephoneDTO",
 *      required={"name", "cpf_cnpj"},
 *      @OA\Property(property="id", type="integer", example=1),
 *      @OA\Property(property="name", type="string", example="Felipe", maxLength=150),
 *      @OA\Property(property="image", type="string", format="binary"),
 *      @OA\Property(property="cpf_cnpj", type="string", example="15985687599", maxLength=14),
 *      @OA\Property(property="created_at", type="string", format="date-time", example="2024-01-30T03:00:00.000000Z"),
 *      @OA\Property(property="updated_at", type="string", format="date-time", example="2024-01-30T03:00:00.000000Z")
 * )
 */
class CustomerWithTelephoneDTO {

}