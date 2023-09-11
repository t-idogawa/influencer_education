<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;   
use App\Models\Articles;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    // 管理画面_お知らせ一覧
    public function articlesShowList()
    {
        $query = new Articles();
        $articles = $query->getList();
        foreach($articles as $article){
            $date = Carbon::createFromFormat('Y-m-d H:i:s', $article->posted_date)->format('Y-m-d');
            $article->year = date('Y', strtotime($date));
            $article->month = date('n', strtotime($date));
            $article->day = date('j', strtotime($date));
        }
        $modal_title = "";
        $modal_id = "";

        return view('articles_admin', compact('articles', ['modal_title', 'modal_id']));
    }

    
    // 管理画面_お知らせ変更遷移時（新規登録）
    public function articlesDetailAdminNew()
    {
        $articles = "";
        $id = "";
        $posted_date = "";
        $title = "";
        $article_contents = "";

        return view('articles_detail_admin', compact('articles', ['id', 'posted_date', 'title', 'article_contents']));
    }
    
    // 管理画面_お知らせ変更遷移時（変更）
    public function articlesDetailAdmin()
    {
        $articles = Articles::find($_POST['id']);
        $articles->date = Carbon::createFromFormat('Y-m-d H:i:s', $articles->posted_date)->format('Y-m-d');
        return view('articles_detail_admin', ['articles' => $articles]);
    }
    
    // 管理画面_お知らせ変更登録時
    public function articlesRegist(ArticleRequest $request) {
        $request_id = $request->id;

        // トランザクション開始
        DB::beginTransaction();

        try {
            $query = new Articles();
            if($request_id !== null){
                $query->editArticle($request);
            }else{
                $query->registArticle($request);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }

        return redirect()->route('articles.show.list');
    }

    // 管理画面_お知らせ削除時
    public function articlesDelete()
    {
        $articles = Articles::find($_POST['id']);
        $articles->delete();
        return redirect()->route('articles.show.list');
    }
}
