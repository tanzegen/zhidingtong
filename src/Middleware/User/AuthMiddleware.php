<?php
declare(strict_types=1);

namespace Zhidingtong\Middleware\User;


use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface as HttpResponse;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zhidingtong\Utils\Response\User\UserResponse;

/**
 * Restful 用户登录验证中间件
 * Class AuthMiddleware
 * @package Zhidingtong\Middleware\User
 */
class AuthMiddleware implements MiddlewareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var HttpResponse
     */
    protected $response;

    public function __construct(ContainerInterface $container, HttpResponse $response, RequestInterface $request)
    {
        $this->container = $container;
        $this->response = $response;
        $this->request = $request;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // TODO: 这里是演示数据，后续需要做真正的token鉴权
        if ($this->request->input('parse')) {
            return UserResponse::json(UserResponse::not_login);
        }
        return $handler->handle($request);
    }
}