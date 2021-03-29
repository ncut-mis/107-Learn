
<div>
    <input style="margin-left: 45%;margin-bottom: 10px;" type="text" wire:model="searchTerm" >

    @foreach($tit as $title)
        <div style="position: relative;margin-left: 30%;margin-bottom:20px;width: 40%;height: 250px;border:1px #1a202c solid;border-radius: 10px">
            <div style="margin: 10px;">
                <a href="s">
                    <h3>{{ $title->title }}</h3>
                </a>
                <h4>分類：{{ $title->area }} | 發問人：{{ $title->user }}</h4>
                <div>{{ $title->content }}</div>
            </div>
        </div>
    @endforeach

</div>
