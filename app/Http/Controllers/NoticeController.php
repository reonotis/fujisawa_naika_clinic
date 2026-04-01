<?php

namespace App\Http\Controllers;

class NoticeController extends Controller
{
    public function index(string $type)
    {
        return view('notice.' . $type);
    }
}
