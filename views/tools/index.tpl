{use class="yii\helpers\Url"}
{use class="app\assets\AppAsset"}
{AppAsset::addScript($this,'/js/tools.js', 2)}
{AppAsset::addCss($this,'/css/tools.css')}

<div id="tool_main" class="tool-main">
	<div class="result clear" id="result-content"></div>
	<div class="actions text-left">
		<button class="btn btn-primary btn-sm" data-action="ChangeJson">JSON转换</button> 
		<button class="btn btn-primary btn-sm" data-action="ShowTime">时间戳转换</button> 
		<button class="btn btn-primary btn-sm" data-action="DiffData">信息比对</button> 
		<button class="btn btn-primary btn-sm" data-action="Qrcode">二维码生成</button> 
		<button class="btn btn-primary btn-sm" data-action="LinkChange">链接转义</button> 
		<button class="btn btn-primary btn-sm" data-action="ClearSame">去重</button>
		<button class="btn btn-primary btn-sm" data-action="Sort">排序[正]</button>
		<button class="btn btn-primary btn-sm" data-action="KSort">排序[反]</button>
	</div>
	<div class="row edit-area">
		<div class="col-xs-6">
			<textarea class="form-control" id="texta" rows="26" placeholder="Data A"></textarea>
		</div>
		<div class="col-xs-6">
			<textarea class="form-control" id="textb" rows="26" placeholder="Data B"></textarea>
		</div>
	</div>
</div>
<script type="text/javascript">
	var CONFIG = {
		"type" : "funs",
		"ChangeJson" : "{Url::to(['tools/change-json'])}",
		"ShowTime" : "{Url::to(['tools/show-time'])}",
		"DiffData" : "{Url::to(['tools/diff-data'])}",
		"Qrcode" : "{Url::to(['tools/qrcode'])}",
		"LinkChange" : "{Url::to(['tools/link-change'])}",
		"ClearSame" : "{Url::to(['tools/clear-same'])}",
		"Sort" : "{Url::to(['tools/sort'])}",
		"KSort" : "{Url::to(['tools/k-sort'])}",
	};	
</script>