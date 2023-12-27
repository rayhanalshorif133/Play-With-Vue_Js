<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    public function fetch($id = null)
    {
        if ($id) {
            $content = Content::find($id);
            return $this->respondWithSuccess('Successfully fetched content', $content);
        } else {
            $contents = Content::all();
            return $this->respondWithSuccess('Successfully fetched content', $contents);
        }
    }


    public function destroy($id)
    {
        $content = Content::find($id);
        $content->delete();
        return $this->respondWithSuccess('Successfully deleted content', $content);
    }
}
