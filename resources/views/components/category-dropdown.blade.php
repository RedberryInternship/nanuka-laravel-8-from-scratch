<x-dropdown>
    <x-slot name="trigger">
        <button class="font-semibold pl-3 pr-9 py-2 text-sm outline-none w-full lg:w-32 text-left flex lg:inline-flex">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />
        </button>
    </x-slot>

    <x-dropdown-item href="/?{{ http_build_query(request()->except('category', 'page')) }}"
        :active="request()->routeIs('home') && is_null(request()->getQueryString())">
        All
    </x-dropdown-item>

    @foreach ($categories as $category)
        <x-dropdown-item
            href="{{ route('home', ['category' => $category->slug, http_build_query(request()->except('category', 'page'))]) }}"
            :active='request()->fullUrlIs("*?category={$category->slug}*")'>
            {{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
