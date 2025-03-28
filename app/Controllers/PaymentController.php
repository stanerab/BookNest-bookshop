<?php

namespace App\Controllers;

class PaymentController extends BaseController
{
    public function index()
    {
        return view('payment');
    }

    public function pay($id)
    {
        // Optional: Load the book or product info from DB using the ID
        // $model = new \App\Models\BookModel();
        // $book = $model->find($id);
        return view('folder/payment', ['id' => $id]); // No trailing slash here
    }
}

