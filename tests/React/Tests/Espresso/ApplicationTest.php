<?php

namespace React\Tests\Espresso;

use React\Espresso\Application;
use React\Http\Request;
use React\Http\Response;

class ApplicationTest extends \PHPUnit_Framework_TestCase
{
    public function testApplicationWithGetRequest()
    {
        $app = new Application();

        $app->get('/', function () {
            return('Hello World');
        });

        $conn = $this->getMock('React\Socket\ConnectionInterface');
        $conn
            ->expects($this->at(3))
            ->method('write')
            ->with($this->stringContains('text/html'));
        $conn
            ->expects($this->at(4))
            ->method('write')
            ->with($this->stringContains('Hello World'));

        $request = new Request('GET', '/');
        $response = new Response($conn);

        $app($request, $response);
    }
}
