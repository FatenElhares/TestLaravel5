<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Competences;

class HelloworldController extends Controller
{

    public $message;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->message = "Hey, you've made a hello world controller view in Laravel 5 ;)";
    }

    /**
     * Show the helloworld page.
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function helloMetho(Request $request)
    {

        return view('helloworld', [
            'message' => $this->message
        ]);
    }

  public function  index(Request $request){

    $Competences = Competences::all();
    $result = [];

        $newNiveau = new Competences;
    $newNiveau::Create(9,9,988,9,9,14);


    foreach ($Competences as $each) {
        $result[] = $each;
    }
        return response()->json(["message"=> $result],200);
    }
}
