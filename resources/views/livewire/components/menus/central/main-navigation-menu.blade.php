<div class="shadow-2xl shadow-[#1c212c]/50 h-full">
    <aside class="w-full bg-[#1c212c] min-h-full h-screen flex flex-col items-center pt-5 pb-2 space-y-7 ">

        <!-- menu items -->
        <div class="w-full pr-3 flex flex-col gap-y-1 text-gray-500 fill-gray-500 text-sm">
            <div class="font-QuicksandMedium pl-4 text-gray-400/60 text-xs text-[11px] uppercase">Menu</div>
            <x-central.nav-link-icon href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
                                     :hero="'home'">
                {{ __('Dashboard') }}
            </x-central.nav-link-icon>
        </div>
        <div class="w-full pr-3 flex flex-col gap-y-1 text-gray-500 fill-gray-500 text-sm">
            <div class="font-QuicksandMedium pl-4 text-gray-400/60 text-xs text-[11px] uppercase">Profile</div>
            <x-central.nav-link-icon href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')"
                                     :hero="'pencil-square'">
                {{ __('Edit Profile') }}
            </x-central.nav-link-icon>

            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf

                <x-central.nav-link-icon href="{{ route('logout') }}" @click.prevent="$root.submit();" :hero="'arrow-left-start-on-rectangle'">
                    {{ __('Log Out') }}
                </x-central.nav-link-icon>
            </form>
        </div>
    </aside>
</div>
