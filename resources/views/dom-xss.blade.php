<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            DOM-based XSS Demo
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p class="mb-4">
                    This page reads the de>message</code> parameter from the URL and
                    injects it into the DOM using JavaScript.
                </p>

                <div id="output" class="p-3 border rounded bg-gray-50"></div>
            </div>
        </div>
    </div>

    <script>
        // Vulnerable DOM XSS: takes message from URL and puts it into innerHTML
        const params = new URLSearchParams(window.location.search);
        const message = params.get('message') || '';

        const output = document.getElementById('output');
        // Intentionally unsafe sink:
        output.innerHTML = "Message: " + message;  // DOM-based XSS
    </script>
</x-app-layout>