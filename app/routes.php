<?php

declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Http\Response as Response;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use Slim\Views\PhpRenderer;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $renderer = new PhpRenderer('../templates');
        return $renderer->render($response, "index.html.php");
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });

    $app->get('/about', function (Request $request, Response $response) {
        $renderer = new PhpRenderer('../templates');
        return $renderer->render($response, "about.html.php");
    });

    $app->post('/api/heuristics', function (Request $request, Response $response) {
        $params = $request->getParsedBody();

        // TODO

        return $response->withJson($params, 200);
    });
};
