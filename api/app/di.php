<?php
declare(strict_types=1);

use Smpl\Mydi\Container;
use Smpl\Mydi\Provider\Autowire;

$providers = [];
$providers[] = Autowire::withoutCache();

return new Container(...$providers);
