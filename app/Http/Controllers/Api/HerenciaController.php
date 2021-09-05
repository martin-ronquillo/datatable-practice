<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HerenciaController extends Controller
{
    protected $name;

    public function __construct() 
    {
        
    }

    public function writeName() {
        return $this->name;
    }
}
