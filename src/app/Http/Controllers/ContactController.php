<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\ContactConfirmRequest;
use App\Models\Contact;
use App\Models\Category;


class ContactController extends Controller
{
    public function confirm(ContactRequest $request)
    {
        $contact = $request->only([
            'last_name',
            'first_name',
            'gender',
            'email',
            'tel-1',
            'tel-2',
            'tel-3',
            'address',
            'building',
            'categories',
            'detail'
        ]);
        
        return view('contact.confirm', compact('contact'));
    }

    public function store(ContactConfirmRequest $request)
    {
        if ($request->has('fix')) {
            return redirect('/')->withInput();
        }

        $category = Category::create([
          'content' => $request->categories  
        ]);

        $contact = Contact::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'tell' => $request->tell,
            'address' => $request->address,
            'building' => $request->building,
            'detail' => $request->detail,
            'category_id' => $category->id
        ]);

        return view('contact.thanks');
    }

    public function redo()
    {
        return redirect('/')->with('validation_error', '入力内容に不備があります。もう一度入力して下さい');
    }
}
