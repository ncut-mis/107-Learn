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
    <div>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-10 sm:mt-0">
                使用者擅長領域：
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
