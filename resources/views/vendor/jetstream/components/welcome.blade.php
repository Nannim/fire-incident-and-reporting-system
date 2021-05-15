<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div>

    <div class="mt-8 text-2xl">
        Welcome to The Fire and Incident Management System
    </div>

    <div class="mt-6 text-gray-500">
        The Fire and Incident Manangement System is used to broadcast ans monitor resposes to incidents regarding fires and fire emergencies.
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('reports') }}">Reports</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                This system provides a situation where the first eye witness can reach the first responder instantly.
            </div>

            <a href="{{ route('reports') }}">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>Create a New Report</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 23a2 2 0 0 0 2-2H10A2 2 0 0 0 12 23zM4 19H20a1 1 0 0 0 .707-1.707L19 15.586V10a7.006 7.006 0 0 0-6-6.92V2a1 1 0 0 0-2 0V3.08A7.006 7.006 0 0 0 5 10v5.586L3.293 17.293A1 1 0 0 0 4 19zm2.707-2.293A1 1 0 0 0 7 16V10a5 5 0 0 1 10 0v6a1 1 0 0 0 .293.707l.293.293H6.414z"/></svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                <a href="{{ route('reports') }}">
                    My Alerts</a>
            </div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Here you can find every notification you recieve, beginning with the latest, pleas
            </div>

            <a href="{{ route('reports') }}">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>See My Alerts</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Creators</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                We the creators of this system send our warmest regards.
            </div>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-l">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
                <defs><linearGradient id="a" x1="7.388" x2="24.835" y1="5.933" y2="6.188" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#96369f"/><stop offset="1" stop-color="#01b3ed"/></linearGradient><linearGradient id="b" x1="7.212" x2="24.659" y1="17.93" y2="18.185" xlink:href="#a"/></defs><path fill="url(#a)" d="M18,6a6,6,0,1,0-6,6A6.006,6.006,0,0,0,18,6Zm-6,4a4,4,0,1,1,4-4A4,4,0,0,1,12,10Z"/><path fill="url(#b)" d="M3.051,18.446a9.944,9.944,0,0,0,17.845,0,1.006,1.006,0,0,0,0-.892,9.944,9.944,0,0,0-17.845,0A1,1,0,0,0,3.051,18.446ZM12,14a7.9,7.9,0,0,1,6.866,4A7.938,7.938,0,0,1,5.081,18,7.948,7.948,0,0,1,12,14Z"/></svg>            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('profile.show') }}">Profile</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
               You can manage your profile and delete it, though we suggest that you don't, because everyone's security is everyone's business.
            </div>
        </div>
    </div>
</div>
