<?php

namespace App\Http\Controllers;

use App\Models\Memes;
use Illuminate\Http\Request;

class MemesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memes = Memes::all();
        return view('memes.indexMemes', compact('memes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('memes.createMemes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',


        ]);

        $memes = new Memes();

        // $memes->image = $request->image;


         if(isset($request->image)){
            $image = $request->image;
           $imageName = time() . '.' . $image->getClientOriginalExtension();
           $image->move( 'images', $imageName );
           $memes->image = $imageName;
         }
         $memes->title = $request->title;
         $memes->user_id = auth()->user()->id;

         $memes->save();
         return back()->with('success', 'Meme created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Memes  $memes
     * @return \Illuminate\Http\Response
     */
    public function show(Memes $memes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Memes  $memes
     * @return \Illuminate\Http\Response
     */
    public function edit(Memes $memes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Memes  $memes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Memes $memes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Memes  $memes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Memes $memes)
    {
        //
    }


    public function downloadImage(Request $request, $id)
    {
        $image = Memes::findOrFail($id);

        $imagePath =('images/' . $image->image); // Chemin complet de l'image dans le système de fichiers

            // dd($imagePath);
        return response()->download($imagePath); // Télécharger l'image
    }
}
