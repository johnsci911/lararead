<x-app-layout>
    <div class="filters flex space-x-6">
        <div class="w-1/3">
            <select id="category" name="category" class="w-full rounded-xl border-none px-4 py-2">
                <option value="Category 1">Category One</option>
                <option value="Category 2">Category Two</option>
                <option value="Category 3">Category Three</option>
            </select>
        </div>

        <div class="w-1/3">
            <select id="other_filters" name="other_filters" class="w-full rounded-xl border-none px-4 py-2">
                <option value="Filters 1">Filters One</option>
                <option value="Filters 2">Filters Two</option>
                <option value="Filters 3">Filters Three</option>
            </select>
        </div>

        <div class="w-2/3 relative">
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>

            <input type="search" placeholder="Find an idea" class="w-full rounded-xl bg-white border-none placeholder-gray-900 px-4 py-2 pl-8">
        </div>
    </div> <!-- end filters -->
</x-app-layout>
