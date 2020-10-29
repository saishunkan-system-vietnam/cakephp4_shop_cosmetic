<?php

namespace App\Middleware;

use App\Controller\AppController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;

class CheckLoginAdminMiddleware  extends AppController implements MiddlewareInterface
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Authen');
    }

    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ): ResponseInterface
    {
        if($this->Authen->guard('Admin')->check() == false){
            return $this->redirect('/admin/login');
        }
        $response = $handler->handle($request);
        return $response;
    }
}
