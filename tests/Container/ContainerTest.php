<?php
use PHPUnit\Framework\TestCase;
use Analyze\Container\Container;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Tests\Utilities\FakeClass;
use \Mockery as m;

class ContainerTest extends MockeryTestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testContainerInstanceIsReturned()
    {
        $container = new Container;

        $this->assertInstanceOf(Container::class, $container);
    }

    public function testContainerImplementsPsr11()
    {
        $container = new Container;

        $this->assertInstanceOf(ContainerInterface::class, $container);
    }

    public function testDefinitionsCanBeSet()
    {
        $container = new Container;

        $mock = m::mock('Analyze\Container\Definitions\DefinitionInterface');

        $container->add('classname', $mock);

        $this->assertTrue($container->has('classname'));
    }

    public function testFactoryDefinitionIsSet()
    {
        $container = new Container;

        $container->addFactory('classname', function () {
            return true;
        });

        $this->assertTrue($container->has('classname'));
    }

    public function testFactoryDefinitionIsCalled()
    {
        $container = new Container;

        $container->addFactory('classname', function () {
            return true;
        });

        $this->assertTrue($container->get('classname'));
    }

    public function testFactoryDefinitionAddsArguments()
    {
        $container = new Container;

        $container->addFactory('classname', function (string $name) {
            return $name;
        });

        $this->assertEquals('Bob', $container->withArguments(['Bob'])->get('classname'));
    }

    public function testClassDefinitionIsSet()
    {
        $container = new Container;

        $container->addClass('classname', 'My\Class\Name');

        $this->assertTrue($container->has('classname'));
    }

    public function testClassDefinitionReturnsCorrectInstance()
    {
        $container = new Container;
        $container->addClass('classname', 'stdClass');

        $this->assertInstanceOf(stdClass::class, $container->get('classname'));
    }

    public function testClassDefinitionConstructor()
    {
        $container = new Container;
        $container->addClass('classname', FakeClass::class);

        $test = $container->withArguments(['Bob'])->get('classname');

        $this->assertEquals('Bob', $test->name);
    }

    public function testNamespacedClassDefinitionConstructor()
    {
        $container = new Container;
        $container->addClass('classname', 'Tests\Utilities\FakeClass');

        $test = $container->withArguments(['Bob'])->get('classname');

        $this->assertEquals('Bob', $test->name);
    }

    public function testGetThrowsCorrectException()
    {
        $this->expectException(NotFoundExceptionInterface::class);

        $container = new Container;
        $container->get('nope');
    }
}
