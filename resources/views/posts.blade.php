  <x-layout :title="$title">    
    @foreach ( $posts as $post )
      <article class="py-8 max-w-3xl border-b border-gray-300">
      <div class="mb-2">    
        <x-category-btn href="/posts/category/{{ $post->category_slug }}" :categoryName="$post->category_slug">{{ $post->category}}</x-category-btn>
      </div>
      <a href="/post/{{ $post['slug'] }}" class="mb-1 text-3xl tracking-tight font-bold text-gray-900 active:underline">{{ $post["title"] }}</a>
      <div class="text-base text-gray-500">
        <a href="/authors/{{ $post->author->id }}" class="hover:underline"><b>{{ $post->author->name }}</b></a><span> | {{ $post["created_at"]->diffForHumans() }}</span>
      </div>
      <p class="my-4 font-light">{{ Str::words($post["body"], 20, '...') }}</p>
      <a href="/post/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline">Read More &raquo;</a>
    </article>    
    @endforeach    
  </x-layout>
