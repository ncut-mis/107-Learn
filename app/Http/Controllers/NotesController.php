<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Note;

class NotesController extends Controller
{
    public function store(Request $request, Comment $comment)
    {
//        $comment->notes()->create([
//            'body' => $request->body
//        ]);
//        return back();
        return view('note');
    }
}

