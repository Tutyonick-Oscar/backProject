<?php

namespace App\Exceptions;

use Illuminate\Support\Facades\Auth;
use Route;
use Throwable;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        $this->reportable(function (Throwable $exception) {
            dd($exception);
        });
        $this->renderable( function(NotFoundHttpException $exception){
                return response()->view('errors.notFound',[
                    'exception'=>$exception,
                    'user'=>Auth::user()
                ],404);
        });
        $this->renderable( function(QueryException $exception){
                return response()->view('errors.notFound',[
                    'exception'=>$exception,
                ],500);
        });
    }
}
