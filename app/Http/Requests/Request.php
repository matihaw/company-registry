<?php

namespace App\Http\Requests;

use Illuminate\Http\Request as BaseRequest;

final class Request extends BaseRequest
{
    public function expectsJson(): true
    {
        return true;
    }

    public function wantsJson(): true
    {
        return true;
    }
}
