<?php

namespace App\Http\Controllers;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\BookModel;

class BookController extends BaseController{
    public function index(){
        $data = BookModel::all();
        return response($data);
    }

    public function show($id){
        $data = BookModel::where('id', $id)->get();

        if(count($data) > 0){
            return response ($data);
        }else{
            return response('Book not found');
        }
    }

    public function store(Request $request){
        $data = new BookModel;

        if($request->input('title')){
            $data->title = $request->input('title');
        }else{
            return response('Title can´t be blank');
        }

        if($request->input('author')){
            $data->author = $request->input('author');
        }else{
            return response('Author can´t be blank');
        }
        
        if($request->input('description')){
            $data->description = $request->input('description');
        }else{
            return response('Description can´t be blank');
        }
        
        $data->save();

        return response('Successful insert');
    }

    public function update(Request $request, $id){
        $data = BookModel::where('id',$id)->first();

        if($request->input('title')){
            $data->title = $request->input('title');
        }else{
            return response('Title can´t be blank');
        }

        if($request->input('author')){
            $data->author = $request->input('author');
        }else{
            return response('Author can´t be blank');
        }

        if($request->input('description')){
            $data->description = $request->input('description');
        }else{
            return response('Description can´t be blank');
        }

        $data->save();
    
        return response('Successful update');
    }

    public function destroy($id){
        $data = BookModel::where('id',$id)->first();
        $data->delete();

        return response('Successful delete');
    }
}