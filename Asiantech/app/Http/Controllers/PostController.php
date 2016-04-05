<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Admin\AppLanguage;
use App\Admin\CategoryData;
use App\Admin\Post;
use App\Admin\PostData;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_data = new CategoryData();
        $app_language = new AppLanguage();
        $list_post = Post::with(['PostData' => function ($query) {
            $query->where('language_code', '=', AppLanguage::getDefaultLanguage());
        }])->get();

        return view('admin.article.posts', compact('list_post', 'category_data', 'app_language'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_data = new CategoryData();
        $select_category = $category_data->selectBoxCategory(0);
        $languages = AppLanguage::orderBy('id')->get();

        return view('admin.article.newpost', compact('languages', 'select_category'));
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
        // Insert into table posts
        $post = new Post();
        $post->category_id = $request->input('category_id');
        $post->is_active = 1;
        $post->author_id = Auth::id();
        // Upload images
        $feauture_image = '';
        if (Input::hasFile('feauture_image')) {
            $file = Input::file('feauture_image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $feauture_image = sha1($filename.time()).'.'.$extension;
            $destination_path = public_path().'/uploads/article/images/';
            Input::file('feauture_image')->move($destination_path, $feauture_image);
        }
        $post->feauture_image = $feauture_image;
        $post->save();
        // Insert into table post_datas
        $list_languages = AppLanguage::orderBy('language_name')->get();
        $post_titles = $request->input('post_title');
        $post_descriptions = $request->input('post_descriptions');
        $post_contents = $request->input('post_contents');
        foreach ($list_languages as $language) {
            $post_data = new PostData();
            $post_data->post_title = $post_titles[$language->code];
            $post_data->post_descriptions = $post_descriptions[$language->code];
            $post_data->post_contents = $post_contents[$language->code];
            $post_data->post_id = $post->id;
            $post_data->post_alias = str_slug($post_titles[$language->code].'-'.$post->id, '-');
            $post_data->language_code = $language->code;
            $post_data->save();
        }

        return redirect()->route('cpanel.post.index');
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
        $post_id = $request->route('post');
        $affected_row = Post::where('id', $post_id)
            ->update(['is_active' => 0]);

        return redirect()->route('cpanel.post.index');
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
        $post_id = $request->route('post');
        $affected_row = Post::where('id', $post_id)
            ->update(['is_active' => 1]);

        return redirect()->route('cpanel.post.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $category_data = new CategoryData();
        $post_data = new PostData();
        $post_id = $request->route('post');
        $info_post = Post::find($post_id);
        $select_category = $category_data->selectBoxCategory(0, '', $info_post->category_id);
        $languages = AppLanguage::orderBy('id')->get();

        return view('admin.article.updatepost', compact('languages', 'post_data', 'post_id', 'select_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function saveUpdate(Request $request)
    {
        //Get oid
        $post_id = $request->input('post_id');
        $post_update = Post::find($post_id);
        // Update data for table posts
        $post_update->category_id = $request->input('category_id');
        $post_update->is_active = $post_update->is_active;
        $post_update->author_id = Auth::id();
        // Upload images
        $feauture_image = '';
        if (Input::hasFile('feauture_image')) {
            $destination_path = public_path().'/uploads/article/images/';
            //Unlink old file
            unlink($destination_path.$post_update->feauture_image);
            //Upload new file
            $file = Input::file('feauture_image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $feauture_image = sha1($filename.time()).'.'.$extension;
            Input::file('feauture_image')->move($destination_path, $feauture_image);
            $post_update->feauture_image = $feauture_image;
        }
        $post_update->save();

        // Update table post_datas
        $list_languages = AppLanguage::orderBy('language_name')->get();
        $post_titles = $request->input('post_title');
        $post_descriptions = $request->input('post_descriptions');
        $post_contents = $request->input('post_contents');
        foreach ($list_languages as $language) {
            $post_data_update = PostData::where('post_id', '=', $post_id)
                                        ->where('language_code', '=', $language->code)
                                        ->first();
            $post_data_update->post_title = $post_titles[$language->code];
            $post_data_update->post_descriptions = $post_descriptions[$language->code];
            $post_data_update->post_contents = $post_contents[$language->code];
            $post_data_update->post_alias = str_slug($post_titles[$language->code].'-'.$post_id, '-');
            $post_data_update->language_code = $language->code;
            $post_data_update->save();
        }

        return redirect()->route('cpanel.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $post_id = $request->route('post');
        $post_data = PostData::where('post_id', '=', $post_id)->delete();
        $post = Post::find($post_id);
        $post->delete();

        return redirect()->route('cpanel.post.index');
    }
}
