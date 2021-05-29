<?php declare(strict_types = 1);

namespace SimplePi\Http;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * Http Response class to handle response
 */
class HttpResponse {

    protected $response;
    protected $content;

    /**
     * Initialize the response object
     */
    public function __construct() {
        $this->response = new Response(
            'Content',
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );
    }

    /**
     * Response for plain text content
     */
    public function html($content,$statusCode = 200) {
        $this->response->setContent($content);
        $this->response->setStatusCode($statusCode);
        $this->response->send();
    }

    /**
     * Response for json content
     */
    public function json($content,$statusCode = 200) {
        $this->response = new JsonResponse($content, $statusCode);
        $this->response->setStatusCode($statusCode);
        $this->response->send();
    }

}