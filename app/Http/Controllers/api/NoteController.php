<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Notes;
use App\Http\Resources\Notes as NoteResource;
class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get retrive all product records
        $notes = Notes::all();
        return new NoteResource($notes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create a new product record
        $notes = new Notes();
        //$notes->id = $request->input('id');
        $notes->title = $request->input('title');
        $notes->description = $request->input('description');
        $notes->user_id = auth()->id();
        $notes->save();
        return new NoteResource($notes);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get specific product record by id
        $notes = Notes::findOrFail($id);
        if($notes->user_id == auth()->id())
            return new NoteResource($notes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $notes = Notes::findOrFail($id);
        //$notes->id = $request->input('id');
        if($notes->user_id==auth()->id()){
            $notes->title = $request->input('title');
            $notes->description = $request->input('description');
            $notes->save();
            return new NoteResource($notes);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete a specific product record by id
        $notes = Notes::findOrFail($id);
        if($notes->user_id==auth()->id()){
            if($notes->delete()){
                return new NoteResource($notes);
            }
        }
    }
}
