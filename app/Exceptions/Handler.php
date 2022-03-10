<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\Rest\Config;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        $config = (object) config_parser(Config::all());
        $content = (object) [
            'title' => 'Error',
            'message' => 'Something went wrong.',
            'causes' => []
        ];
        // start custom code
        $extra = [
            'config' => $config,
            'content' => $content
        ];
        if ($exception instanceof NotFoundHttpException) {
            $extra['content'] = (object) [
                'title' => 'Page Not Found :(',
                'message' => 'Sorry, but the page you are looking for does not exist.',
                'causes' => [
                    'A mistyped address',
                    'An out-of-date link',
                    'Page have been removed',
                    'Had its name changed',
                    'Temporarily unavailable'
                ]
            ];
            return response(view("error.404", $extra), 404);
        }
        return parent::render($request, $exception);
    }
}
