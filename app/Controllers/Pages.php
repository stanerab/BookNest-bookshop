<?php

namespace App\Controllers;

use App\Models\NewsModel;

class Pages extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);

        $data = [
            'news_list' => $model->getNews(),
            'title' => '',
        ];

        return view('templates/header', $data)
            . view('pages/navbar')
            . view('pages/home')
            . view('templates/footer');
    }

    public function show(?string $slug = null)
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews($slug);

        if ($data['news'] === null) {
            // throw new PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        return view('templates/header', $data)
            . view('pages/navbar2')
            . view('pages/view')
            . view('templates/footer');
    }

    public function view(string $page = 'home')
    {
        if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            // throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        return view('templates/header', $data)
            . view('pages/navbar')
            . view('pages/' . $page)
            . view('templates/footer');
    }

}