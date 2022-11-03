<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list= Todo::all();
        return $list;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo= new Todo();
        $todo->title = $request->title;
        $todo->content= $request->content;
        $todo->status= 'Tamamlanmadı';
        $todo->user_id= 2;

        $todo->save();
        return response()->json(['message' => 'Todo Başarıyla Eklendi.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo= Todo::find($id);
        return $todo;
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
        $todo= Todo::findOrFail($request->id);
        $todo->title= $request->title;
        $todo->content= $request->content;
        $todo->status= $request->status;
        

        $todo->save();
        return $todo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo= Todo::destroy($id);
        return response()->json(['message' => 'Silme İşlemi Başarılı']);
    }
}




