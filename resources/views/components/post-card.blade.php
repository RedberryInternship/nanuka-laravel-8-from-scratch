@props(['post'])

<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5 cursor-pointer">
        <div>
            <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('images/illustration-1.png') }}"
                alt="Blog Post Illustration" class="rounded-xl">
        </div>
        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div>
                    <x-category-button :category="$post->category" />
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="{{ route('show', $post->slug ) }}">
                            {{ $post->title }}
                        </a>
                    </h1>
                    <span class="mt-2 block text-gray-300 text-xs">
                        Published
                        <time>
                            {{ $post->created_at->diffForHumans() }}
                        </time>
                    </span>
                </div>
            </header>
            <div class="mt-2 text-sm mt-4 space-y-4">
                {!! $post->excerpt !!}
            </div>
            <footer class="flex justify-between items-center mt-8">
                <div class="flex text-sm items-center">
                    <img src="{{ asset('images/lary-avatar.svg') }}" alt="Larry avatar">
                    <div class="ml-3">
                        <h5 class="font-bold">
                            <a href="{{route('home', ['author' => $post->author->username])}}">{{ $post->author->name }}</a>
                        </h5>
                    </div>
                </div>
                <div>
                    <a class="hover:bg-gray-400 bg-gray-300 border font-semibold px-5 py-2 rounded-full text-xs"
                        href="{{ route('show', $post->slug ) }}">Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
