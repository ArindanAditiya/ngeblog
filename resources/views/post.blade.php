<x-layout :title="$title">    
    <article class="py-8 max-w-3xl border-b border-gray-300">
      <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900   ">{{ $post["title"] }}</h2>
      <div class="text-base text-gray-500">
        <a href="#"><b>{{ $post["author"] }}</b> | {{ $post["date"] }}</a>
      </div>
      <p class="my-4 font-light">{{ $post["body"] }}</p>
      <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back to all posts </a>
    </article>         
</x-layout>
