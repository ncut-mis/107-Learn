<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Question;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $elements=Area::orderBy('id','DESC')->get();
        $data=['elements'=>$elements];
        return view('question',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return Response
//     */
    public function store(Request $request)
    {

        Question::create(
            [
                'title'=>$request['title'],
                'area'=>$request['area'],
                'content'=>$request['editor'],
                'status'=>'1',
                'user'=>Auth::user()->name,
            ]
        );
//        dd($request);
        return redirect()->route('home');
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return Response
//     */
    public function show($id)
    {
        $ments=Question::where('id','=',$id)->get();
        $dat=['ments'=>$ments];
        return view('readquestion',$dat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
