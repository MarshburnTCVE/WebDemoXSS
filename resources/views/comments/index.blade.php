{{-- resources/views/comments/index.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Comments (XSS Demo)
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            {{-- Form --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 p-6">
                <form method="POST" action="{{ route('comments.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Author
                        </label>
                        <input type="text" name="author"
                               class="mt-1 block w-full border rounded-md"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Comment
                        </label>
                        <textarea name="comment"
                                  class="mt-1 block w-full border rounded-md"
                                  rows="3"
                                  required></textarea>
                    </div>
                        <button type="submit"
                                class="px-4 py-2 text-white font-semibold rounded-md"
                                style="background-color: #2563eb;">
                            Post Comment
                        </button>
                </form>
            </div>

            {{-- Comments list --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="font-semibold mb-4">All Comments</h3>

                @forelse ($comments as $comment)
                    <div class="border-b pb-3 mb-3">
                        <div class="font-semibold">
                            {{ $comment->author }}
                        </div>

                        {{-- SAFE VERSION (escaped) --}}
                        {{-- <div class="text-gray-800">
                            {{ $comment->comment }}
                        </div> --}}

                        {{-- UNSAFE VERSION (for XSS demo) --}}
                        <div class="text-gray-800">
                           {!! $comment->comment !!}   {{-- intentionally vulnerable --}}
                        </div>
                    </div>
                @empty
                    <p>No comments yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>