<div>
    <input style="margin-left: 35%;margin-bottom: 50px;width: 30%;font-size:18px;" type="text" wire:model="searchTerm" placeholder="請輸入標題或內文">

    @foreach($tit as $title)
        <div style="background-color:#63B0A1;position: relative;margin-left: 5%;margin-bottom:20px;width: 70%;height: auto;border:1px #1a202c solid;border-radius: 10px">
            <div style="margin: 10px;">
                <div class="container"><div class="item-left"><h1 style="color:#FFFFFF;font-size:30px;">{{ $title->title }}</h1></div>
                @if (Route::has('login'))
                    @auth
                        @if($title->user != Auth::user()->name)
                            <div class="item-right"align="right">
                                <a href="{{ route('chatrooms.solver.index',$title->id) }}">
                                    <button class="btn-opencr" type="submit" style="width: 200px;height: 50px;">開啟討論室</button>
                                </a>
                            </div>
                        @endif
                        @if($title->user == Auth::user()->name)
                            <div class="item-right"align="right">
                                <a href="{{ route('chatrooms.list.index',$title->id) }}">
                                    <button class="btn-crlist" type="submit" style="width: 250px;height: 50px;">開啟討論室列表</button>
                                </a>
                            </div>
                        @endif
                    @endauth
                @endif</div>
                <h4 style="color:#FFFFFF;font-size:25px;">分類：{{ $title->area }} | 發問人：{{ $title->user }}</h4>
                <h4 style="color:#FFFFFF;font-size:25px;">發布時間：{{ $title->created_at }}</h4>

                <div style="color:#2F649D;">{!! html_entity_decode($title->content)  !!}</div>
                <style>p{font-size:22px;}</style>
            </div>
            <div style="background-color:#63B0A1;position: relative;font-size:20px;">留言</div>
        @foreach($temp as $t)
                @if($title->id==$t->question_id)
                    <div style="color:#F2EDAB;margin-left: 3%;font-size:20px;" >{{ \App\Models\User::find($t->user_id)->name }}：{{ $t->content }}</div>
                @endif
        @endforeach
            @if (Route::has('login'))
                @auth
                    <form method="post" enctype="multipart/form-data" action="{{ route('comments.store',$title->id) }}" role="form">
                        @method('post')
                        @csrf
                        <div>
                            </br>
                        </div>
                        <div class="container2">
                            <div class="item-left2" style="font-size:18px;"><input placeholder="在此說點什麼.." autocomplete="off" style="" type="text" name="content"></div>
                                <div class="item-right2"><button class="btn-send" type="submit">送出</button></div>
                        </div>
                        <div>
                            </br>
                        </div>
                    </form>
                @endauth
            @endif
        </div>
    @endforeach


</div>
