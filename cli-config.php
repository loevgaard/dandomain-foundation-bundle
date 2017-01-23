<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once 'tests/bootstrap.php';

return ConsoleRunner::createHelperSet($entityManager);