<?php

namespace App\Middleware;

use App\Controller\AppController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;

class CheckLoginAdminMiddleware  extends AppController implements MiddlewareInterface
{
    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ): ResponseInterface
    {
        $response = $handler->handle($request);
        $session=$this->request->getSession();
        $id_admin=$session->read('id_admin');
        if(!isset($id_admin)){
            return $this->redirect('/admin/login');
        }

        return $response;
    }
}
