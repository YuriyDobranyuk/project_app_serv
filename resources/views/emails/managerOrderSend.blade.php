@component('mail::message')
    # Order Shipped


    <p>
        Клієнт {{$currentUser->name}} зробив новий заказ.
    </p>
    <p>
        Параметри замовлення:
    </p>
    <ul>
        <li>
            <div class="name">Тема:</div>
            <div class="value">{{$order->topic}}</div>
        </li>
        <li>
            <div class="name">Повідомлення:</div>
            <div class="value">{{$order->message}}</div>
        </li>
        <li>
            <div class="name">Час створення:</div>
            <div class="value">{{$order->timeUppend}}</div>
        </li>
        <li>
            <div class="name">ID клієнта:</div>
            <div class="value">{{$currentUser->id}}</div>
        </li>
        <li>
            <div class="name">Клієнт:</div>
            <div class="value">{{$currentUser->name}}</div>
        </li>
        <li>
            <div class="name">Email клієнта:</div>
            <div class="value">{{$currentUser->email}}</div>
        </li>
    </ul>

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent