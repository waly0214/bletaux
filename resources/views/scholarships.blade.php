<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Scholarships') }}
        </h2>
    </x-slot>


        <div class="overflow-x-auto">
            <div class="min-w-screen min-h-screen bg-gray-100 flex justify-center bg-gray-100 font-sans overflow-hidden">
                <div class="w-1/2">
                    <div class="bg-white shadow-md rounded my-6">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-800 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Name of Scholarship</th>
                                    <th class="py-3 px-6 text-left"></th>
                                    <th class="py-3 px-6 text-left">Application</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-800 text-lg font-light">
                                @foreach ($scholarships as $scholarship)
                                <tr class="border-b border-gray-200 odd:bg-white even:bg-slate-50">
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                {{ $scholarship->name }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                <a href="{{ 'scholarships/'.$scholarship->id }}" class=" button rounded-lg bg-gradient-to-br from-[#6025F5] to-[#FF5555] px-5 py-2 text-base font-medium text-white transition duration-200 hover:shadow-xl hover:shadow-[#60255F5]/50">More Information</a>
                                                {{-- {{ $scholarship->description }} --}}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex items-left">
                                            <a href="{{ $scholarship->link }}">Website</a>
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
