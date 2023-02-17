<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\DescriptionImage;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $request->merge([
            'slug' => $this->make_slug($request)
        ]);
        $article = Article::create($request->all());
        $imagePath = $request->file('image')->store('public/article_images');
        $article->image()->save(Image::make([
            'path' => $imagePath
        ]));

        return redirect(route('admin.articles.index'))->with('success', 'مقاله جدید با موفقیت ساخته شد!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $request->merge([
            'slug' => $this->make_slug($request)
        ]);
        $article->update($request->all());
        if ($request->hasFile('image')) {
            Storage::delete($article->image->path);
            $imagePath = $request->file('image')->store('public/article_images');
            $article->image()->update([
                'path' => $imagePath
            ]);
        }
        return redirect(route('admin.articles.index'))->with('success', "مقاله $article->name با موفقیت ویرایش شد");
    }



    public function uploadImageOnCreate(Request $request) {
        if($request->has("upload")) {
            $imageFile = $request->file("upload");
            $extension = $imageFile->guessClientExtension();
            $imagePath = $imageFile->storeAs("public/article_images", "description_" . sha1(time()) . "." . $extension);
            $url = Storage::url($imagePath);
            echo json_encode([
                'default' => $url,
                '500' => $url
            ]);
        }
    }

    public function uploadImageOnUpdate(Request $request, Article $article) {
        if($request->has("upload")) {
            $imageFile = $request->file("upload");
            $extension = $imageFile->guessClientExtension();
            $imagePath = $imageFile->storeAs("public/article_images", "description_" . sha1(time()) . "." . $extension);
            $article->descriptionImages()->save(DescriptionImage::make(["path"=>$imagePath]));
            $url = Storage::url($imagePath);
            echo json_encode([
                'default' => $url,
                '500' => $url
            ]);
        }
    }

    public function deleteImage(Request $request) {
        $descriptionImage = DescriptionImage::findOrFail($request->id);
        $descriptionImage->descriptionImageable()->dissociate();
        $descriptionImage->delete();
        return redirect()->back()->with("success", "عکس توضیحات با موفقیت حذف شد!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article_title = $article->name;
        $article->delete();
        return redirect(route('admin.articles.index'))->with('success', "مقاله $article_title با موفقیت حذف شد.");
    }
}
