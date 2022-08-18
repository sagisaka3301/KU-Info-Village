<x-layout>
    <x-slot name="title">
        MY-APP|MYPAGE
    </x-slot>
    <link rel="stylesheet" href="{{ url('css/mypage.css') }}">
    <link rel="stylesheet" href="{{ url('css/mypage-res.css') }}">
    <div class="filter"></div>
    <!-- ローディング -->
    <div id="loading">
        <div class="spinner"></div>
    </div>
    <div class="h-title">
        <h3>～マイページ～</h3>
        <h2>My Page</h2>
    </div>
    <div class="user-area" >
        <div class="user-info">
            <div class="ui-title">
                <h3>～USER DATA～</h3>
            </div>
            <!-- 表示する処理 -->
            <div class="pro-img-front">
                <img src="{{ asset('storage/'.Auth::user()->f_name) }}" alt="###" >
            </div>
            <div class="user-datas">
                <div class="u-name">
                    <div class="un-title">USERNAME：</div>
                    <div class="un-con">{{ Auth::user()->name }}</div>
                </div>
                <div class="u-mail">
                    <div class="um-title">EMAIL：</div>
                    <div class="um-con">{{ Auth::user()->email }}</div>
                </div>
                <div class="edit-logout">
                    <div class="e-btn">
                        <p class="edit-btn">プロフィール編集</p>
                    </div>
                    <div class="l-btn">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input type="submit" name='logout' value="ログアウト">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="edit-form">
        <form enctype="multipart/form-data" action="{{ route('kuinfo.update') }}" method='POST'>
            @csrf
            <p class="e-user">EDIT PROFILE</p>
            <div class="edit-inner">
                <div class="image-e-form">
                    <div class="img-edit">
                        <div class="file-up">
                            <input class='file_img' type="hidden" name="MAX_FILE_SIZE" value="3048576" />
                            <label>
                                <span class="e-f-title">プロフィール画像</span>
                                <img src="" alt="">
                                <input class='select_file' name="img" type="file" accept="image/*" />
                            </label>
                        </div>
                    </div>
                    <div id="image_in"></div>
                </div>
                <div class="n-m-edit">
                    <div class="name-edit">
                        <label>USERNAME</label><br>
                        <input type="text" name='name' value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="mail-edit">
                        <label>EMAIL</label><br>
                        <input type="email" name='email' value="{{ Auth::user()->email }}" required>
                    </div>
                </div>
            </div>
            <div class="submit-btn">
                <div class="s-btn">
                    <input class="pro-submit" type="submit" value="変更">
                </div>
                <div class="b-btn">
                    <p class="back">戻る</p>
                </div>
            </div>
        </form>
    </div>
    <script>
    $('.select_file').change(function(){
        var image = "";
        if (this.files.length > 0) {
            // 選択されたファイル情報を取得
            var file = this.files[0];

            // readerのresultプロパティに、データURLとしてエンコードされたファイルデータを格納
            var reader = new FileReader();
            reader.readAsDataURL(file);

            $('.e-f-title').css('display','none');

            reader.onload = function() {
                image += "<img src=\"" + this.result + "\" />\r\n";
                document.getElementById( "image_in" ).innerHTML = image;
            }
        }
    });
    </script>
    <div class="notify">
        <p>※iphoneで撮影した写真など、一部使用できない画像があるので、ご注意ください。<br>　(スクリーンショットであれば可能です。)</p>
        <p><br>※画像ファイルサイズの上限を指定してあるため、<br>エラーが出た場合は別の画像をご利用ください。</p>
    </div>
</x-layout>
<script src="{{ asset('/js/mypage.js') }}"></script>
