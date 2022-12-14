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
    public function index(Request $request)
    {
        $list= Todo::where('user_id', $request->id)->get();
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
        $todo->user_id= 1;

        $todo->save();
        return response()->json(['message' => 'Todo Başarıyla Eklendi.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id, $completed)
    {
        $todo= Todo::findOrFail($id);
        $todo->status= $completed == "true" ? 'Tamamlandı' : 'Tamamlanmadı';
        
        $todo->save();
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
        $title = $request->title;
        $content = $request->content;
        $status = $request->status;

        $todo= Todo::findOrFail($request->id);
        if ($title) {
            $todo->title= $request->title;
        }else if ($content) {
            $todo->content= $request->content;
        }else if ($status) {
            $todo->status= $request->status;
        }else {
            $todo->title= $request->title;
            $todo->content= $request->content;
            $todo->status= $request->status;
        }
        
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




