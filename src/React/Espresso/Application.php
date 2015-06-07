<?php

namespace React\Espresso;

use React\Http\Request;
use React\Http\Response;
use Silex\Application as BaseApplication;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class Application extends BaseApplication
{
    public function __invoke(Request $request, Response $response)
    {
        $sfRequest = SymfonyRequest::create($request->getPath(), $request->getMethod());
        $sfResponse = $this->handle($sfRequest, HttpKernelInterface::MASTER_REQUEST, true);

        $response->writeHead($sfResponse->getStatusCode(), ['Content-Type' => 'text/html']);
        $response->end($sfResponse->getContent());
    }
}
