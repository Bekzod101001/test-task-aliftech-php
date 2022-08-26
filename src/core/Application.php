<?php

namespace app\core;

class Application
{

    public static string $ROOT_PATH;
    public Database $database;
    public CommandRouter $commandRouter;
    public ConsoleArgs $consoleArgs;
    public static array $config;

    public static Application $app;

    public function __construct(string $rootPath)
    {
        self::$app = $this;
        self::$ROOT_PATH = $rootPath;
        self::$config = [
            "db" => [
                "host" => $_ENV["DB_HOST"],
                "name" => $_ENV["DB_NAME"],
                "port" => $_ENV["DB_PORT"],
                "user" => $_ENV["DB_USER"],
                "password" => $_ENV["DB_PASSWORD"]
            ]
        ];

        $this->database = new Database();
        $this->consoleArgs = new ConsoleArgs();
        $this->commandRouter = new CommandRouter($this->consoleArgs);

    }

    public function run(): void
    {
        $this->commandRouter->handle();
    }


}