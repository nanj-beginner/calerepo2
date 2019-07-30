<div class="panel panel-default">
    <a class="list-group-item collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse21"
        id="toggle-class">
        分類の設定
    </a>
    <div id="collapse-categorize" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="row well">
                <div class="col-sm-4">
                    <input type="text" id="target-title" maxlength="30" class="form-control" placeholder="例:MTG" />
                </div>
                <span for="targetTitle" class="col-sm-3 targetLabel">を含むタイトル</span>
                <span for="targetTitle" class="col-sm-1 targetLabel">分類</span>
                <div class="col-sm-3">
                    <input type="text" id="target-category" maxlength="30" class="form-control" placeholder="例:ミーティング" />
                </div>
                <button class="btn btn-default" id="category-set">設定</button></span>
            </div>
            <ul class="categories" id="registered">
            </ul>
        </div>
    </div>
</div>
<br />
<button class="btn btn-primary" id="show_graph">円グラフ表示</button>
<hr />
<div id="chartContainer" style="height: 400px; width: 100%;"></div>