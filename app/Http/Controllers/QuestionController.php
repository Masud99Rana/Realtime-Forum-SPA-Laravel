<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


use App\Model\Question;
// use App\Http\Requests\QuestionRequest;
use App\Http\Resources\QuestionResource;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{



    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //-> without resource
        // return Question::latest()->get();
         
        //-> with resource       
        return QuestionResource::collection(Question::latest()->get());
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //-> way: 01
        //Question::create($request->all());
        //return response('created', Response::HTTP_CREATED);

        //-> way: 02 if want user id automatically insert
        // auth()->user()->question()->create($request->all());
        // return response('created', Response::HTTP_CREATED);

 
        //-> way: 03 it will send the created question
        //$request['slug']= str_slug($request->title); //for slug we are using boot method
        $question = auth()->user()->question()->create($request->all());
        return response(new QuestionResource($question), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {   
        //-> without resource
        // return $question;
        
        //-> With Resource
        return new QuestionResource($question);
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return response('Update', Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        // return response('Deleted', 201);
        return response('null', Response::HTTP_NO_CONTENT);
    }
}
