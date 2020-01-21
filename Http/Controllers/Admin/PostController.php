<?php
/**
 * @author	 : Vishal Kumar Sinha <vishalsinhadev@gmail.com>
 */
namespace Modules\Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Services\PostService;
use Modules\Blog\Services\CategoryService;
use Modules\Blog\Services\TagService;
use Modules\Blog\Entities\Post;
use Modules\Blog\Http\Requests\PostRequest;
use Modules\Blog\Entities\Tag;

class PostController extends Controller
{

    /**
     *
     * @var PostService
     */
    protected $service;

    protected $CategoryService;

    protected $TagService;

    /**
     * BlockController constructor.
     *
     * @param PostService $service
     */
    public function __construct(PostService $service, CategoryService $categoryService, TagService $tagService)
    {
        $this->service = $service;
        $this->CategoryService = $categoryService;
        $this->TagService = $tagService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $models = $this->service->postList();
        return view('blog::admin.post.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('blog::admin.post.create', [
            'categories' => $this->CategoryService->list(),
            'tags' => $this->TagService->list(),
            'model' => new Post()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(PostRequest $request)
    {
        $ids = [];
        $tags = $request['tags'];
        if (!empty($tags)) {
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                array_push($ids, $tag->id);
            }
        }
        $request->merge([
            'content' => $request->input('html_content')
        ]);
        $post = Post::create($request->all());
        $post->tags()->sync($ids);
        $data = [];
        $data['url'] = route('blog.admin.post.index');
        return response()->json($data);
        //
    }

    /**
     * Show the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('blog::admin.post.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $model = Post::whereId($id)->first();
        $categories = $this->CategoryService->list();
        $tags = $this->TagService->list();
        return view('blog::admin.post.update', compact('model','categories','tags'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(PostRequest $request, $id)
    {
        $model = Post::whereId($id)->first();
        $categories = $model->category();
        $tags = $model->tags();
        $request->merge([
            'content' => $request->input('html_content')
        ]);
        $model->update($request->except([
            '_token'
        ]));
        if ($request->input('tags')) {
            $tags->delete();
            $ids = [];
            foreach ($request->input('tags') as $tag){
                $tag = Tag::firstOrCreate(['name' => $tag]);
                array_push($ids, $tag->id);
            }
            $model->tags()->sync($ids);
        }
        $data = [];
        $data['url'] = route('blog.admin.post.index');
        return response()->json($data);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
