<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<meta name = "viewport" content = "user-scalable = no">
    <meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="google-site-verification" content="RYjIl3WW93ZAZgyPDolFoYF3NPOenfOOvzd0A2DEr3g" />
    <html itemscope itemtype="http://schema.org/Other">
    <meta itemprop="name" content="nextstop.pt">
	<meta itemprop="description" content="A tua festa! Encontra uma festa perto de ti.">
	<meta itemprop="image" content="https://plus.google.com/u/2/117431947481999930682/about?pid=6059986107271460418&amp;oid=117431947481999930682">
    <meta name="msvalidate.01" content="B06D57398B163B00F6BC6B51E1DCF32A" />
   		<!-- Run in full-screen mode. -->
        <meta name="apple-mobile-web-app-capable" content="yes">
 
        <!-- Make the status bar black with white text. -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
 
        <!-- Customize home screen title. -->
        <meta name="apple-mobile-web-app-title" content="Web App">
 
        <!-- Disable phone number detection. -->
        <meta name="format-detection" content="telephone=no">
 
        <!-- Set viewport. -->
       <!-- <meta name="viewport" content="initial-scale=1"> -->
 
        <!-- Prevent text size adjustment on orientation change. -->
        <style>html { -webkit-text-size-adjust: 100%; }</style>
 
    <title>NextStop | A tua festa!</title>
	
	<?php
		$css = array( array('//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css'), array('//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'), array('ink.css'), array('account.css'), array('main.css'), array('main2.css'), array('mobiscroll.custom-2.5.0.min.css'), array('http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css'));
		$js = array( array('jquery.slimscroll.js'), array('jquery.unveil.min.js'), array('mobiscroll.custom-2.5.0.min.js'), array('jQueryRotate.2.2.js'), array('jquery.ui.touch-punch.min.js'), array('tap/jquery.tap.min.js'), array('noty/jquery.noty.js'), array('noty/layouts/bottomCenter.js'), array('noty/themes/default.js'), array('http://cdnjs.cloudflare.com/ajax/libs/jstimezonedetect/1.0.4/jstz.min.js'));
		$this->carabiner->group('custom', array('js'=>$js, 'css'=>$css) );
    	$this->carabiner->display('jqueryui');
    	$this->carabiner->display('custom');
	?>

	<!--[if IE ]>
	<link rel="stylesheet" href="/ink-v1/css/ink-ie.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<![endif]-->
	
	<!--GoogleAnalytics-->
    
    <?php echo $map['js'];?>
    
</head>
<body>
<script>
  		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create', 'UA-40119296-1', 'nextstop.pt');ga('send', 'pageview');
		var centreGot = false;
		$('body').delay('1000').animate({ scrollTop: '0px' }, 'slow'); //simple trick for ios chrome users with fullscreen functionality to see the whole pageh
	</script>
    
<div id="topbar" style="height: 150PX">
	<nav class="ink-navigation ink-collapsible ink-container" style="padding:none;">
		<ul class="menu horizontal flat black" style="width: 100%;text-align: center;">
        	<li id="maplink" style="display:none; float: left;">
            	<div style="padding-top: 42px;height: 108px;">
            		<i class="icon-map-marker icon-4x" style="color:#fff;"></i> <span style="font-size: 50px;"><!--&nbsp Mapa --></span>
                </div>
            </li>
             <li id="backlink" style="display:none; float: left;">
            	<div style="padding-top: 42px;height: 108px;">
            		<i class="icon-chevron-left icon-4x" style="color:#fff;"></i> <span style="font-size: 50px;"><!--&nbsp Mapa --></span>
                </div>
            </li>
			<li id="logoOnBar" style="position: fixed; left:0; display:none;">
				<a href="/mobile/main"><img id="logoNS" src="/imgs/ns_logo.gif" style="height: 150px;" /><span style="color: #fff; font-size: 50px;">&nbsp; Mapa</span></a>
			</li>
            <li id="topbarinfo" style="position: fixed; left:42%; display:none;">
	            <div style="padding-top: 70px;height: 108px;padding-right: 100px;">
				&nbsp;<span id="topbarinfotext" style="color: #fff; font-size: 50px;">Mapa</span></a>
                </div>
			</li>
            <li id="barralink" style="float: right;">
            	<div style="padding-top: 42px;height: 108px;padding-right: 100px;">
            		<span style="font-size: 50px; color:#fff;"><!--Lista &nbsp --></span> <i class="icon-list icon-4x" style="color:#fff;"></i>
                </div>
            </li>
		</ul>
	</nav>
</div>
