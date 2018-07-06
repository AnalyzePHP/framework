<?php
/**
 * Analyze PHP Framework
 *
 * @link https://github.com/AnalyzePHP/framework
 * @copyright Copyright (C) 2018 Matt Sparks
 * @license MIT <https://github.com/AnalyzePHP/framework/blob/master/LICENSE>
 */
namespace Analyze\Container\Definitions;

abstract class AbstractDefinition implements DefinitionInterface
{
    public $arguments = [];

    public function addArguments(array $args) : void
    {
        $this->arguments = $args;
    }

    public function hasArguments() : bool
    {
        return count($this->arguments) > 0;
    }
}
