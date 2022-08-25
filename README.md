## 『KU Info Village』- 大学の授業情報掲示板
<br>
<p>開発期間：10ヵ月(リファクタ含む)<br>開発人数：1名<br>ユーザー数：約600名(2022/08/15時点)<br>※一般の方はご利用いただけません。また、開発はprivateフォルダで行っており、こちらは公開用に設置したリポジトリになるので、一部公開していないファイルがあります、ご了承ください。</p>


<p>簡易紹介：<br>　開発者が通う大学の授業情報掲示板、通称『KU Info Village』というWebアプリケーション。各学生がこれまでに受けた授業の感想や単位取得難易度に関する情報を5段階の評価と共に投稿することで、次の履修登録で参考にし合うというコンセプト。</p>

<br>

アーキテクチャ
<table>
    <tr>
        <th>言語</th>
        <td>PHP</td>
    </tr>
    <tr>
        <th>フレームワーク</th>
        <td>Laravel</td>
    </tr>
    <tr>
        <th>インフラ</th>
        <td>Xserver</td>
    </tr>
    <tr>
        <th>Webサーバー</th>
        <td>nginx, Apache</td>
    </tr>
    <tr>
        <th>サーバーOS</th>
        <td>Linux(WSL)</td>
    </tr>
    <tr>
        <th>DB</th>
        <td>MySQL</td>
    </tr>
    <tr>
        <th>各種ツール</th>
        <td>GitHub, Docker</td>
    </tr>
</table>

## アプリ紹介
※本番環境の投稿一覧をお見せすることはできかねますので、テスト環境のスクリーンショットをもとに紹介させていただきます。投稿内容以外は実際に公開されているものと同様となります。

### 【新規登録・ログインページ】
urlにアクセスしていただくと、こちらのページ遷移します。アプリ内での投稿内容は大学の授業に関するもので、全員が閲覧できるようにするべきではないと判断しました。よって、開発者が通う大学の学生限定で閲覧できるようなバリデーションを組み、登録・ログインをしていただかないと閲覧できないようになっております。そのため、どのようなアプリか一目でわからず、なかなか登録に踏み切っていただくことが難しいと考え、少しでも学生の皆さんに、「どのようなアプリなんだろう」と興味を持っていただけるように、インパクトのあるデザインを心掛けました。

![github1](https://user-images.githubusercontent.com/100588916/186465342-d1d2e8be-43ea-4c02-a3ce-15f6593adef9.png)
<br>

新規登録ボタンを押していただいたうえで、必要項目を入力し、登録していただく流れとなります。

<br>
![github2](https://user-images.githubusercontent.com/100588916/186465378-f77ff5fb-f2e1-44fa-9246-41b902db6187.png)

### 【TOPページ】

<p>ログインをしていただくと、TOPページ(HOME)に遷移します。こちらは、アプリケーションの紹介・利用方法が書かれているページになります。アプリのメイン要素である、投稿一覧のページをログイン直後に表示させようか否か悩みましたが、「履修の参考になるように」という目的である以上、ユーザーが毎日のように訪れるサイトではないと思い、半年に数回訪れてくれると想定して、サイトの紹介や注意事項が記載されているページをログイン直下に配置しました。</p>

![github4](https://user-images.githubusercontent.com/100588916/186465420-864b4b9c-b9e8-4838-b6d5-cc1d8bc09c16.png)
### 【CLASSESページ】

<p>こちらのページが、授業評価の投稿が寄せられているページとなります。1ページ最大80件表示され、最下部にページネーションのリンクがあります。上から、講義名、担当教員名、5段階の評価、学部、コメントが書かれており、「詳細」のリンクに飛ぶと、1つの評価が大きく表示されるページに遷移します。</p>

![github3](https://user-images.githubusercontent.com/100588916/186465446-d0875ac7-4bf2-4d94-8594-1a5f271aeb49.png)
<br>
<p>※写真は、テスト環境になりますので、すべて開発者が投稿した架空の評価となっています。</p>
<br>
<p>スクロールしていくと、上から最新の投稿順に評価が表示されています。</p>

![github5](https://user-images.githubusercontent.com/100588916/186465474-514a50a0-c5af-41e6-bd6e-81e2a65ab2a1.png)
<br>
<p>投稿については、「評価投稿」というボタンを押していただくことで、フォームが表示されます。必然的に「評価を投稿する」よりも、「評価を見る」という点をメインに利用される方が多くなり、投稿が集まらないという状況が起きてしまうのではないかと考えたため、各ユーザー1つ以上評価を投稿していただくまでは、すべての評価が閲覧できないというシステムを組ませていただいています。</p>

![github6](https://user-images.githubusercontent.com/100588916/186465494-60494d14-ff5f-48e1-857b-b82be2489ffd.png)
<br>
<p>上部の検索バーから、学部での絞り込み検索と、キーワードでの絞り込み検索も可能となっているため、自分が履修しようと考えている講義の評価を探すことが可能です。</p>

![github7](https://user-images.githubusercontent.com/100588916/186465507-c2c7d228-a7ec-4187-8b27-eb71057fa5bf.png)
<br>

ユーザーの学生さんたちには、主にこのページを利用することで、講義についての情報を収集していただいています。
<br>
### 【MYページ】

<p>このページでは、主にプロフィールの編集が可能になっています。投稿自体が匿名なので、ここでの情報がほかのユーザーに見られるということや、プロフィールの使い道については現時点でありませんが、自身の技術力向上も目的とし、UPDATE処理や画像アップロード処理の実装に挑戦しました。</p>

![github8](https://user-images.githubusercontent.com/100588916/186465534-6d5c8e01-d3f3-4ba5-9d1e-98e4dc9a40fc.png)
<br>
<p>「プロフィール編集」ボタンを押すことで、編集フォームが表示され、編集が可能になります。</p>

![github9](https://user-images.githubusercontent.com/100588916/186465560-e78019c0-e2e1-4110-8220-1669fa5c9d0c.png)
<br>

MYページについては以上になります。

### 【CONTACTページ】

<p>最後に、お問い合わせページになります。独学かつ、初めて開発したアプリケーションになるため、開発者側からは気づくことのなかったバグや利便性についての感想をユーザーの皆さんからいただきたいと考え、設置しました。「役に立った」などの、前向きな感想をいただくこともあり、自身としてもこれからのモチベーションにつながるものとなりました。</p>

![github10](https://user-images.githubusercontent.com/100588916/186466623-b0c249c4-09bb-4d8b-a2e5-80ef1a79fb38.png)
<br>

以上でアプリケーションの紹介は終了になります。最後までご覧いただきありがとうございました。







