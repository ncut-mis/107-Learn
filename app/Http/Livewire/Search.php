<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class Search extends Component
{
    public $searchTerm;
    public $tit;
    public function render()
    {

        $searchTerm = '%'.$this->searchTerm.'%';
        $this->tit = Question::where('title','LIKE',$searchTerm)->get();
        return view('livewire.search');

//        return view('livewire.search', [
//            'titles' => Question::where('title', $this->tit)->get(),
//        ]);
    }
}
