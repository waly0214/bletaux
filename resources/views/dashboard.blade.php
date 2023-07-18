<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <h3>Welcome to the BLET Auxiliary Membership Page {{ Auth::user()->first_name }}</h3>
    </x-slot>

    <!-- component -->
<!-- This is the newsletter component -->
<section class="bg-gray-100 dk:bg-gray-900 py-10 px-12">
    <div class="grid grid-flow-row gap-8 text-neutral-600 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        <div class="my-8 rounded shadow lg shadow-gray-200 dark:shadow-gray-900 bg-white dard:bg-gray-800 duration-300 hover:-translate-y-1">
            <a href="{{ route('newsletters.index') }}" class="cursor pointer">
                <!--Image -->
                <img src="{{ asset('images/Newsletter.jpg') }}" class="rounded-t h-72 w-full object-cover"/>
                <figcaption class="p-4">
                    <!--Title -->
                    <p class="text-center text-xl mb-4 font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                        Newsletters
                    </p>
            </a>
        </div>

        <div class="my-8 rounded shadow lg shadow-gray-200 dark:shadow-gray-900 bg-white dard:bg-gray-800 duration-300 hover:-translate-y-1">
            <a href="#" class="cursor pointer">
                <!--Image -->
                <img src="{{ asset('images/gavel.jpg') }}" class="rounded-t h-72 w-full object-cover"/>
                <figcaption class="p-4">
                    <!--Title -->
                    <p class="text-center text-xl mb-4 font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                        BLET Auxiliary Bylaws
                    </p>
            </a>
        </div>

        <div class="my-8 rounded shadow lg shadow-gray-200 dark:shadow-gray-900 bg-white dard:bg-gray-800 duration-300 hover:-translate-y-1">
            <a href="{{ route('scholarships.index') }}" class="cursor pointer">
                <!--Image -->
                <img src="{{ asset('images/scholarship.jpg') }}" class="rounded-t h-72 w-full"/>
                <figcaption class="p-4">
                    <!--Title -->
                    <p class="text-center text-xl mb-4 font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                        Scholarship Application
                    </p>
            </a>
        </div>




    </div>
</section>





{{-- <div class="py-12">
    <div class="max-w-7xl sm:px-6 lg:px-8">
        <div class='flex items-center justify-center from-[#F9F5F3] via-[#F9F5F3] to-[#F9F5F3] bg-gradient-to-br px-2'>
            <div class='w-80 max-w-md mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
                <div class='max-w-md mx-auto'>
                  <div class='h-[236px]' style='background-image:url({{ asset('images/Newsletter.jpg') }});background-size:cover;background-position:center'>
                   </div>
                  <div class='p-4 sm:p-6'>

                    <p class='text-[#7C7C80] font-[15px] mt-6'>View our collection of newsletters from 2012 through now</p>

                      <a target='_blank' href='{{ route('newsletters.index') }}' class='block mt-10 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#FFC933] rounded-[14px] hover:bg-[#FFC933DD] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                          View now
                      </a>

                  </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}




</x-app-layout>
