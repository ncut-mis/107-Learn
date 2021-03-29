
<div>
    <input style="margin-left: 45%;margin-bottom: 50px;" type="text" wire:model="searchTerm" >

    @foreach($tit as $title)
        <div style="background-color:#16181b;position: relative;margin-left: 30%;margin-bottom:20px;width: 40%;height: 250px;border:1px #1a202c solid;border-radius: 10px">
            <div style="margin: 10px;">
                <a href="{{ route('question.show',$title->id) }}">
                    <h3 style="color:#ffffff;">{{ $title->title }}</h3>
                </a>
                <h4 style="color:#ffffff;">分類：{{ $title->area }} | 發問人：{{ $title->user }}</h4>
                <h4 style="color:#ffffff;">發布時間：{{ $title->created_at }}</h4>
                <div style="color:#b8daff;">{!! html_entity_decode($title->content)  !!}</div>
            </div>
        </div>
    @endforeach
</div>
