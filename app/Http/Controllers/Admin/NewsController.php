<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repository\NewsRepository;
use App\Tools\Tools;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $newses= $this->newsRepository->selectAll();

            //dd(array_column($newses,'name'));



              //dd($newses->name = str_limit($newses['1']['name'], 20));
//            $newses->name = str_limit($newses['1']['name'], 7);

            return view('admin.news.index', compact('newses'));

        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'error');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createshow(){

        return view('admin.news.create_form');

    }

    public function create(Request $request)
    {
        try {
            /** 获取资源 */

            if ($request->isMethod('get')) {
                return view('admin.news.create_form');
            }

            $newsypreview = Tools::fileMove($request, 'preview', 'news-preview');

            if (!$newsypreview) {
                throw new \Exception('新闻图片上传失败,请重试');
            }

            Tools::tailoringImages($newsypreview->filePath,1370,636);

            $imagePath = Tools::uploadQiniu($newsypreview->filePath,time().$newsypreview->fileName,'news-preview');



            $news = $this->newsRepository->create([
//                'preview' => '/' . $newsypreview->filePath,
                'preview' =>$imagePath,
                'name' => $request->get('name'),
                'intro' => $request->get('intro'),

            ]);

            if (!$news) {
                throw new \Exception('创建失败,服务器内部错误,请重试');
            }

//            return Tools::notifyTo("成功添加了新闻 [{$news->name}]");
            return $this->index(Tools::notifyTo("成功添加了新闻 [{$news->name}]"));


        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'danger');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Request $request,$id)
    {
        try {
            /** 获取资源 */
            $data = $request->all();

//            dd($data);

            $newsypreview = Tools::fileMove($request, 'preview', 'news-preview');

            if ($newsypreview) {

                Tools::tailoringImages($newsypreview->filePath,1370,636);

                $imagePath = '/' . $newsypreview->filePath;

                if (!$imagePath) {
                    throw new \Exception('图片上传失败');
                }

                $data['preview'] = $imagePath;
            }

            unset($data['_token']);

            $news = $this->newsRepository->update($id,$data);




            if (!$news) {
                throw new \Exception('修改失败,服务器内部错误,请重试');
            }

            return Tools::notifyTo("修改成功了新闻 ");


        } catch (\Exception $exception) {
            return Tools::notifyTo($exception->getMessage(), 'danger');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->newsRepository->destroy($id);
        return Tools::notifyTo('删除成功');
    }
}
