@section('content')
{{--@include('layouts.header')--}}
<main class="mx-auto flex w-full max-w-7xl flex-grow flex-col px-4 sm:px-6 lg:px-8">
    <div class="my-auto flex-shrink-0 py-16 sm:py-32">
        <p class="text-base font-semibold text-indigo-600">Hi</p>
        <h1 class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
            {{ $message }}
        </h1>
        <p class="mt-2 text-base text-gray-500">
        </p>
        <div class="mt-6">
            <button onclick="window.close()"
                    class="text-base font-medium text-indigo-600 hover:text-indigo-500">
                close this window
                <span aria-hidden="true">&rarr;</span>
            </button>
        </div>
    </div>
</main>
{{--@include('layouts.footer')--}}
@endsection

