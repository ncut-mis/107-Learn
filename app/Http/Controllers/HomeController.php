<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Comment;
use App\Models\Question;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $areas_id
     * @return Application|Factory|View|Response
     */
    public function index()
    {
            $data=Area::orderBy('id','ASC')->get();
            $data2=Question::orderBy('id','DESC')->get();
            $tg=Comment::all();
            return view('index',compact('data','data2','tg'));
    }
    public function areas($id)
    {
        $data=Area::orderBy('id','ASC')->get();

        $data2=Question::orderBy('id','DESC')->where('area','=',Area::find($id)->name)->get();
        $tg=Comment::all();
        return view('index',compact('data','data2','tg'));

    }
    public function solver()
    {
        $data=Area::orderBy('id','ASC')->get();
        $data2=Question::orderBy('id','DESC')->where('user','=',Auth::user()->name)->get();

        $tg=Comment::all();
        return view('index',compact('data','data2','tg'));

    }
    public function asker()
    {
        $data=Area::orderBy('id','ASC')->get();

        $data2=Question::orderBy('id','DESC')->where('user','=',Auth::user()->name)->get();

        $tg=Comment::all();
        return view('index',compact('data','data2','tg'));

    }

    public function areas_solver($id,$id2)
    {
        $data=Area::orderBy('id','ASC')->get();


        $data2=Question::orderBy('id','DESC')->where('area','=',Area::find($id)->name)->get();
        $tg=Comment::all();
        return view('index',compact('data','data2','tg'));

    }
    public function areas_asker($id,$id2)
    {
        $data=Area::orderBy('id','ASC')->get();


        $data2=Question::orderBy('id','DESC')->where('user','=',Auth::user()->name)->where('area','=',Area::find($id2)->name)->get();
        $tg=Comment::all();
        return view('index',compact('data','data2','tg'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function show($id)
    {

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
     * @param Request $request
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
