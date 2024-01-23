<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Produto;

/**
 * ORM -> Object Relational Mapper
 */
$app->group('/api/v1', function() {

    $this->get('/produtos/list', function($request, $response) {

        $produtos = Produto::get();
        return $response->withJson($produtos);
    });

    $this->post('/produtos/add', function(Request $request, Response $response) {

        $dados = $request->getParsedBody();
        $produto = Produto::create($dados);
        return $response->withJson($produto);
    });

    $this->get('/produtos/list/{id}', function($request, $response, $args) {

        // print_r($args);

        $produto = Produto::findOrFail($args['id']);
        return $response->withJson($produto);
    });

    $this->put('/produtos/update/{id}', function($request, $response, $args) {

        $dados = $request->getParsedBody();

        $produto = Produto::findOrFail($args['id']);
        $produto->update($dados);
        return $response->withJson($produto);
    });

    $this->get('/produtos/remove/{id}', function($request, $response, $args) {

        $produto = Produto::findOrFail($args['id']);
        $produto->delete();
        return $response->withJson($produto);
    });

});