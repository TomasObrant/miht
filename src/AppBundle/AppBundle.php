<?php

namespace AppBundle;

use AppBundle\Command\TestCommand;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->register('app.test_command', TestCommand::class)
            ->addTag('console.command');
    }
}
