<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected function index()
    {
        $users = User::all();

        return  view("admin.userIndex", compact("users"));
    }

    public function profile($id)
    {
        return view("admin.profile");
    }

    public function updateProfile(Request $request, string $id)
    {

        /* if Click chane profile */
        if ($request->change == "change") {
            $name = $request->name;
            $email = $request->email;
            $image_data = $request->file("image");
            $data_user = User::find($id);
            /* if Change File Do */
            if ($image_data == null) {
                /* If Not Chane File Not chang Any Thing */
                $image_name =  $data_user->image_full_path;
                $image_name_without_anythings =  $data_user->imageName;
                /* ELse Do ... */
            } else {
                /* Frist Delete Old File */
                $oldFilePath =  public_path("upload/$data_user->image_full_path");
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
                /* Create New File And Save In path Db  */
                $image_name = time() . $image_data->getClientOriginalName();
                $location = public_path("upload");
                $image_data->move($location, $image_name);
                $image_name_without_anythings = $image_data->getClientOriginalName();
            }
            /* Updated In DB Table whith ID */
            $user =  User::find($id);
            $user->name  = $name;
            $user->image_full_path  = $image_name;
            $user->imageName  =   $image_name_without_anythings;
            $user->email  =   $email;
            $user->save();
            return redirect()->back()->with("massage", " Updatated User Succssfuly");
        }

        /* If Change Password */
        if ($request->change == "password") {
            $user = User::find($id);


            $hashPassword = Hash::make($request->password);
            if (Hash::check($request->password, $user->password)) {
                $request->validate([
                    "password" => "required|min:8",
                    "newpassword" => "required|min:8|confirmed",
                ]);

                $hashPassword = Hash::make($request->newpassword);
                $user = User::find($id);
                $user->password =     $hashPassword;
                $user->save();
                return redirect()->back()->with("massage" , "Passowrd Changed");

            } else {
                return redirect()->back()->with("error", "Passowrd Is invalid");
            }
        }
    }
}
