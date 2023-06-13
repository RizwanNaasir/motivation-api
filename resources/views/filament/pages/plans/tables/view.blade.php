<ul role="list" class="divide-y divide-gray-100 overflow-hidden bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">
    @foreach ($records as $record)
    <li class="relative flex justify-between gap-x-6 px-4 py-5 hover:bg-gray-50 sm:px-6">
        <div class="flex gap-x-4">
            @if(isset($record->image))
                <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{$record->image}}" alt="">
            @endif
            <div class="min-w-0 flex-auto">
                <p class="text-sm font-semibold leading-6 text-gray-900">
                    <a href="#">
                        <span class="absolute inset-x-0 -top-px bottom-0"></span>
                        {{$record->nickname}}
                    </a>
                </p>
                <p class="mt-1 flex text-xs leading-5 text-gray-500">
                    <a href="mailto:leslie.alexander@example.com" class="relative truncate hover:underline">{{ $record->amount }}</a>
                </p>
            </div>
        </div>
        <div class="flex items-center gap-x-4">
            <div class="hidden sm:flex sm:flex-col sm:items-end">
                <p class="text-sm leading-6 text-gray-900">Co-Founder / CEO</p>
                <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
            </div>
            <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
            </svg>
        </div>
    </li>
    @endforeach
</ul>