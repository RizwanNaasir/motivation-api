<?php

namespace App\Http\Controllers;

use App\Traits\CanResponseTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, CanResponseTrait;
    public function getTagsFromString(string $string): array
    {
        preg_match_all("/(#\\w+)/", $string, $matches);
        return $matches[0];
    }
    public function getUserNamesFromString(string $string): array
    {
        preg_match_all("/(@\\w+)/", $string, $matches);
        return $matches[0];
    }
}
