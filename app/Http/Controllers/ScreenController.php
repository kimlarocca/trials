<?php

namespace App\Http\Controllers;

use DB;
use App\Post;

class ScreenController extends Controller
{
    public function show($id)
    {
        return view('screen', [
            'id' => $id
        ]);
    }
}
