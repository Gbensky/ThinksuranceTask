<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Codeception\Exception\ModuleException;

class Acceptance extends \Codeception\Module
{
    /**
     * Get current url from WebDriver
     * @return mixed
     * @throws ModuleException
     */
    public function getCurrentUrl()
    {
        return $this->getModule('WebDriver')->_getCurrentUri();
    }
}
