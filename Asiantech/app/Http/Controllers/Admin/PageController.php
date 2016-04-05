<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Admin\AppLanguage;
use App\Admin\StaticPage;
use App\Admin\StaticPageData;
use App\Admin\TemplateBlock;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $app_language = new AppLanguage();
        $list_pages = StaticPage::with(['pageDetails' => function ($query) {
            $query->where('language_code', '=', AppLanguage::getDefaultLanguage());
        }])->get();

        return view('admin.staticpage.index', compact('list_pages', 'app_language'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = AppLanguage::orderBy('id')->get();
        $template_block = new TemplateBlock();
        $option_template = $template_block->selectBoxBlock();

        return view('admin.staticpage.create', compact('languages', 'option_template'));
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
        # Insert into table static_pages
        $page_id = $request->input('page_id');
        $static_page = new StaticPage();
        $page_id = $static_page->saveData($request, $page_id);
        if ($page_id) {
            $static_page_details = new StaticPageData();
            $results = $static_page_details->saveData($request, $page_id);
            if (!$results) {
                return redirect()->route('cpanel.staticpage.index')
                                ->with('status', 'fail')
                                ->with('msg', 'Can not save data.');
            } else {
                return redirect()->route('cpanel.staticpage.index')
                                ->with('status', 'success')
                                ->with('msg', 'Successfully !');
            }
        } else {
            return redirect()->route('cpanel.staticpage.index')
                            ->with('status', 'fail')
                            ->with('msg', 'Can not save data.');
        }
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
        $page_id = $request->route('staticpage');
        $affected_row = StaticPage::where('id', $page_id)
                                    ->update(['is_active' => 0]);

        if ($affected_row) {
            return redirect()->route('cpanel.staticpage.index')
                            ->with('status', 'success')
                            ->with('msg', 'Disable page successfully !');
        } else {
            return redirect()->route('cpanel.staticpage.index')
                            ->with('status', 'fail')
                            ->with('msg', 'Can not disable.');
        }
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
        $page_id = $request->route('staticpage');
        $affected_row = StaticPage::where('id', $page_id)
                                    ->update(['is_active' => 1]);

        if ($affected_row) {
            return redirect()->route('cpanel.staticpage.index')
                            ->with('status', 'success')
                            ->with('msg', 'Active page successfully !');
        } else {
            return redirect()->route('cpanel.staticpage.index')
                            ->with('status', 'fail')
                            ->with('msg', 'Can not active.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $category_data = new CategoryData();
        // $post_data = new PostData();
        $page_id = $request->route('staticpage');
        $static_page = new StaticPage();
        $static_page_datas = new StaticPageData();
        $languages = AppLanguage::orderBy('id')->get();
        $info_page = $static_page->find($page_id);
        $template_block = new TemplateBlock();
        $option_template = $template_block->selectBoxBlock($info_page->properties);

        return view('admin.staticpage.update', compact('languages', 'page_id', 'static_page_datas', 'option_template'));
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
        $page_id = $request->route('staticpage');
        $page_data = StaticPageData::where('static_page_id', '=', $page_id)->delete();
        $page = StaticPage::find($page_id);
        $results = $page->delete();
        if ($results) {
            return redirect()->route('cpanel.staticpage.index')
                            ->with('status', 'success')
                            ->with('msg', 'Successfully !');
        } else {
            return redirect()->route('cpanel.staticpage.index')
                            ->with('status', 'fail')
                            ->with('msg', 'Can not delete.');
        }
    }
}
