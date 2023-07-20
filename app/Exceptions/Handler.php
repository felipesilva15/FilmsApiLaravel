<?php

namespace App\Exceptions;

use Exception;
use Faker\Core\Number;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if($e instanceof HttpException){
            return response()->json(["error" => $e->getMessage()], $e->getStatusCode());
        }

        return parent::render($request, $e);
    }

    private function getExceptionsForCustomMessage(): Array 
    {
        return [
            'UnauthorizedHttpException'
        ];
    }
}
