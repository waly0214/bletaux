<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Newsletters') }}
        </h2>
    </x-slot>


        <div class="overflow-x-auto">
            <div class="min-w-screen min-h-screen bg-gray-100 flex justify-center bg-gray-100 font-sans overflow-hidden">
                <div class="w-3/4">
                    <div class="bg-white shadow-md rounded my-6">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Year</th>
                                    <th class="py-3 px-6 text-left">Newsletter Edition</th>
                                    <th class="py-3 px-6 text-center">View</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-lg font-light">
                                @foreach ($newsletters as $newsletter)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                {{ $newsletter->year }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                {{ $newsletter->title }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex items-center justify-center">
                                            <a href="{{asset('storage/'.$newsletter->location) }}"><img class="w-12 h-12 rounded-full border-gray-200 border transform hover:scale-125" src="{{ asset('images/pdf.png') }}"/></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</x-app-layout>
