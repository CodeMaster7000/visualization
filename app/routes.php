<?php

declare(strict_types=1);

use Chess\Heuristics\EvalFunction;
use Chess\Heuristics\SanHeuristics;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Http\Response as Response;
use Slim\Views\PhpRenderer;

const DATA_FOLDER = __DIR__.'/../resources/data';

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $renderer = new PhpRenderer('../templates');
        return $renderer->render($response, "games.html.php");
    });

    $app->get('/games', function (Request $request, Response $response) {
        $renderer = new PhpRenderer('../templates');
        return $renderer->render($response, "games.html.php");
    });

    $app->get('/openings', function (Request $request, Response $response) {
        $renderer = new PhpRenderer('../templates');
        return $renderer->render($response, "openings.html.php");
    });

    $app->get('/opening/{eco}/{name}', function (Request $request, Response $response, $args) {
        $contents = file_get_contents(DATA_FOLDER.'/openings.json');
        $json = json_decode($contents, true);
        foreach ($json as $opening) {
            $slug = URLify::slug($opening['name']);
            if ($slug === $args['name']) {
                $args['name'] = $opening['name'];
                $args['movetext'] = $opening['movetext'];
            }
        }
        $renderer = new PhpRenderer('../templates');
        
        return $renderer->render($response, "opening.html.php", $args);
    });

    $app->get('/about', function (Request $request, Response $response) {
        $renderer = new PhpRenderer('../templates');
        return $renderer->render($response, "about.html.php");
    });

    $app->get('/api/openings/{letter}', function (Request $request, Response $response, $args) {
        $contents = file_get_contents(DATA_FOLDER.'/openings.json');
        $json = json_decode($contents, true);
        foreach ($json as $opening) {
            if (str_starts_with(strtolower($opening['eco']), $args['letter'])) {
                $opening['slug'] = URLify::slug($opening['name']);
                $openings[] = $opening;
            }
        }
        if (!isset($openings)) {
            return $response->withStatus(204);
        }

        return $response->withJson($openings, 200);
    });

    $app->post('/api/heuristics', function (Request $request, Response $response) {
        $params = $request->getParsedBody();

        // TODO: Parameter validation

        $evalFunction = new EvalFunction();
        $heuristics = new SanHeuristics($params['movetext']);

        $json = [
            'evalNames' => $evalFunction->names(),
            'balance' => $heuristics->getBalance(),
        ];

        return $response->withJson($json, 200);
    });
};
