<x-layout>
    <x-slot name="title">
        KU Info Village|CONTACT Confirm
    </x-slot>
    <link rel="stylesheet" href="{{ url('css/contact.css') }}">
    <link rel="stylesheet" href="{{ url('css/contact-res.css') }}">
    <div class="conBox">
        <div class="thanks-msg">
            ありがとうございました！
        </div>
        <a href="{{ route('kuinfo.contact') }}">戻る</a>
    </div>
    <div class="body-box"></div>
</x-layout>
