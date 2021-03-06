<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        //dd($categories);

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:categories|max:255',
            'description'=>'required',
           
        ]);

        $category = new Category([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            
        ]);

        $category->save();

        $message = $category ? 'Categoria agregada exitosamente' : 'La categoria no puedo agregarse';

        return redirect()->route('category.index')->with('message',$message);
    }

 
    public function show($id)
    {
        $category = Category::find($id);
        return $category;
       
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name'=> $request->get('name') ? 'required|unique:categories|max:40': '',
            'description'=> $request->get('description') ? 'required' : '',
            
        ]);

        $category = Category::find($id);
        $request->get('name') ? $category->name =  $request->get('name') : '';
        $request->get('description') ? $category->description =  $request->get('description'): '';
        
        $updated = $category->save();

         
        $message = $updated ? 'Categoría actualizada correctamente!' : 'La Categoría NO pudo actualizarse!';
        
        return redirect()->route('category.index')->with('message', $message);

    }


    public function destroy($id)
    {
        $products = Product::all();
        $category = Category::find($id);

        foreach ($products as $product) {
            if ( $product->category_id == $category->id) {
                $product->category_id = "Sin categoria";
                $product->save();
            }
        }
        
        $deleted = $category->delete();

        $message = $deleted ? 'Categoría eliminada correctamente!' : 'La Categoría NO pudo eliminarse!';
        return redirect()->route('category.index')->with('message', $message);
    }
}
