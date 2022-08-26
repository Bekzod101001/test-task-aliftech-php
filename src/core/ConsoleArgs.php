<?php

namespace app\core;

use app\exceptions\CommandNotDefinedException;
use app\exceptions\CommandNotFoundException;

class ConsoleArgs
{
    public array $allArgs = [];
    public bool $withoutArgs;

    public string $command;
    private string $scriptName;

    public function __construct()
    {
        $this->allArgs = $_SERVER['argv'];
        $this->scriptName = $this->allArgs[0];

        if($this->scriptName === 'migrations.php') {
            return;
        }

        $this->command = $this->allArgs[1] ?? false;

        if(!$this->command){
            throw new CommandNotDefinedException();
        }

        $this->withoutArgs = count($this->allArgs) < 1;

        $this->args = array_values(
            array_filter($this->allArgs, function($key) {
                // arg with 0 key is script name, arg with 1 key is command, so we are skipping them
                return $key > 1;
            }, ARRAY_FILTER_USE_KEY)
        );

    }
}