<?php

namespace App\Http\Controllers;

use App\Contact;
use App\News;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function admin_home()
    {
        return view('admin.home');
    }

    public function admin_contact()
    {
        $data = Contact::all();
        return view('admin.contact')->with('data', $data);
    }

    public function admin_premium()
    {
        $data = User::all();
        return view('admin.premium')->with('data', $data);
    }

    public function admin_user()
    {
        $data = User::all();
        return view('admin.user_accounts')->with('data', $data);
    }
    public function admin_user_delete($id)
    {
        User::findOrFail($id)->delete();
        return back();
    }
    public function admin_user_create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = [
            'name' => $request->name,
            'email'=> $request->email,
            'password'=>Hash::make($request->password),
        ];
        User::create($data);
        return back()->with('successNewAcc', 'You have successfully created new User Account!!');
    }
    public function admin_user_edit($id)
    {
        $data = User::findOrFail($id);
        return view('admin.user_accountsEdit')->with('data', $data);
    }

    public function admin_user_editId(Request $request)
    {
        $id = $request->id;
        $data = [
            'name' => $request->name,
            'email'=> $request->email,
        ];
        User::findOrFail($id)->update($data);
        return redirect('admin_user')->with('updateSuccess', 'You have successfully edited user account!!');
    }

    public function admin_premiumDelete($id)
    {
        User::findOrFail($id)->delete();
        return back();
    }

    public function admin_premiumCreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isPremium' => 1,
        ];
        User::create($data);
        return back()->with('successAddNewAccount', 'You have successfully added new premium user account!!');
    }

    public function admin_premiumEdit($id)
    {
        $data = User::findOrFail($id);
        return view('admin.premiumEdit')->with('data', $data);
    }

    public function admin_premiumEditID(Request $request)
    {
        $id = $request->id;
        $data = [
            'name' => $request->name,
            'email'=> $request->email,
        ];
        User::findOrFail($id)->update($data);
        return redirect('admin_premium')->with('updateSuccess', 'You have successfully edited premium user account!!');
    }

// Admin contact
        public function admin_contact_delete($id)  
    {
            Contact::findOrFail($id)->delete();
            return back();
    }
}
