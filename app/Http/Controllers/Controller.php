<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

defined('HOSTNAME') or define('HOSTNAME',env('APP_URL').':'.env('APP_PORT'));
defined('APIVERSION') or define('APIVERSION',env('API_VERSION'));
defined("BUSINESS") or define("BUSINESS",1);
defined("INFLUENCER") or define("INFLUENCER",2);
defined("ADMIN") or define("ADMIN",3);
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
