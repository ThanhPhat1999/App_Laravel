<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use PhpParser\Node\Stmt\Switch_;

class AdminMediasController extends Controller
{
    public function index()
    {
        $photos = Photo::all();    

        return view('admin.medias.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.medias.create');
    }

    public function store(Request $request)
    {
        $file = $request->file('file');

        $name = time() . "_" . $file->getClientOriginalName();

        $file->move('images', $name);

        Photo::create(['path'=>$name]);

    }

    public function deleteMedia(Request $request)
    {
        if(isset($request->delete_single))
        {
            $photo = Photo::findOrFail($request->photo_id);

            unlink(public_path() . $photo->path);
    
            $photo->delete();

            return redirect()->back();
        }
        else if (!empty($request->bulkOptions) || !empty($request->checkBoxArray)) {
            $photos = Photo::findOrFail($request->checkBoxArray);

            foreach ($photos as $photo) {

                $bulkOptions = $request->bulkOptions;

                switch ($bulkOptions)
                {
                    case 'delete':
                        unlink(public_path() . $photo->path);
                        $photo->delete();
                        break;
                }
            }
            return redirect()->back();
        }
    }
}
