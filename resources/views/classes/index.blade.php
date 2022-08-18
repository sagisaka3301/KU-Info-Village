<x-layout>
    <x-slot name="title">
        KU Info Village|CLASSES
    </x-slot>
    <link rel="stylesheet" href="{{ url('css/class-info.css') }}">
    <link rel="stylesheet" href="{{ url('css/class-info-res.css') }}">
    <div class="filter"></div>
    <!-- ローディング -->
    <div id="loading">
        <div class="spinner"></div>
    </div>
    <div class="class-inner">
        <div class="title">
            <h3>～授業情報掲示板～</h3>
            <h2>Class Information Board</h2>
            @if (isset( $exnum ))
                <h3>学部検索：{{Common::setUndergra($exnum) }}</h3>
            @endif
            @if (isset($search))
                <h3>授業名検索：{{ $search }}</h3>
            @endif
        </div>
        <div class="search-post-area">
            <!-- 学部絞り込み -->
            <div class="search-box">
                <form enctype="multipart/form-data" class="ungra-ev" action="{{ route('kuinfo.classes') }}" method="GET">
                    {{-- @csrf --}}
                    <select name="undergra" class="ungra-ex">
                        <option disabled selected value="9">すべて</option>
                        <option value="1">経営学部</option>
                        <option value="2">経済学部</option>
                        <option value="3">外国語学部</option>
                        <option value="4">国際日本学部</option>
                        <option value="5">法学部</option>
                        <option value="6">人間科学部</option>
                        <option value="7">理学部</option>
                        <option value="8">工学部</option>
                    </select>
                    <input type="submit" class="ex-sub" value="学部検索">
                </form>
                <form class='postform' enctype="multipart/form-data" action="" method="GET">
                    <input type="search" name="search" class="search" placeholder="授業名を検索" required>
                    <input type="submit" class="search-sub" value="検索">
                </form>
            </div>
            <div class="open-btn">
                <p>評価投稿</p>
            </div>
        </div>
        <!-- 評価投稿フォーム -->
        <div class="review-box">
            <div class="rev-title">
                <h2>～POST CLASS REVIEW～</h2>
            </div>
            <form enctype="multipart/form-data" action="{{ route('kuinfo.create') }}" method='POST'>
                @csrf
                <div class="gakubu-taipu">
                    <div class="gakubu">
                        <label for="">学部</label>
                        <select name="undergra" id="">
                            <option value="1">経営学部</option>
                            <option value="2">経済学部</option>
                            <option value="3">外国語学部</option>
                            <option value="4">国際日本学部</option>
                            <option value="5">法学部</option>
                            <option value="6">人間科学部</option>
                            <option value="7">理学部</option>
                            <option value="8">工学部</option>
                        </select>
                    </div>
                    <div class="taipu">
                        <label for="">授業種</label>
                        <select name="type" id="type">
                            <option value="1">共通教養</option>
                            <option value="2">専攻科目</option>
                            <option value="3">その他</option>
                        </select>
                    </div>
                </div>
                <div class="jugyou-tantou">
                    <div class="jugyou">
                        <label for="">講義名</label>
                        <input type="text" name="class_name" placeholder="" required>
                    </div>
                    <div class="tantou">
                        <label for="">担当教員</label>
                        <input type="text" name="in_charge" placeholder=""><span>さん</span>
                    </div>
                </div>
                <!-- 星の評価 -->
                <div class="star-review">
                    <input class="rating__input hidden--visually" type="radio" id="5-star" name="rating" value="5" />
                    <label class="rating__label" for="5-star" title="星5つ"><span class="rating__icon" aria-hidden="true"></span><span class="hidden--visually">星5つ</span></label>
                    <input class="rating__input hidden--visually" type="radio" id="4-star" name="rating" value="4" />
                    <label class="rating__label" for="4-star" title="星4つ"><span class="rating__icon" aria-hidden="true"></span><span class="hidden--visually">星4つ</span></label>
                    <input class="rating__input hidden--visually" type="radio" id="3-star" name="rating" value="3" />
                    <label class="rating__label" for="3-star" title="星3つ"><span class="rating__icon" aria-hidden="true"></span><span class="hidden--visually">星3つ</span></label>
                    <input class="rating__input hidden--visually" type="radio" id="2-star" name="rating" value="2" />
                    <label class="rating__label" for="2-star" title="星2つ"><span class="rating__icon" aria-hidden="true"></span><span class="hidden--visually">星2つ</span></label>
                    <input class="rating__input hidden--visually" type="radio" id="1-star" name="rating" value="1" required/>
                    <label class="rating__label" for="1-star" title="星1つ"><span class="rating__icon" aria-hidden="true"></span><span class="hidden--visually">星1つ</span></label>
                    <label class="star-title" for="">評価：</label>
                </div>
                <div class="hyouka">
                    <label for="">コメント</label>
                    <textarea name="comment" placeholder="(例) 課題が多過ぎる／楽単だけど充実はしてない／面白くて単位も普通にとれる。etc"></textarea>
                </div>
                <div class="submit-btn">
                    <input class="toukou" type="submit" value="投稿">
                </div>
                <!-- 投稿者 -->
            </form>
        </div>
        <!-- 評価一覧 -->
        <div class="list-box">
            <table>
                <div class="contents">
                <div class="info-cover" style="
                <?php

                    if (Auth::user()->post_flag === 0) {
                        echo "display:block;";
                    } else {
                        echo "display:none;";
                    }

                ?>
                ">
                    <p>1つでも、授業の評価を投稿していただけると、このフィルターが外れ、すべての評価の詳細が閲覧可能になります。授業の感想や単位取得難易度など、投稿していただけると幸いです。</p>
                </div>
                @forelse ($posts as $post)
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
                            <a href="{{ route('kuinfo.detail' , $post) }}" class="deta">詳細</a>
                        <div class="con-comment">
                            <p>{{ $post->comment }}</p>
                        </div>
                        <div class="con-date">
                            <p>{{ $post->created_at }}</p>
                        </div>
                    </div>
                @empty
                    <p>No posts yet!</p>
                @endforelse
                </div>
            </table>
        </div>
        <div class="links">
            @if (isset( $exnum ))
                {{-- PostControllerにてexclusiveに学部番号が書くのされているので利用する。 --}}
                {{ $posts->onEachSide(3)->appends(['undergra' => $exnum])->render() }}
            @elseif (isset($search))
                {{ $posts->onEachSide(3)->appends(['search' => $search])->render() }}
            @else
                {{ $posts->onEachSide(3)->links() }}
            @endif
        </div>
    </div>
</x-layout>
<script src="{{ asset('/js/class-info.js') }}"></script>
