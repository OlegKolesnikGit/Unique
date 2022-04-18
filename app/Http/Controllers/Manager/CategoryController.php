<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::Paginate(3);
        return view('manager.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('manager.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCategory $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategory $request)
    {
//        $request->validate([
//            'title' => 'required',
//        ]);

        $validated = $request->safe()->only(['title']);

        Category::create($request->all());
//        $request->session()->flash('success', 'Категория успешно создана!');
        return redirect()->route('categories.index')->with('success', 'Категория успешно создана!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
//        dd('stop');

        $category = Category::find($id);
        return view('manager.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\StoreCategory $request
     * @param int $id
     */
    public function update(StoreCategory $request, $id)
    {
        $validated = $request->safe()->only(['title']);

        $category = Category::find($id);
        $category->slug = null;
        $category->update($request->all());

        $request->session()->flash('success', 'Категория успешно изменена!');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*$category = Category::find($id);
        $category->delete();*/
        Category::destroy($id);
        return redirect()->route('categories.index')->with('success', 'Категория успешно удалена!');
    }
}
