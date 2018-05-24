<?php
use PHPUnit\Framework\TestCase;
use Analyze\Application;

class ApplicationTest extends TestCase
{
    public function testApplicationInstanceIsReturned()
    {
        $app = new Application;

        $this->assertInstanceOf(Application::class, $app);
    }
}
