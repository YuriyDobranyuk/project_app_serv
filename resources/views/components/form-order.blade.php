<!-- Validation Errors -->
<!--x-order-form-validation-errors class="mb-4" :errors="$errors" /-->

<!--form method="POST" action="//{ route('ordered') }}"-->
<div class="formOrderBlock">
    <div class="title">Сделайте заявку</div>
    <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
        @csrf
        @if ($message = \Illuminate\Support\Facades\Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach($errors as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif
        <!-- Name -->
        <div class="form-group">
            <x-label for="name" :value="__('Topic')" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="topic" required autofocus />
        </div>

        <!-- message -->
        <div class="form-group">
            <x-label for="message" :value="__('Your message')" />
            <x-textarea id="message" class="block mt-1 w-full"
                     name="message"
                     required autocomplete="message" />
        </div>

        <!-- File -->
        <div class="form-group">
            <x-label for="file" :value="__('File')" />
            <x-input id="file" class="block mt-1 w-full"
                     type="file"
                     name="file" />
        </div>

        <div class="flex items-center justify-center mt-4">
            <x-button class="ml-4">
                {{ __('Send') }}
            </x-button>
        </div>
    </form>
</div>
