<?php

namespace App\Http\Controllers;

use App\Models\Quizz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use function PHPSTORM_META\type;

class QuizzController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizz = Quizz::all();
        return view("quizz.index", compact("quizz"));
    }
    public function homeQuizz(Request $request)
    {
        if($request->clear){
            Session::forget("choicesUser");
        }
        $quizz = Quizz::paginate(1);
        return view("homeQuizz.layout", compact("quizz"));
    }
    public function root()
    {

        return view("homeQuizz.login");
    }
    public function loginUser(Request  $request)
    {
        $request->validate([
            "name" => "required|string"
        ]);

        $name = $request->name;
        $user = new User();
        $user->name  = $name;
        $user->save();

        $request->session()->put(['nameUser' => $name, "idUser" => $user->id]);
        return redirect()->route("homeQuizz");
    }
    public function logoutQuizz($id, Request  $request)
    {
        $request->session()->forget('nameUser');
        Session::forget('choicesUser');
        $request->session()->flush();
        $user = User::find($id);
        $user->delete();
        return redirect("/");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("quizz.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $request->validate([
            "question" => 'required|string',
            "right_answer" => 'required|string',
            "a1" => 'required|string',
            "a2" => 'required|string',
            "a3" => 'required|string',
            "a4" => 'required|string',
            "image" => "mimes:jpg,jpeg,png,bmp,tiff,webp|max:4096"
        ]);
        $question = $request->question;
        $right_answer = $request->right_answer;
        $a1 = $request->a1;
        $a2 = $request->a2;
        $a3 = $request->a3;
        $a4 = $request->a4;
        $fileRequest = $request->file("image");
        if (!$fileRequest) {
            $image = null;
        } else {
            $fileRequest = $request->file("image");
            $filename = time() . $fileRequest->getClientOriginalName();
            $location = public_path("quizz");
            $fileRequest->move($location, $filename);
            $image =  $filename;
        }

        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");
        $quizz = new Quizz();
        $quizz->question = $question;
        $quizz->right_answer = $right_answer;
        $quizz->a1 = $a1;
        $quizz->a2 = $a2;
        $quizz->a3 = $a3;
        $quizz->a4 = $a4;
        $quizz->image = $image;
        $quizz->created_at = $created_at;
        $quizz->updated_at = $updated_at;
        $quizz->save();
        return redirect()->back()->with("massage", "Create Sucssesflly");
    }
    public function checkQuizz($id_question, $currentPage, $allPages, Request $request)
    {
        $request->validate([
            "user_answer"=>"required|string"
        ]);
        //user_answer
        $quizz = Quizz::find($id_question);
        /* Save in Session To  */
        $arrayData =
            [
                $quizz->question,
                $quizz->right_answer,
                $quizz->a1,
                $quizz->a2,
                $quizz->a3,
                $quizz->a4,
                $request->user_answer,
            ];
        $have_session_choicesUser = session('choicesUser'); // Returns 'value' or null if not set
/*         Session::forget('choicesUser');
 */


        if ($have_session_choicesUser) {

            $chaneToArray = json_decode($have_session_choicesUser, true, 512, JSON_UNESCAPED_UNICODE);
            array_push($arrayData,...$chaneToArray );

            if (!mb_check_encoding($arrayData, 'UTF-8')) {
                // Convert to UTF-8 if not
                $change_data_to_string = mb_convert_encoding($arrayData, 'UTF-8', 'auto');
            }else{
                $change_data_to_string = json_encode($arrayData);
            }
            Session::put('choicesUser', $change_data_to_string);
        } else {
            if (!mb_check_encoding($arrayData, 'UTF-8')) {
                // Convert to UTF-8 if not
                $change_data_to_string = mb_convert_encoding($arrayData, 'UTF-8', 'auto');
            }else{
                $change_data_to_string = json_encode($arrayData);
            }
            Session::put('choicesUser', $change_data_to_string);

        }
        /* End Save In Session */

        /* If Right Answer */
        if ($request->user_answer == $quizz->right_answer) {

            /* if Finsh Question */
            if ($allPages == $currentPage) {

                return redirect()->route("sucssesQuizz");
            } else {

                return redirect()->route("homeQuizz", ["page" => $currentPage + 1]);
            }
        } else {
            return redirect()->route("errorQuizz", [$currentPage, $allPages]);
        }
    }
    public function sucssesQuizz()
    {

        $have_session_choicesUser = session('choicesUser'); // Returns 'value' or null if not set
        if ($have_session_choicesUser) {
            $have_session_choicesUser = json_decode($have_session_choicesUser, true, 512, JSON_UNESCAPED_UNICODE);
        }
        $countArray = count($have_session_choicesUser);
        $itemArr = 7;
       /*  Session::forget('choicesUser'); */
        return view("homeQuizz.sucssesQuizz", compact("have_session_choicesUser","countArray","itemArr"));
    }
    public function errorQuizz($currentPage, $allPages)
    {

        $currentPages = $currentPage;
        $allPage = $allPages;
        if ($currentPages == $allPage) {
            $currentPages -= 1;
        } elseif ($currentPages == 1) {
            $currentPages -= 1;
        }
        $have_session_choicesUser = session('choicesUser'); // Returns 'value' or null if not set
        if ($have_session_choicesUser) {
            $have_session_choicesUser = json_decode($have_session_choicesUser, true, 512, JSON_UNESCAPED_UNICODE);
        }
        $countArray = count($have_session_choicesUser);
        $itemArr = 7;
        return view("homeQuizz.errorQuizz", compact("currentPages", 'allPage' ,"have_session_choicesUser","countArray","itemArr"));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quizz =  Quizz::find($id);

        return view("quizz.show")->with("quizz", $quizz);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $quizz =  Quizz::find($id);

        return view("quizz.edit")->with("quizz", $quizz);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "question" => 'string',
            "right_answer" => 'string',
            "a1" => 'string',
            "a2" => 'string',
            "a3" => 'string',
            "a4" => 'string',
            "image" => "mimes:jpg,jpeg,png,bmp,tiff,webp|max:4096"
        ]);
        $quizz =  Quizz::find($id);
        $fileRequest = $request->file("image");
        if (!$fileRequest) {
            $image = $quizz->image;
        } else {
            /* Frist Delete Old File */
            $oldFilePath =  public_path("quizz\\$quizz->image");

            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
            $fileRequest = $request->file("image");
            $filename = time() . $fileRequest->getClientOriginalName();
            $location = public_path("quizz");
            $fileRequest->move($location, $filename);
            $image =  $filename;
        }

        $question = $request->question;
        $right_answer = $request->right_answer;
        $a1 = $request->a1;
        $a2 = $request->a2;
        $a3 = $request->a3;
        $a4 = $request->a4;
        $updated_at = date("Y-m-d h:m:s");
        /* $quizz->description =   $description; */
        $quizz->updated_at =   $updated_at;
        $quizz->question =   $question;
        $quizz->right_answer =   $right_answer;
        $quizz->a1 =   $a1;
        $quizz->a2 =   $a2;
        $quizz->a3 =   $a3;
        $quizz->a4 =   $a4;
        $quizz->image =   $image;
        $quizz->update();
        return redirect()->back()->with("massage", " Updatated  Succssfuly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quiz =  Quizz::find($id);
        /* Frist Delete Old File */
        if (!$quiz->image == "") {
            $oldFilePath =  public_path("quizz\\$quiz->image");
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        $quiz->delete();
        return redirect()->back()->with("massage", "Deleted  Sucssefully");
    }
}
