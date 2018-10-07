<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Http\Response;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof NotFoundHttpException) {
            return (new Response())->notFound();
        } elseif ($e instanceof ModelNotFoundException) {
            return (new Response())->notFound();
        } elseif ($e instanceof MethodNotAllowedException) {
            return (new Response())->notFound();
        } elseif ($e instanceof ValidationException) {
            $messages = $e->validator->errors()->getMessages();
            $messages = array_unique(array_column($messages, 0));
            return (new Response())->unprocessableEntity(implode(' - ', $messages));
        }
    }
}
