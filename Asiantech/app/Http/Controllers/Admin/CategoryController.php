<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Admin\AppLanguage;
use App\Admin\Category;
use App\Admin\CategoryData;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CategoryDatas = new CategoryData();
        $listcategories = Category::with(['CategoryData' => function ($query) {
            $query->where('language_code', '=', AppLanguage::getDefaultLanguage());
        }])->get();

        return view('admin.article.categories', compact('listcategories', 'CategoryDatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $CategoryDatas = new CategoryData();
        $languages = AppLanguage::orderBy('id')->get();
        $listcategories = Category::with(['CategoryData' => function ($query) {
                                        $query->where('language_code', '=', AppLanguage::getDefaultLanguage());
        }])
                                    ->where('parent_id', '=', 0)
                                    ->get();

        return view('admin.article.newcategory', compact('languages', 'listcategories', 'CategoryDatas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $Category = new Category();
        $CategoryData = new CategoryData();
        # Insert into Category
        $Category->parent_id = $request->input('parent_id');
        $Category->user_created = Auth::id();
        // Upload
        $feauture_image = '';
        if (Input::hasFile('feauture_image')) {
            $file = Input::file('feauture_image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $feauture_image = sha1($filename.time()).'.'.$extension;
            $destinationPath = public_path().'/uploads/category/images/';
            Input::file('feauture_image')->move($destinationPath, $feauture_image);
        }
        $Category->feauture_image = $feauture_image;
        $Category->is_active = 1;
        $Category->save();
        # Insert into CategoryData
        $listLanguage = AppLanguage::orderBy('language_name')->get();
        $categoryName = $request->input('category_name');
        $categoryContent = $request->input('category_content');
        foreach ($listLanguage as $language) {
            $CategoryData = new CategoryData();
            $CategoryData->category_name = $categoryName[$language->code];
            $CategoryData->language_code = $language->code;
            $CategoryData->category_blogs_id = $Category->id;
            $CategoryData->category_alias = str_slug($categoryName[$language->code].'-'.$Category->id, '-');
            $CategoryData->category_content = $categoryContent[$language->code];
            $CategoryData->save();
        }

        return redirect()->route('cpanel.category.index');
    }

    /**
     * Disable the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function disable(Request $request)
    {
        $CategoryID = $request->route('category');
        $affectedRows = Category::where('id', $CategoryID)
            ->update(['is_active' => 0]);

        return redirect()->route('cpanel.category.index');
    }

    /**
     * Active the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function active(Request $request)
    {
        $CategoryID = $request->route('category');
        $affectedRows = Category::where('id', $CategoryID)
            ->update(['is_active' => 1]);

        return redirect()->route('cpanel.category.index');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $CategoryID = $request->route('category');
        $categoryData = CategoryData::where('category_blogs_id', '=', $CategoryID)->delete();
        // $categoryData->delete();
        $Category = Category::find($CategoryID);
        $Category->delete();

        return redirect()->route('cpanel.category.index');
    }
}
