<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    public function fetch()
    {
        $contents = Content::all();
        return $this->respondWithSuccess('Successfully fetched content', $contents);
    }
}
