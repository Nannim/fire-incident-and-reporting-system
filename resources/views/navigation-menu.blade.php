<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>
                @csrf

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('reports') }}" :active="request()->routeIs('reports')">
                        {{ __('Reports') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ url('response') }}" :active="request()->routeIs('response')">
                        {{ __('Response') }}
                    </x-jet-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" baseProfile="tiny" overflow="inherit" version="1.2" viewBox="0 0 50 50"><path d="M25.335 24.297s-4.839 3.893-4.839 7.04c0 1.409 2.074 2.817 4.839 2.817 2.763 0 4.837-1.408 4.837-2.817 0-3.26-4.837-7.04-4.837-7.04zm17.641-7.116c.28-3.428 1.274-6.575 3.024-9.459L39.281 1c-2.122 1.828-4.54 2.84-7.28 3.019-2.51.227-4.889-.25-7.126-1.435-2.302 1.146-4.672 1.625-7.143 1.435-2.555-.229-4.862-1.135-6.927-2.741L4.067 7.997c1.657 2.926 2.58 5.987 2.761 9.184.086 1.472-.334 3.497-1.276 6.117a44.656 44.656 0 0 0-1.12 3.764c-.236 1.045-.383 1.895-.431 2.531-.035 2.79.748 5.311 2.353 7.55 1.254 1.635 3.322 3.441 6.194 5.415 3.143 1.6 5.574 2.638 7.277 3.082l1.412.656c.445.212.921.42 1.417.647 1.071.641 1.823 1.337 2.221 2.056.485-.777 1.254-1.456 2.278-2.056a50.198 50.198 0 0 0 1.822-.828l1.066-.476c.364-.181.843-.388 1.419-.616a84.697 84.697 0 0 1 2.16-.821c1.659-.587 2.869-1.143 3.635-1.645 2.786-1.974 4.823-3.75 6.118-5.34 1.663-2.248 2.47-4.779 2.433-7.625-.099-1.274-.638-3.313-1.617-6.09-.933-2.705-1.347-4.805-1.213-6.321zM25.335 36.97c-6.107 0-11.75-5.044-11.75-11.265 0-4.225 3.23-8.216 4.147-9.857l2.764 4.225 4.839-7.04 4.837 7.04 2.768-4.225c.914 1.641 4.147 5.632 4.147 9.857 0 6.221-5.644 11.265-11.752 11.265z"/>
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}

                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" baseProfile="tiny" overflow="inherit" version="1.2" viewBox="0 0 50 50"><path d="M25.335 24.297s-4.839 3.893-4.839 7.04c0 1.409 2.074 2.817 4.839 2.817 2.763 0 4.837-1.408 4.837-2.817 0-3.26-4.837-7.04-4.837-7.04zm17.641-7.116c.28-3.428 1.274-6.575 3.024-9.459L39.281 1c-2.122 1.828-4.54 2.84-7.28 3.019-2.51.227-4.889-.25-7.126-1.435-2.302 1.146-4.672 1.625-7.143 1.435-2.555-.229-4.862-1.135-6.927-2.741L4.067 7.997c1.657 2.926 2.58 5.987 2.761 9.184.086 1.472-.334 3.497-1.276 6.117a44.656 44.656 0 0 0-1.12 3.764c-.236 1.045-.383 1.895-.431 2.531-.035 2.79.748 5.311 2.353 7.55 1.254 1.635 3.322 3.441 6.194 5.415 3.143 1.6 5.574 2.638 7.277 3.082l1.412.656c.445.212.921.42 1.417.647 1.071.641 1.823 1.337 2.221 2.056.485-.777 1.254-1.456 2.278-2.056a50.198 50.198 0 0 0 1.822-.828l1.066-.476c.364-.181.843-.388 1.419-.616a84.697 84.697 0 0 1 2.16-.821c1.659-.587 2.869-1.143 3.635-1.645 2.786-1.974 4.823-3.75 6.118-5.34 1.663-2.248 2.47-4.779 2.433-7.625-.099-1.274-.638-3.313-1.617-6.09-.933-2.705-1.347-4.805-1.213-6.321zM25.335 36.97c-6.107 0-11.75-5.044-11.75-11.265 0-4.225 3.23-8.216 4.147-9.857l2.764 4.225 4.839-7.04 4.837 7.04 2.768-4.225c.914 1.641 4.147 5.632 4.147 9.857 0 6.221-5.644 11.265-11.752 11.265z"/>
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="flex-shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
