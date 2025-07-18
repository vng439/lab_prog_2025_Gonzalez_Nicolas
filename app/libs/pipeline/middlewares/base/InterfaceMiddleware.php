<?php

namespace app\libs\pipeline\middlewares\base;

use app\libs\http\Request;
use app\libs\http\Response;

interface InterfaceMiddleware{

 public function process(Request $request, Response $response): void;

 public function setNext(InterfaceMiddleware $next): void;

 public function processNext(Request $request, Response $response): void;
}