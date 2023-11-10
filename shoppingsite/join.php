<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/join.css">
    <title>会員登録ページ</title>
</head>
<body>
<h2 class="heading-031">新規会員登録</h2>
<h3>会員情報</h3>
    <form action="" method="post">
    <label>
    <span class="textbox-001-label">お名前</span>
    <input type="text" class="textbox-001" placeholder="田中　太郎"/>
    </label>
    <label>
    <span class="textbox-001-label">お名前(フリガナ)</span>
    <input type="text" class="textbox-001" placeholder="タナカ　タロウ"/>
    </label>
    <label>
    <span class="textbox-001-label">メールアドレス</span>
    <input type="text" class="textbox-001" placeholder="xxx.tyunT.com"/>
    </label>
    <label>
    <span class="textbox-001-label">パスワード</span>
    <input type="password" class="textbox-001" placeholder="パスワードを入力してください"/>
    </label>
    <div class="form-area__cord">
    <label>
    <span class="textbox-001-label">郵便番号</span>
    <input type="text"  name="cord" class="textbox-001" placeholder="郵便番号を入力してください"/>
    </label>
    <label>
    <span class="textbox-001-label">生年月日</span>
    <input type="text" class="textbox-001" placeholder="YYYY/MM/DD"/>
    </label>
    <p>性別</p>
    <fieldset class="radio-001">
    <label>
        <input type="radio" name="radio-001" checked/>
        男性
    </label><br>
    <label>
        <input type="radio" name="radio-001"/>
        女性
    </label><br>
    <label>
        <input type="radio" name="radio-001"/>
        その他
    </label>
    </fieldset>
    <button class="button-003">登録</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="./script/join.js"></script>
    <p></p>
</body>
</html>