<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Question;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $elements=Area::orderBy('id','ASC')->get();
        $data=['elements'=>$elements];
        $e=Question::orderBy('id','DESC')->get();
        $data2=['e'=>$e];
        return view('index',$data,$data2);
    }
//    public function area($id)
//    {
//        $elements=Area::find($id);
//        dd($elements);
//        $elements=Area::where('id','=',$id)->get();
//        dd($st);
//        $elements=Area::orderBy('id','ASC')->get();
//        $data=['elements'=>$elements];
//        foreach($elements as $element){
//            $w=$element->name;
//            $e=Question::where('area','=',$w)->get();
//            $data2=['e'=>$e];
//            return view('index',$data,$data2);
//        }
//
//        $elements=Area::orderBy('id','ASC')->get();
//        $data=['elements'=>$elements];
//        $e=Question::orderBy('id','DESC')->get();
//        $data2=['e'=>$e];
//        return view('livewire.search',$data,$data2);
//
//    }
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
     * @param  \Illuminate\Http\Request  $request
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
     * @return Response
     */
    public function show($id)
    {
        //
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
