<?php chdir('../'); require 'vendor/autoload.php';
$app = require 'bootstrap/app.php'; 
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->call('key:generate'); echo 'Key generada';
?>