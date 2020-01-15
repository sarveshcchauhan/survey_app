<?php

namespace App\Http\Controllers;

use App\model\Questionare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class QuestionareController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('survey.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
           'title' => 'required|min:5',
            'purpose' => 'required|min:10'
        ]);

        if($validator->fails()){
            return  response()->json([
                'success'=>false,
                'parameters'=> $request->all(),
                'errors'=> $validator->getMessageBag()->toArray()],400);
        }

        //1st Approach
        $data = new Questionare;
        $data->user_id = auth()->user()->id;
        $data->title = $request->title;
        $data->purpose = $request->purpose;
        $data->save();

        //2nd Approach
//        $data = auth()->user()->questionares()->create($data);
        $user_id = $data->id;
        return  response()->json([
            'success' =>true,
            'redirect' => '/questionare/'.$user_id
        ],200);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $survey = Questionare::find($id)->first();

        //Lazy Load
        //Loding relationship data
        $survey->load('questions.answers');
        return view('survey.show',compact('survey'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        //
    }
}
