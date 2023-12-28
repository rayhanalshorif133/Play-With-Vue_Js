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

    public function store(Request $request)
    {
        $content = Content::create($request->all());
        return $this->respondWithSuccess('Successfully created content', $content);
    }


    public function destroy($id = null)
    {
        try {
            if($id == null) {
                $contents = Content::all();
                if($contents->count() == 0) return $this->respondWithError('No content to delete', null);
                foreach($contents as $content) {
                    $content->delete();
                }
                return $this->respondWithSuccess('Successfully deleted all content', $contents);
            }else{
                $content = Content::find($id);
                if(!$content) return $this->respondWithError('Content not found', null);
                $content->delete();
                return $this->respondWithSuccess('Successfully deleted content', $content);
            }
        } catch (\Throwable $th) {
            return $this->respondWithError('Failed to delete content', $th->getMessage());
        }
    }
}
