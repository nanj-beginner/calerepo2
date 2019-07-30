@extends('layouts.master')

@section('content')

<div class="col-xs-12 main blue">
  <div>
    <h1 class="white text-center">シンプルかつ多機能なGoogleカレンダー日報出力ツール</h1>
    <p class="white text-center">カレレポはGoogleカレンダーでのレポート作成に特化したシンプルなツールです</p>
  </div>
  <div class="auth text-center">
    <a href="{{ $url }}"><button class="btn btn-primary btn-auth">Google認証をしてください</button></a>
    <div id="flickity">
      <div class="report-image">
        <img src="/img/reportImage1.png" width="900" height="400" alt="カレレポ作業画像1" />
      </div>
      <div class="report-image">
        <img src="/img/reportImage2.png" width="900" height="400" alt="カレレポ作業画像2" />
      </div>
      <div class="report-image">
        <img src="/img/reportImage3.png" width="900" height="400" alt="カレレポ作業画像3" />
      </div>
      <div class="report-image">
        <img src="/img/reportImage4.png" width="900" height="400" alt="カレレポ作業画像4" />
      </div>
    </div>
  </div>
</div>

<div class="col-xs-12">
  <div class="container">
    <div class="row second-section">
      <h2 class="text-center">カレレポの機能</h2>
      <div class="col-xs-4">
        <div class="text-center">
          <div class="fa fa-3x fa-book"></div>
          <h3>充実したわかりやすい機能</h3>
          <p class="feature">
          カレレポ独自の４大機能により、気持ちいいほど素早く必要なカレンダーのレポートを出力できます。
          Googleカレンダーを使用した作業効率化にカレレポはぴったりです。カレレポ独自の4大機能については<a href="/about">こちら</a></p>
        </div>
      </div>
      <div class="col-xs-4">
        <div class="text-center">
          <div class="fa fa-3x fa-clock-o"></div>
          <h3>Googleカレンダーの出力に特化</h3>
          <p class="feature">Googleカレンダーの予定をExcel（エクセル）やCSV形式にエクスポートしたい！そんなあなたの期待に応えるために生まれました。カレレポは簡単に予定や作業時間を出力できるため、毎日の仕事が楽しく効率化できます。</p>
        </div>
      </div>
      <div class="col-xs-4">
        <div class="text-center">
          <div class="fa fa-3x fa-diamond"></div>
          <h3>出力のカスタマイズ</h3>
          <p class="feature">あなたのフォーマットにあった出力を簡単なクリックだけでカスタマイズすることができます。さらに、カスタマイズした表示順序やフォーマットは保持されるため、わずらわしさがありません。
            </p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-xs-12 sub-auth">
  <p class="text-center">
    <span style="color:gray">今すぐ使うには</span><br />
    <a href="{{ $url }}"><button class="btn btn-primary btn-auth">Google認証をしてください</button></a>
  </p>
</div>
@endsection

@section('script')
<script>
$('#flickity').flickity();
</script>
@endsection