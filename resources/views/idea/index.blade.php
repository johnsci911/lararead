<x-app-layout>
    <div class="filters flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-6">
        <div class="w-full md:w-1/3">
            <select id="category" name="category" class="w-full rounded-xl border-none px-4 py-2">
                <option value="Category 1">Category One</option>
                <option value="Category 2">Category Two</option>
                <option value="Category 3">Category Three</option>
            </select>
        </div>

        <div class="w-full md:w-1/3">
            <select id="other_filters" name="other_filters" class="w-full rounded-xl border-none px-4 py-2">
                <option value="Filters 1">Filters One</option>
                <option value="Filters 2">Filters Two</option>
                <option value="Filters 3">Filters Three</option>
            </select>
        </div>

        <div class="w-full md:w-2/3 relative">
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>

            <input type="search" placeholder="Find an idea" class="w-full rounded-xl bg-white border-none placeholder-gray-900 px-4 py-2 pl-8">
        </div>
    </div> <!-- end filters -->

    <div class="ideas-container space-y-6 my-6">
        @foreach($ideas as $idea)
            <div
                x-data
                @click="
                    clicked = $event.target
                    target = clicked.tagName.toLowerCase()
                    ignores = ['button', 'target', 'svg', 'path', 'a']

                    if (! ignores.includes(target)) {
                        clicked.closest('.idea-container').querySelector('.idea-link').click()
                    }
                "
                class="idea-container hover:shadow-card transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer"
            >
                <div class="hidden md:block border-r border-gray-100 px-5 py-8">
                    <div class="text-center">
                        <div class="font-semibold text-2xl text-blue">5</div>
                        <div class="text-gray-500">Votes</div>
                    </div>

                    <div class="mt-8">
                        <button class="w-20 bg-blue border border-gray-200 hover:border-gray-400 transition duration-150 ease-in font-bold text-white text-xxs uppercase rounded-xl px-4 py-3">Vote</button>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row flex-1 px-2 py-6">
                    <div class="flex-none mx-2">
                        <a href="#">
                            <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                        </a>
                    </div>
                    <div class="w-full flex flex-col justify-between px-2">
                        <h4 class="text-xl font-semibold mt-2 md:mt-0">
                            <a href="{{ route('idea.show', $idea) }}" class="idea-link hover:underline">{{ $idea->title }}</a>
                        </h4>
                        <div class="text-gray-600 mt-3 line-clamp-3">
                            {{ $idea->description }}
                        </div>
                        <div class="flex md:items-center flex-col md:flex-row justify-between mt-6">
                            <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                                <div>{{ $idea->created_at->diffForHumans() }}</div>
                                <div>&bull;</div>
                                <div>{{ $idea->category->name }}</div>
                                <div>&bull;</div>
                                <div class="text-gray-900">4 Comments</div>
                            </div>
                            <div
                                x-data="{ isOpen: false }"
                                class="flex items-center space-x-2 mt-4 md:mt-0"
                            >
                                <div class="{{ $idea->status->classes }} text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">{{ $idea->status->name }}</div>
                                <button
                                    @click="isOpen = !isOpen"
                                    class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3"
                                >
                                    <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                                    <ul
                                        x-cloak
                                        x-show="isOpen"
                                        x-transition
                                        x-transition.origin.top.left
                                        @click.away="isOpen = false"
                                        @keydown.escape.window="isOpen = false"
                                        class="absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl py-3 md:ml-8 top-8 md:top-6 right-0 md:left-0"
                                    >
                                        <li><a href="#" class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">Mark as Spam</a></li>
                                        <li><a href="#" class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">Delete Post</a></li>
                                    </ul>
                                </button>
                            </div>

                            <div class="flex items-center md:hidden mt-4 md:mt-0">
                                <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                                    <div class="text-sm font-bold leading-none">12</div>
                                    <div class="text-xxs font-semibold leading-none text-gray-400">Votes</div>
                                </div>
                                <button
                                    class="w-20 bg-blue text-white border border-gray-200 font-bold text-xxs uppercase rounded-xl hover:border-gray-400 transition duration-150 ease-in px-4 py-3 -mx-5"
                                >
                                    Vote
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end idea-container -->
        @endforeach
    </div> <!-- end ideas-container -->

    <div class="my-8">
        {{ $ideas->links() }}
    </div>
</x-app-layout>
