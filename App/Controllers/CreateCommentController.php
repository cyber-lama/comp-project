<?php


namespace App\Controllers;
use App\Core\SimpleController;
use App\Services\Request;

class CreateCommentController extends SimpleController
{

    public function getRequest()
    {
        /** @var Request $service */
        $service = app('RequestLoad');
        if (!$service->is_post) {
            return false;
        }
        return $service->post('message');


    }
}