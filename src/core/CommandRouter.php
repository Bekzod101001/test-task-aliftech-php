<?php

namespace app\core;

use app\core\Controller;
use app\exceptions\CommandNotFoundException;

class CommandRouter
{
    public ConsoleArgs $consoleArgs;
    protected array $commands = [];

    public function __construct(ConsoleArgs $consoleArgs)
    {
        $this->consoleArgs = $consoleArgs;
    }

    public function add(string $name, string $controller, $method)
    {
        $controllerClass = new $controller();

        $this->commands[$name] = function() use($controllerClass, $method) {
            return $controllerClass->{$method}($this->consoleArgs);
        };
    }

    /**
     * @throws CommandNotFoundException
     */
    public function handle()
    {
        $callback = $this->commands[$this->consoleArgs->command] ?? false;

        if(!$callback)
        {
            throw new CommandNotFoundException();
        }

        /** @var Controller $controller */

        return $callback();
    }




}