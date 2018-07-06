<?php
namespace Tests\Utilities;

class FakeClass {

    public $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

}