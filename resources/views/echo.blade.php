<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Reflected XSS Demo
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="GET" action="{{ route('echo') }}" class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Enter your name
                    </label>
                    <input type="text" name="name"
                           class="border rounded w-full px-2 py-1 mb-3"
                           value="{{ request('name') }}">
                    <button type="submit"
                            class="px-4 py-2 text-white font-semibold rounded-md"
                            style="background-color: #2563eb !important;">
                        Say Hello
                    </button>
                </form>

                @if ($name !== '')
                    <p class="mt-4 font-semibold">Output:</p>

                    {{-- Vulnerable reflected XSS --}}
                    <p class="mt-1 text-gray-800">
                        Hello, {!! $name !!}   {{-- intentionally unsafe --}}
                    </p>

                    {{-- Safe version (for later fix) --}}
                    {{-- <p class="mt-1 text-gray-800">
                        Hello, {{ $name }}
                    </p> --}}
                @endif
            </div>
        </div>
    </div>
</x-app-layout>