<div>
    <input style="margin-left: 45%;margin-bottom: 50px;" type="text" wire:model="searchTerm" placeholder="請輸入標題或內文">

    @foreach($tit as $title)
            <div style="background-color:#16181b;position: relative;margin-left: 1%;">留言</div>
{{--            <div> {{ comment }} </div>--}}
    @endforeach
</div>
