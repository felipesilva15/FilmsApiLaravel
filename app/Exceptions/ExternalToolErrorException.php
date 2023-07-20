<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class ExternalToolErrorException extends HttpException
{
    public function __construct(string $message = 'Undefined external tool error.', int $statusCode = 500, \Throwable $previous = null, int $code = 0, array $headers = [])
    {
        parent::__construct($statusCode, $message, $previous, $headers, $code);
    }
}