<div>
    <input style="margin-left: 45%;margin-bottom: 50px;" type="text" wire:model="searchTerm" placeholder="請輸入標題或內文">

    @foreach($tit as $title)
        <div style="background-color:#16181b;position: relative;margin-left: 30%;margin-bottom:20px;width: 40%;height: auto;border:1px #1a202c solid;border-radius: 10px">
            <div style="margin: 10px;">
                <a href="{{ route('question.show',$title->id) }}">
                    <h3 style="color:#ffffff;">{{ $title->title }}</h3>
                </a>
                <h4 style="color:#ffffff;">分類：{{ $title->area }} | 發問人：{{ $title->user }}</h4>
                <h4 style="color:#ffffff;">發布時間：{{ $title->created_at }}</h4>
{{--                <div style="color:#b8daff;">{{ $title->content }}</div>--}}

                <div class="test" style="color:#b8daff;">{!! html_entity_decode($title->content)  !!}</div>


            </div>
            <div style="background-color:#16181b;position: relative;margin-left: 1%;">留言</div>
        @foreach($temp as $t)
                @if($title->id==$t->question_id)
                    <div style="color:#c69500;">{{ \App\Models\User::find($t->user_id)->name }}：{{ $t->content }}</div>
                @endif
            @endforeach
            @if (Route::has('login'))
                @auth
            <form method="post" enctype="multipart/form-data" action="{{ route('comments.store',$title->id) }}" role="form">
                @method('post')
                @csrf
            <div><input placeholder="在此說點什麼.." autocomplete="off" style="" type="text" name="content">　<button type="submit">送出</button></div>
            </form>
                @endauth
            @endif
        </div>
    @endforeach
</div>
