<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All orders') }}
        </h2>
        <x-form-order></x-form-order>
    </x-slot>
</x-app-layout>