<?php
/**
 * Analyze PHP Framework
 *
 * @link https://github.com/AnalyzePHP/framework
 * @copyright Copyright (C) 2018 Matt Sparks
 * @license MIT <https://github.com/AnalyzePHP/framework/blob/master/LICENSE>
 */
namespace Analyze\Container\Definitions;

use ReflectionClass;

class ClassDefinition extends AbstractDefinition
{
    private $concrete;

    public function __construct(string $concrete)
    {
        $this->concrete = $concrete;
    }

    public function build()
    {
        if ($this->hasArguments()) {
            $reflection = new ReflectionClass($this->concrete);

            return $reflection->newInstanceArgs($this->arguments);
        }

        return new $this->concrete;
    }
}
