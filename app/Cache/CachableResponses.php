<?php

namespace App\Cache;

class CachableResponses
{
    public $response, $fileName, $minutes;

    public function __construct($response, $fileName, $minutes)
    {
        $this->response = $response;
        $this->fileName = $fileName;
        $this->minutes = $minutes;
    }

    public function cache()
    {
        return \Cache::remember($this->fileName, $this->minutes, function () {
            return $this->response;
        });
    }
}
