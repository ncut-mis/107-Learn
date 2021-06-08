<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            {{ __('個人資料頁面') }}/<a style="color: cornflowerblue" href="{{route('home')}}">回網站首頁</a>
        </h2>
    </x-slot>
    <script type="text/javascript">
        function del() {
            var msg = "您真的確定要刪除嗎？";
            if (confirm(msg)===true){
                return true;
            }else{
                return false;
            }
        }
    </script>

{{--    <script>--}}
{{--        var pusher = new Pusher('3dbe93ac3efe1bf6487e', {--}}
{{--            cluster: 'ap3',--}}
{{--            forceTLS: true--}}
{{--        });--}}

{{--        var channel = pusher.subscribe('my-channel');--}}
{{--        channel.bind('my-event', function (data) {--}}
{{--            if ( {{ \App\Models\UserAreas::where('area_id','=',data.area) }} ) {--}}

{{--            }--}}
{{--        };--}}
{{--    </script>--}}

    <div>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-10 sm:mt-0">
                使用者擅長領域：
                @if(\App\Models\UserAreas::where('user_id','=',Auth::id())->get()->isEmpty())
                    <div style="margin: 10px;">您目前還沒有任何擅長領域！請新增以接收問題通知！</div>
                @else
                @foreach(\App\Models\UserAreas::where('user_id','=',Auth::id())->get() as $ua_data)
                    <div style="margin: 10px;">
                        {{ \App\Models\Area::find($ua_data->area_id)->name }}
                        <form action="{{ route('usergood.areas.destroy', $ua_data->id) }}" method="POST" style="display:inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-danger" type="submit" onclick="javascript:return del();">刪除</button>
                        </form>
                    </div>
                @endforeach
                @endif
                新增擅長領域:
                <form action="{{ route('usergood.areas.store') }}" method="post">
                    @method('post')
                    @csrf
                    <select style="display:block " name="area">
                        @foreach(\App\Models\Area::all() as $a_data)
                            @if(\App\Models\UserAreas::where('user_id','=',Auth::id())->where('area_id','=',$a_data->id)->get()->isEmpty())
                                <option>{{ $a_data->name }}</option>
                            @else
                            @endif
                        @endforeach
                    </select>
                    <button style="margin-top: 5px" class="btn btn-sm btn-success" type="submit">新增</button>
                </form>
            </div>
            <x-jet-section-border />
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
