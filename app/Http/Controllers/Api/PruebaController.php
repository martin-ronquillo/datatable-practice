<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PruebaController extends HerenciaController
{
    protected $name = 'martin';

    public function writeName() {
        return $this->name;
    }
}
