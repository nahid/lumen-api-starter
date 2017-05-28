<?php
namespace App\Exceptions\Handlers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Exceptions\Transformers\DebugTransformer;
use Symfony\Component\Debug\Exception\FatalThrowableError;

abstract class BaseHandler
{
    /**
     * Request instance.
     *
     * @var \Illuminate\Http\Request
     */
    public $request;

    /**
     * Exception instance.
     *
     * @var \Exception
     */
    public $exception;

    /**
     * Transformer class.
     *
     * @var string
     */
    protected $transformer = '';

    /**
     * Defautl error message.
     *
     * @var string
     */
    protected $message = 'Internal server error';

    /**
     * Default error code.
     *
     * @var integer
     */
    protected $code = 500;

    /**
     * Default HTTP status code.
     *
     * @var integer
     */
    protected $statusCode = 500;

    /**
     * Default response header.
     *
     * @var array
     */
    protected $headers = [];

    /**
     * Default response options.
     *
     * @var integer
     */
    protected $options = 0;

    /**
     * Exception constructor.
     *
     * @param \Illuminate\Http\Request   $request
     * @param \Exception                 $e
     */
    public function __construct(Request $request, Exception $e)
    {
        $this->request = $request;
        $this->exception = $e;
    }

    /**
     * Handle the not found exception.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle()
    {
        if (is_api_request()) {
            return response()->json(
                $this->buildMessage((new $this->transformer)->transform($this->exception)),
                $this->statusCode,
                $this->headers,
                $this->options
            );
        }

        return response(view('error', [
            'message' => $this->message['message'],
            'code' => $this->code]
        ))->setStatusCode($this->statusCode);
    }

    /**
     * Build the message array.
     *
     * @param  array $message
     * @return array
     */
    private function buildMessage($message)
    {
        if (config('api.debug')) {
            $message['debug'] = $this->getTrace();
        }

        return $message;
    }

    /**
     * Get the file and line numbers from the trace items.
     *
     * @return array
     */
    private function getTrace()
    {
        return (new DebugTransformer)->transform($this->exception);
    }
}
