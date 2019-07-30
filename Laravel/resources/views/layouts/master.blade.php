<!DOCTYPE html>
<html lang="ja">
<head>
  <title>Googleカレンダーの予定をExcelやCSV形式にエクスポートする作業効率化ツール「カレレポ」</title>

  <meta name="description" content="Googleカレンダーの予定をExcel（エクセル）やCSV形式にエクスポートしたい！そんなあなたの期待に応えるために生まれました！カレレポは簡単に予定や作業時間が出力できるため、毎日の作業が効率化できます。" />

  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/jquery-ui.css">
  <link rel="stylesheet" href="/css/jquery.datetimepicker.css">
  <link rel="shortcut icon" href="/img/calerepo-favicon.ico">

  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

  <section id="container">
    <header class="header">
      <div class="nav">
        <p class="main-description">
        <img src="/img/calerepo-logo.png" width="130" height="28" alt="ロゴイメージ" />
        </p>

        <div class="nav-right">
          <a href="/">ホーム</a>
          <a href="/faq">よくある質問</a>
          <a href="/about">カレレポについて</a>
          <a href="{{ route('logout') }}">ログアウト</a>
        </div>

      </div>
    </header>
    <div class="content" id="app">
      @yield('content')
    </div>
    <div class="footer">
      <div class="col-xs-12 blue">
        <div class="col-xs-4 footer-col">
          <div class="footer-div">
            <h5>カレレポ</h5>
            <p class="footer-p">Googleカレンダーの予定をExcel（エクセル）やCSV形式にエクスポートしたい！そんなあなたの期待に応えるのがカレレポ！カレレポは簡単に予定・作業時間・終了時間・合計時間を出力できるため、毎日の仕事が楽しく短縮できます。</p>
          </div>
        </div>
        <div class="col-xs-4 footer-col">
          <div class="">
            <h5 class="footer-h">使い方</h5>
            <p class="footer-p"><a href="/manual"> マニュアルページ</a></p>
          </div>
        </div>
        <div class="col-xs-4 footer-col">
          <div class="">
            <h5 class="footer-h">サイトマップ</h5>
            <p class="footer-p"><a href="/"> トップ</a></p>
            <p class="footer-p"><a href="/faq"> よくある質問</a></p>
            <p class="footer-p"><a href="/about"> カレレポについて</a></p>
            <p class="footer-p"><a href="/privacy"> プライバシーポリシー</a></p>
          </div>
        </div>
      </div>
      <div class="col-xs-12 dark-blue">
        <div class="col-xs-4 footer-col cright">
          © Copyright 2019 | Hiro Mato | All Rights Reserved.
        </div>
      </div>
    </div>
  </section>
  @yield('before-script')
  <script src="/js/app.js"></script>
  <script src="/js/jquery-ui.js"></script>
  <script src="/js/jquery.datetimepicker.full.js"></script>
  @yield('script')
</body>
</html>
