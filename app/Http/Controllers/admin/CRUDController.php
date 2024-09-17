<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CRUDController extends Controller
{
    public function index()
    {
        return view('admin.crud');
    }

    public function loadAllUsers()
    { //loadAllUsers buat manggil di route
        $all_users = User::all();
        return view('admin.crud', compact('all_users')); //admin.crud = file di admin
    }
    public function loadAllUserForm()
    {
        return view('admin.add-user');
    }
    public function AddUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'usertype' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);
        try {
            //register user
            $new_user = new User;
            $new_user->name = $request->name;
            $new_user->email = $request->email;
            $new_user->usertype = $request->usertype;
            $new_user->password = Hash::make($request->password);
            $new_user->save();

            return redirect('admin/crud')->with('success', 'user berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect('admin/add/user')->with('fail', $e->getMessage());
        }
    }

    public function EditUser(Request $request)
    {
        $request->validate([
            //vaidate user disini bang
            'name' => 'required',
            'email' => 'required|email',
            'usertype' => 'required',
        ]);
        try {
            // update user disini yaaa
            $update_user = User::where('id', $request->user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'usertype' => $request->usertype,
            ]);

            return redirect('admin/crud')->with('success', 'User berhasil di update');
        } catch (\Exception $e) {
            return redirect('admin/edit/user')->with('fail', $e->getMessage());
        }
    }


    public function loadEditForm($id)
    {
        $user = User::find($id);

        return view('admin.edit-user', compact('user'));
    }

    public function deleteUser($id)
    {
        try {
            User::where('id', $id)->delete();
            return redirect('admin/crud')->with('success', 'User berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('admin/crud')->with('fail', $e->getMessage());
        }
    }
}
