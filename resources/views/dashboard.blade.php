<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    <br>
                    <h1>Good to have you in our shop</h1>
                    <h1 style="font-size: 50px">{{ Auth::user()->name }}</h1>
                    <h1 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">PT Meksiko warmly welcome you to browse our selection and find something that suits your needs. Take your time to explore our products, and if something catches your eye, we’re here to assist with any questions you may have. We’re confident you’ll find just what you’re looking for, and we’re excited to help you make it yours!"</h1>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
