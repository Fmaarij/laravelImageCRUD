<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dbPhoto = Photo::all();
        return view('pages.index',compact('dbPhoto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePhotoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate([
        //     // 'cv' => ["mimes:txt,pdf","max:1000"],
        //     // 'lettre' => ["mimes:txt,pdf","max:1000"],
        //     'src' => ["mimes:png,jpg,jpeg,webp","max:4096"],
        //     // 'prenom' => ["min:3","max:30"],
        //     // 'nom' => ["min:3","max:30"]
        // ]);

        $photo = new Photo;
        Storage::put('public/img/', $request->file('src'));
        $photo->src = $request->file('src')->hashName();
        $photo->save();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dbPhoto = Photo::find($id);
        return view('pages.show',compact('dbPhoto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dbPhoto = Photo::find($id);
        return view('pages.edit',compact('dbPhoto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePhotoRequest  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $photo = Photo::find($id);
        if ($request->file('src') != null){
            Storage::delete('public/img/', $request->src);
            Storage::put('public/img/', $request->file('src'));
            $photo->src = $request->file('src')->hashName();
            $photo->save();
            return redirect()->back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo, $id)
    {
        $photo = Photo::find($id);
        Storage::delete('public/img/'.$photo->src);
        $photo->delete();
        return redirect()->back();
    }

    public function download($id){
        $photo = Photo::find($id);
        Storage::download("public/img/".$photo->src);
        // return redirect('home',compact('photo'));
    }
}
