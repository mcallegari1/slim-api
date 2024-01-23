<?php
if (PHP_SAPI != 'cli') {
    exit('Rodar via CLI');
}

require __DIR__ . '/vendor/autoload.php';

// Instantiate the app
$settings = require __DIR__ . '/src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
$dependencies = require __DIR__ . '/src/dependencies.php';

$db = $container->get('db');

$schema = $db->schema();
$tabela = 'produtos';

$schema->dropIfExists($tabela);

$schema->create($tabela, function($table) {
    $table->increments('id');
    $table->string('titulo', 100);
    $table->text('descricao');
    $table->decimal('preco', 11, 2);
    $table->string('fabricante', 60);
    $table->timestamps();

});

$db->table($tabela)->insert(array(
    'titulo' => 'Smartphone M50',
    'descricao' => 'Android Oreo 2.4',
    'preco' => 899.00,
    'fabricante' => 'Motorola',
    'created_at' => '2019-10-02',
    'updated_at' => '2019-10-02'
));

$db->table($tabela)->insert(array(
    'titulo' => 'Iphone 11',
    'descricao' => 'Tela 5 polegadas',
    'preco' => 2199.50,
    'fabricante' => 'Apple',
    'created_at' => '2019-02-02',
    'updated_at' => '2019-02-02'
));