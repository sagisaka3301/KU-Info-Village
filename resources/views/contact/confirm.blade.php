<x-layout>
    <x-slot name="title">
        KU Info Village|CONTACT Confirm
    </x-slot>
    <link rel="stylesheet" href="{{ url('css/contact.css') }}">
    <link rel="stylesheet" href="{{ url('css/contact-res.css') }}">
    <div class="conBox">
        <form action="{{ route('kuinfo.thanks') }}" method="POST">
            @csrf
            <input type="hidden" name="name" value="{{ $contact['name'] }}">
            <input type="hidden" name="email" value="{{ $contact['email'] }}">
            <input type="hidden" name="content" value="{{ $contact['content'] }}">
            <div class="confirm">
                <div>お名前：　{{ $contact['name'] }}</div>
                <div>メールアドレス：　{{ $contact['email'] }}</div>
                <div>お問い合わせ内容：　{{ $contact['content'] }}</div>
            </div>
            <button class="confirm-btn">送信</button>
        </form>
        <div class="con-back">
            <a href="{{ url()->previous() }}">戻る</a>
        </div>
    </div>
    <div class="body-box"></div>
</x-layout>
