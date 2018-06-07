<?php
namespace Analyze\Container\Definitions;

use Closure;

class FactoryDefinition extends AbstractDefinition
{
    private $callback;

    public function __construct(Closure $callback)
    {
        $this->callback = $callback;
    }

    public function build()
    {
        // ...
    }
}
