<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All orders') }}
        </h2>
        <div class="container">
            <table class="table table-hover">
                <thead>

                </thead>
                <tbody>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                </tbody>
            </table>
        </div>
    </x-slot>
</x-app-layout>