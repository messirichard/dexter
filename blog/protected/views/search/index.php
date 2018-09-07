<div class="content-inside-about prelatif">
	<div class="clear h140"></div>
	<div class="prelatif container padding-left-30">
		<div class="left breadcumb">
			<a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">Home</a> 
			&gt; <b>Search</b>
		</div>
		<div class="clear height-10"></div>
		<div class="clear"></div>
	</div>
	<div class="lines-green"></div>
	<div class="prelatif container margin-left-30">
		<div class="clear height-25"></div>

		<!-- /. start left content -->
		<div class="left w257 left-content">
			<div class="inside w232">
				<div class="t-nws-detail text-gothic"><b>Articles & Publication Index</b></div>
				<div class="clear height-10"></div>
				<div class="menu-left-inscontent">
					<ul>
						<?php foreach ($dataSub as $key => $value): ?>
							<li><a href="<?php echo CHtml::normalizeUrl(array('/artikel/detail', 'id'=>$value->id, 'url'=>Slug::create($value->title))); ?>">
								<?php echo $value->title ?>
								</a>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<!-- /. End left content -->
		
		<!-- /. start right content -->
		<div class="left w842 right-content">
			<div class="text-content inside det-articles">
				<h1 class="title-toppages"><font style="font-weight: normal;">Search</font></h1>
				<div class="clear height-20"></div>
					
