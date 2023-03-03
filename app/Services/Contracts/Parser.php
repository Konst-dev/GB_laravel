<?php

namespace App\Services\Contracts;

interface Parser
{
    public function setLink(string $link);
    public function getParseData();
}
