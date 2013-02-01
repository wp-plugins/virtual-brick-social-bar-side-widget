<!-- VB Social Bar -->
<div id="socialblock" style="overflow:hidden;">						

	<div id="fbLikeButton" style="float:left; width:49px; overflow:hidden; margin:5px;">
		<fb:like href="<?php the_permalink() ?>" send="true" width="450" show_faces="false"></fb:like>
	</div>
	
	<div id="gPlusContainer" style="float:left; position:relative; margin:4px 5px;">
		<script type="text/javascript">
		  (function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		  })();
		</script>
		<g:plusone size="Standard" class="g-plusone" annotation="none" callback="CMplusone"></g:plusone>
	</div>
	
	<div id="tweetContainer" style=" float:left;  position:relative; margin:6px 5px; ">
		<a href="https://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a>
		<script type="text/javascript" src="https://platform.twitter.com/widgets.js"></script>  
	</div>
	
	<!--
	<div id="pinbutton" style=" float:left;  position:relative; margin:5px;">
		<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>" class="pin-it-button" count-layout="none">
			<img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" />
		</a>
	</div>						
	-->
</div>
<!-- VB Social Bar End -->