<?php

namespace App\Http\Controllers;

use App\Contact;
use App\News;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $data = News::all();
        return view('home_page')->with('data',$data);
    }
    public function contact()
    {
        return view('contact');
    }
    public function user_profile()
    {
        return view('user_profile');
    }
    // insert news
    public function insert_news(Request $request)
    {
        $file = $request->file('news_photo');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path().'/photos/',$fileName);

        $data = [
            'user_id' => $request->user_id,
            'news_title' => $request->news_title,
            'news_photo' => $fileName,
            'news_content' => $request->news_content
        ];
        News::create($data);
        return back()->with('success', 'News created successfully');
    }
    public function chg_pass(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $id = auth()->user()->id;
        $current_password = $request->current_password;
        $new_password = $request->new_password;
        $confirm_password = $request->confirm_password;


        $data = User::findOrFail($id);
        if (Hash::check($current_password, $data->password)) {
            if (!(strlen($new_password) >= 6 || strlen($confirm_password) >= 6)) {

                return back()->with('passwordShort', 'Password must contain greater than 6');
            } 
            elseif(!($new_password==$confirm_password)) {
                return back()->with('passwordNotMatch', 'New passwords are not match! Try again!');
            }
            else{
                $hash_password = Hash::make($new_password);
                $item = [
                    'password' => $hash_password,
                ];
                User::findOrFail($id)->update($item);
                
                return back()->with('passwordSuccess', 'Password changing was successful!!!');
            }
        } else {
            return back()->with('password', 'Password wrong!');
        }
    }
    public function insert_contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = [
        'name' => $request->name,
        'email' => $request->email,
        'message'=> $request->message,
        ];
        Contact::create($data);
        return back()->with('successContact', 'Successfully send your feedback! We will contact soon');

    }
}
