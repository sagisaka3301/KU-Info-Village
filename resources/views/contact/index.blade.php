<x-layout>
    <x-slot name="title">
        KU Info Village|CONTACT
    </x-slot>
    <link rel="stylesheet" href="{{ url('css/contact.css') }}">
    <link rel="stylesheet" href="{{ url('css/contact-res.css') }}">
    <!-- ローディング -->
    <div id="loading">
        <div class="spinner"></div>
    </div>
    <div class="con-title">
        <h3>～お問い合わせ～</h3>
        <h2>Contact</h2>
    </div>
    <div class="complain">
        <p>ご利用いただきありがとうございます。不具合等なにかお気づきの点や質問等がございましたら、こちらのフォームよりお問い合わせください。</p>
    </div>
    <form action="{{ route('kuinfo.confirm') }}" method="POST" name="form" enctype="multipart/form-data">
        @csrf
        <div class="inner">
            <div class="name-mail">
                <div class="name">
                    <label for="">名前</label><br>
                    <input type="text" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="nameError red">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="mail">
                    <label for="">メールアドレス</label><br>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="emailError red">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="content">
                <label for="">お問い合わせ内容</label><br>
                <textarea name="content" id="" placeholder="改善してほしい点、使ってみた感想など">{{ old('content') }}</textarea>
                @error('content')
                    <div class="contentError red">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="s-btn">
                <input type="submit" class="sub-btn" value="完了">
            </div>
        </div>
    </form>
</x-layout>
<script src="{{ asset('/js/contact.js') }}"></script>
