<?php
/**
 * Analyze PHP Framework
 *
 * @link https://github.com/AnalyzePHP/framework
 * @copyright Copyright (C) 2018 Matt Sparks
 * @license MIT <https://github.com/AnalyzePHP/framework/blob/master/LICENSE>
 */
namespace Analyze;

use Analyze\Container\Container;
use Psr\Container\ContainerInterface;

class Application
{
    /**
     * Analyze PHP Framework Version
     * @var string
     */
    const VERSION = '0.0.1-alpha';

    /**
     * Container
     * @var Psr\Container\ContainerInterface
     */
    private $container;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setContainer(new Container);
    }

    /**
     * Get Container
     *
     * @return ContainerInterface
     */
    public function getContainer() : ContainerInterface
    {
        return $this->container;
    }

    /**
     * Get Version
     *
     * @return string
     */
    public function getVersion() : string
    {
        return static::VERSION;
    }

    /**
     * Set Container
     *
     * @param ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container) : void
    {
        $this->container = $container;
    }
}
