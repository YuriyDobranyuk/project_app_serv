<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if($isManager)
                {{ __('Orders') }}
            @elseif($isClient)
                {{ __('Send order') }}
            @else
                {{ __('Main page') }}
            @endif
        </h2>
    </x-slot>

    @if($isClient)
        @if(!1)
            <div class="p-6 bg-white border-b border-gray-200">
                {{ __('You always send order today.') }}
            </div>
        @else
            <x-form-order></x-form-order>
        @endif
    @elseif($isManager)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Read orders
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        You're logged in!
                    </div>
                </div>
            </div>
        </div>
    @endif
    <a href="{{route('post.index')}}" class="btn btn-default">Все заявки</a>
    <a href="{{route('post.create')}}" class="btn btn-default">Оставить заявку</a>
</div>