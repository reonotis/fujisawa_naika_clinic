<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class SelfPayController extends Controller
{
    public function index(string $type)
    {
        return view('notice.' . $type);
    }

}
