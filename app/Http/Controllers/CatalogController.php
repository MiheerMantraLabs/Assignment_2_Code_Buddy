<?php

namespace App\Http\Controllers;

use App\Models\Catelog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    function create_page(Request $request)
    {
        return view('category_create', ['id'=>$request->id,'parent_id'=>$request->parent_id]);
    }
    function edit_page(Request $request)
    {
        return view('category_edit', ['id'=>$request->id,'catalog_name'=>$request->catalog_name]);
    }

    function create(Request $request)
    {
        $validated = $request->validate([
            'catalog_name' => 'required|min:3|max:255',
            'id' => 'required',
            'parent_id' => 'required',
        ]);

        $catelogs = new Catelog();
        $catelogs->catelog_name = $request->catalog_name;
        $catelogs->parent_id = $request->id;
        $catelogs->save();

        return redirect()->route('home');
    }

    function delete(Request $request)
    {
        $catelogs = Catelog::find($request->id)->delete();
        $catelogsMore = Catelog::where('parent_id',$request->id)->delete();
        return redirect()->route('home');
    }

    function edit(Request $request)
    {
        $validated = $request->validate([
            'catalog_name' => 'required|min:3|max:255',
            'id' => 'required',
        ]);

        $catelogs = Catelog::find($request->id);
        $catelogs->catelog_name = $request->catalog_name;
        $catelogs->save();

        return redirect()->route('home');
    }
}
