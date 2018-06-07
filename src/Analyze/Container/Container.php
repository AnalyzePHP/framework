<?php
namespace Analyze\Container;

use Closure;
use Psr\Container\ContainerInterface;
use Analyze\Container\Exceptions\NotFoundException;
use Analyze\Container\Definitions\FactoryDefinition;
use Analyze\Container\Definitions\DefinitionInterface;

class Container implements ContainerInterface
{
    private $definitions = [];

    public function add(string $alias, DefinitionInterface $definition) : void
    {
        $this->definitions[$alias] = $definition;
    }

    public function addFactory(string $alias, Closure $callback) : void
    {
        $this->add($alias, new FactoryDefinition($callback));
    }

    public function get($id)
    {
        if (! $this->has($id)) {
            throw new NotFoundException(sprintf('%s is not defined.', $id));
        }
    }

    public function has($id) : bool
    {
        return array_key_exists($id, $this->definitions);
    }
}
