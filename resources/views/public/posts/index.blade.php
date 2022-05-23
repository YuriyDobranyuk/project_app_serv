
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All orders') }}
        </h2>
        <div class="container">
            <div class="tablePost">
                <div class="titlesTable">
                    <div>ID</div>
                    <div>Topic</div>
                    <div>Message</div>
                    <div>Checked</div>
                    <div>Client ID</div>
                    <div>File ID</div>
                </div>
                <div class="mainBlockTable">
                @if (count($posts) > 0)
                    @foreach($posts as $post)
                        <div class="elementPost">
                            <div>{{$post->id}}</div>
                            <div>{{$post->topic}}</div>
                            <div>{{$post->message}}</div>
                            <div>
                                @if($post->verified)
                                    <input type="checkbox" class="verifiedPost" checked="checked" readonly>
                                @else
                                    <input type="checkbox" class="verifiedPost">
                                @endif
                            </div>
                            <div>{{$post->userId}}</div>
                            <div>{{$post->fileId}}</div>
                        </div>
                    @endforeach
                @endif
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>