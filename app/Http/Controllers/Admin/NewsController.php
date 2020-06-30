<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\CreateRequest;
use App\Http\Requests\Admin\News\UpdateRequest;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    /**
     * 一覧表示 - /admin/news 
     */
    public function index(Request $request)
    {
        $news = News::orderBy('id', 'desc')->paginate();
        return view('admin.news.index', compact('news'));
    }

    /**
     * 登録画面表示 - /admin/create 
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * 登録処理 - /admin/create 
     */
    public function store(CreateRequest $request)
    {
        News::create($request->validated());
        return redirect()->route('admin.news.index')
            ->with('success', '登録が完了しました');
    }

    /**
     * 更新画面表示 - /admin/news/1
     */
    public function edit(News $news)
    {
        return view('admin.news.create', compact('news'));
    }

    /**
     * 更新処理 - /admin/news/1/update
     */
    public function update(UpdateRequest $request, News $news)
    {
        $news->fill($request->validated())->save();
        return redirect()
            ->route('admin.news.index')
            ->with('success', '更新が完了しました');
    }

    /**
     * 削除処理 - /admin/news/1/delete
     */
    public function delete(News $news)
    {
        $news->delete();
        return redirect()
            ->route('admin.news.index')
            ->with('success', '削除が完了しました');
    }
}
