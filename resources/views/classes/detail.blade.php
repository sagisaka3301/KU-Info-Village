<x-layout>
    <x-slot name="title">
        MY-APP|CLASSES
    </x-slot>
    <link rel="stylesheet" href="{{ url('css/detail.css') }}">
    <link rel="stylesheet" href="{{ url('css/detail-res.css') }}">
    <div class="filter"></div>
    <!-- ローディング -->
    <div id="loading">
        <div class="spinner"></div>
    </div>
    <a href="{{ url()->previous() }}" class="web-back">BACK</a>
    <div class="class-inner">
        <!-- 評価 -->
        <div class="list-box">
            <table>
                <div class="contents">
                    <div class="class-content">
                        <div class="name-type">
                            <div class="con-name">
                                <p>{{ $post->class_name }}　<span>{{ Common::setType($post->type) }}</span></p>
                            </div>
                        </div>
                        <div class="con-charge">
                            <p>担当者　　{{ $post->in_charge }} さん</p>
                        </div>
                        <div class="con-star">
                            <p>{{ Common::setStar($post->evaluation) }}</p>
                        </div>
                        <div class="con-under">
                            <p>{{ Common::setUndergra($post->undergra) }}</p>
                        </div>
                        <div class="con-comment">
                            <p>{{ $post->comment }}</p>
                        </div>
                        <div class="con-date">
                            <p>{{ $post->created_at }}</p>
                        </div>
                    </div>
                </div>
            </table>
        </div>
    </div>
</x-layout>
<script src="{{ asset('/js/class-info.js') }}"></script>
