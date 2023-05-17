<?php

namespace App\Lib\Cqrs;

use ReflectionClass;


class CommandBus
{
    public function handle($command)
    {
        // resolve handler
        $reflection = new ReflectionClass($command);
        
        $handlerName = str_replace("Command", "Handler", $reflection->getShortName());
        $handlerName = str_replace($reflection->getShortName(), $handlerName, $reflection->getName());
        $handler = app()->make($handlerName);
        // invoke handler
        $handler($command);
    }
}
