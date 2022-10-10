<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getCategory(){
        return response()->json(Category::all(),200);
    }

    public function getCategoryxid($id){
        $category = Category::find($id);
        if(is_null($category)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }
        return response()->json($category::find($id),200);
    }

    public function insertCategory(Request $request){
        $category = Category::create($request->all());
        return response($category,200);

    }
    public function updateCategory(Request $request, $id){
        $category = Category::find($id);
        if(is_null($category)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }
        $category->update($request->all());
        return response($category, 200);

    }
    public function deleteCategory($id){
        $category = Category::find($id);
        if(is_null($category)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }
        $category->delete();
        return response()->json(['Mensaje'=>'Registro eliminado'],200);
    }
}
