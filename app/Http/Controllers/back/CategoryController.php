<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;

class CategoryController extends Controller
{
    public function index()
    {
      $categories=Category::all();

      return view('back.categories.index',compact('categories'));
    }

    public function switch(Request $request)
    {
      $category=Category::findorFail($request->id);
      $category->status=$request->statu=="true" ? 1 : 0 ;
      $category->save();
    }

    public function create(Request $request)
    {
      $isExist=Category::whereSlug(str_slug($request->category))->first();
      if($isExist)
      {
        toastr()->error($request->category.' adında bir kategori mevcut');
        return redirect()->back();
      }

      $category=new Category;
      $category->name=$request->category;
      $category->slug=str_slug($request->category);
      $category->save();
      toastr()->success('kategori başarıyla oluşturuldu');
      return redirect()->back();
    }

    public function getData(Request $request)
    {
      $category=Category::findorFail($request->id);
      return response()->json($category);
    }

    public function update(Request $request)
    {
      $isSlug=Category::whereSlug(str_slug($request->slug))->whereNotIn('id',[$request->id])->first();
      $isName=Category::whereName($request->category)->whereNotIn('id',[$request->id])->first();
      if($isSlug or $isName)
      {
        toastr()->error($request->category.' adında bir kategori mevcut');
        return redirect()->back();
      }

      $category=Category::find($request->id);
      $category->name=$request->category;
      $category->slug=str_slug($request->slug);
      $category->save();
      toastr()->success('kategori başarıyla güncellendi');
      return redirect()->back();
    }

    public function delete(Request $request)
    {
      $category=Category::findorFail($request->id);
      if($category->id==10)
      {
        toastr()->error($category->name.' kategorisi silinemez');
        return redirect()->back();
      }
      $count=$category->articleCount();
      $defaultCategory=Category::find(10);
      if($category->articleCount()>0)
      {
        Article::where('category_id',$category->id)->update(['category_id'=>10]);
        $category->delete();
        toastr()->success('Kategori başarıyla silindi. Bu kategoriye ait '.$count.' yazı '.$defaultCategory->name.' kategorisine taşındı.');
        return redirect()->back();
      }
      else {
        $category->delete();
        toastr()->success('Kategori başarıyla silindi.');
        return redirect()->back();
      }


    }


}
