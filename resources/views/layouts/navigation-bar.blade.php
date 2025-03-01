<nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container px-5">
        <a class="navbar-brand" href="/"><span class="fw-bolder text-primary">A-SPKR</span></a>
       
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                <!-- Profile Dropdown -->
                <li class="nav-item dropdown">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('Profile') }}
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <form method="POST" action="{{ url('/profile/myinfo') }}">
                                @csrf
                                <x-dropdown-link :href="asset('/profile/myinfo')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('My Info') }}
                                </x-dropdown-link>
                            </form>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </li>
                
                <li class="nav-item">
                    <x-responsive-nav-link :href="route('dashboard')"> {{ __('Dashboard') }} </x-responsive-nav-link>
                </li>
                <li class="nav-item">
                    <x-responsive-nav-link :href="route('recordingslist')"> {{ __('Recordings') }} </x-responsive-nav-link>
                </li>
                <li class="nav-item">
                    <x-responsive-nav-link :href="route('evaluationtest')"> {{ __('Tests') }} </x-responsive-nav-link>
                </li>
                <li class="nav-item">
                    <x-responsive-nav-link :href="route('plans')"> {{ __('My Plan') }} </x-responsive-nav-link>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
