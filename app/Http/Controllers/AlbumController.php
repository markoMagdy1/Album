<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;


class AlbumController extends Controller
{

    public function index(){
        $albums=Album::get();
        // dd($albums);
        return view('home',compact('albums'));
    }

    public function create_ablum(){
        $albums=Album::get();
        return view('createAlbum',compact('albums'));
    }


    public function add_ablum(Request $request){
        $images_data = [];
        if ($request->hasFile('images')) {
            foreach ($request->images as $img) {
                $path = public_path('images/');
                !is_dir($path) && mkdir($path, 0777, true);

                $imageNames = uniqid() . '.' . $img->extension();
                $img->move($path, $imageNames);
                $images_data[] = $imageNames;
            }
        }
        $all_images = json_encode($images_data);
        $album = Album::create([
            'name'=>$request->name,
            'images'=>$all_images,
        ]);


        return redirect()->route('home')->with('success', 'Album created successfully.');


    }

    public function edit_ablum(Request $request , $id){

        $album = Album::findOrFail($id);
        $album->update(['name' => $request->name]);
        return redirect()->route('home')->with('success', 'Album Updated successfully');

    }
    public function delete_ablum( $id){
        $album = Album::findOrFail($id);
        $album->delete();
        return redirect()->route('albums.index')->with('success', 'Album deleted successfully.');
    }

}
