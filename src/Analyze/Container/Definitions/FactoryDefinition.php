<?php
/**
 * Analyze PHP Framework
 *
 * @link https://github.com/AnalyzePHP/framework
 * @copyright Copyright (C) 2018 Matt Sparks
 * @license MIT <https://github.com/AnalyzePHP/framework/blob/master/LICENSE>
 */
namespace Analyze\Container\Definitions;

use Closure;

class FactoryDefinition extends AbstractDefinition
{
    /**
     * Callback
     * @var Closure
     */
    private $callback;

    /**
     * Constructor
     *
     * @param Closure $callback
     */
    public function __construct(Closure $callback)
    {
        $this->callback = $callback;
    }

    /**
     * Build
     *
     * @return object
     */
    public function build()
    {
        return call_user_func_array($this->callback, $this->arguments);
    }
}
