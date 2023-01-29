<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function getInfo()
    {
        return fake()->text(1000);
    }

    public function showInfo()
    {
        return \view('info.show', ['text' => $this->getInfo()]);
    }
}
