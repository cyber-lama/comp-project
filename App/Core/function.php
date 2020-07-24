<?php

function app(string $serviceName = null)
{
    if($serviceName){
        return \App\App::$instance->getService($serviceName);
    }
    return \App\App::$instance;
}