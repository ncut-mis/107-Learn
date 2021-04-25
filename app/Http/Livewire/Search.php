<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\Comment;
use App\Models\Question;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use function PHPUnit\Framework\isEmpty;

class Search extends Component
{
    public $searchTerm;
    public $tit;
    public $tt;
    public $temp;
    public function render()
    {

            $searchTerm = '%'.$this->searchTerm.'%';
            $this->tit = Question::orderBy('id','DESC')->where('title','LIKE',$searchTerm)->orwhere('content','LIKE',$searchTerm)->get();

            $this->temp=Comment::all();

            return view('livewire.search');

    }
    public function comment(){


    }
}