<div id='cse' style='width: 100%;'>Loading</div>
<script src='//www.google.com/jsapi' type='text/javascript'></script>
<script type='text/javascript'>
google.load('search', '1', {language: 'id', style: google.loader.themes.V2_DEFAULT});
google.setOnLoadCallback(function() {
  var customSearchOptions = {};
  var orderByOptions = {};
  orderByOptions['keys'] = [{label: 'Relevance', key: ''} , {label: 'Date', key: 'date'}];
  customSearchOptions['enableOrderBy'] = true;
  customSearchOptions['orderByOptions'] = orderByOptions;
  var customSearchControl =   new google.search.CustomSearchControl('014098021194252895406:j21ckos3apc', customSearchOptions);
  customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
  var options = new google.search.DrawOptions();
  options.enableSearchResultsOnly();
  options.setAutoComplete(true);
  customSearchControl.draw('cse', options);
  function parseParamsFromUrl() {
    var params = {};
    var parts = window.location.search.substr(1).split('&');
    for (var i = 0; i < parts.length; i++) {
      var keyValuePair = parts[i].split('=');
      var key = decodeURIComponent(keyValuePair[0]);
      params[key] = keyValuePair[1] ?
          decodeURIComponent(keyValuePair[1].replace(/\+/g, ' ')) :
          keyValuePair[1];
    }
    return params;
  }
  var urlParams = parseParamsFromUrl();
  var queryParamName = 'q';
  if (urlParams[queryParamName]) {
    customSearchControl.execute(urlParams[queryParamName]);
  }
}, true);
</script>
<style type='text/css'>
  .gsc-control-cse {
    font-family:  'Century Gothic',"Didact Gothic",Arial, sans-serif;
    border: none;
    background-color: transparent;
    padding: 0px;
  }
  .gsc-control-cse .gsc-table-result {
    font-family:  'Century Gothic',"Didact Gothic",Arial, sans-serif;
  }
  input.gsc-input, .gsc-input-box, .gsc-input-box-hover, .gsc-input-box-focus {
    border-color: #D9D9D9;
  }
  input.gsc-search-button, input.gsc-search-button:hover, input.gsc-search-button:focus {
    border-color: #666666;
    background-color: transparent;
    background-image: none;
    filter: none;

  }
  .gsc-tabHeader.gsc-tabhInactive {
    border-color: #FF9900;
    background-color: transparent;
  }
  .gsc-tabHeader.gsc-tabhActive {
    border-color: #E9E9E9;
    background-color: transparent;
    border-bottom-color: #FF9900
  }
  .gsc-tabsArea {
    border-color: #FF9900;
  }
  .gsc-webResult.gsc-result, .gsc-results .gsc-imageResult {
    border: none;
    background-color: transparent;
  }
  .gsc-webResult.gsc-result:hover, .gsc-imageResult:hover {
    border: none;
    background-color: transparent;
  }
  .gs-webResult.gs-result a.gs-title:link, .gs-webResult.gs-result a.gs-title:link b, .gs-imageResult a.gs-title:link, .gs-imageResult a.gs-title:link b  {
    color: #0000CC;
  }
  .gs-webResult.gs-result a.gs-title:visited, .gs-webResult.gs-result a.gs-title:visited b, .gs-imageResult a.gs-title:visited, .gs-imageResult a.gs-title:visited b {
    color: #0000CC;
  }
  .gs-webResult.gs-result a.gs-title:hover, .gs-webResult.gs-result a.gs-title:hover b, .gs-imageResult a.gs-title:hover, .gs-imageResult a.gs-title:hover b {
    color: #0000CC;
  }
  .gs-webResult.gs-result a.gs-title:active, .gs-webResult.gs-result a.gs-title:active b, .gs-imageResult a.gs-title:active, .gs-imageResult a.gs-title:active b {
    color: #0000CC;
  }
  .gsc-cursor-page {
    color: #0000CC;
  }
  a.gsc-trailing-more-results:link {
    color: #0000CC;
  }
  .gs-webResult .gs-snippet, .gs-imageResult .gs-snippet, .gs-fileFormatType {
    color: #000000;
  }
  .gs-webResult div.gs-visibleUrl, .gs-imageResult div.gs-visibleUrl {
    color: #008000;
  }
  .gs-webResult div.gs-visibleUrl-short {
    color: #008000;
  }
  .gs-webResult div.gs-visibleUrl-short  {
    display: none;
  }
  .gs-webResult div.gs-visibleUrl-long {
    display: block;
  }
  .gs-promotion div.gs-visibleUrl-short {
    display: none;
  }
  .gs-promotion div.gs-visibleUrl-long  {
    display: block;
  }
  .gsc-cursor-box {
    border-color: #FFFFFF;
  }
  .gsc-results .gsc-cursor-box .gsc-cursor-page {
    border-color: #E9E9E9;
    background-color: transparent;
    color: #0000CC;
  }
  .gsc-results .gsc-cursor-box .gsc-cursor-current-page {
    border-color: #FF9900;
    background-color: transparent;
    color: #0000CC;
  }
  .gsc-webResult.gsc-result.gsc-promotion {
    border-color: #336699;
    background-color: transparent;
  }
  .gsc-completion-title {
    color: #0000CC;
  }
  .gsc-completion-snippet {
    color: #000000;
  }
  .gs-promotion a.gs-title:link,.gs-promotion a.gs-title:link *,.gs-promotion .gs-snippet a:link  {
    color: #0000CC;
  }
  .gs-promotion a.gs-title:visited,.gs-promotion a.gs-title:visited *,.gs-promotion .gs-snippet a:visited {
    color: #0000CC;
  }
  .gs-promotion a.gs-title:hover,.gs-promotion a.gs-title:hover *,.gs-promotion .gs-snippet a:hover  {
    color: #0000CC;
  }
  .gs-promotion a.gs-title:active,.gs-promotion a.gs-title:active *,.gs-promotion .gs-snippet a:active {
    color: #0000CC;
  }
  .gs-promotion .gs-snippet, .gs-promotion .gs-title .gs-promotion-title-right, .gs-promotion .gs-title .gs-promotion-title-right * {
    color: #000000;
  }
  .gs-promotion .gs-visibleUrl,.gs-promotion .gs-visibleUrl-short  {
    color: #008000;
  }
  table.gsc-above-wrapper-area-container{
  	margin-bottom: 0px;
  }
  table.gsc-above-wrapper-area-container th, table.gsc-above-wrapper-area-container td {
  	padding: 0px;
  }
  .gsc-result-info{
  	padding: 0px;
  }
	.gsc-selected-option-container{
		min-width: auto;
		width: 150px !important;
	}
	.gsc-resultsHeader{
		display: none;
	}
	.gcsc-branding{
		display: none;
	}
	.gsc-results{
		width: 100%;
	}
	.gsc-thumbnail-inside{
		padding-left: 0px;
	}
	.gsc-url-top{
		padding-left: 0px;
	}
</style>

				<div class="clear height-35"></div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<!-- /. End right content -->

		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
<div class="clear"></div>
		<div class="back-bottom-fcs-grey"></div>