<?php
//$videoUrl = "http://www.youtube.com/v/7bcV-TL9mho?version=3&f=videos&app=youtube_gdata&autoplay=1";
	require_once '../../GData/library/Zend/Loader.php';
	Zend_Loader::loadClass('Zend_Gdata_YouTube');
	//$searchTerm = $_POST['searchTerm'];
    //$startIndex = $_POST['startIndex'];
    //$maxResults = $_POST['maxResults'];
	$feed = getVideo($_POST['videoId']);
	
	foreach($feed as $entry){
		
		$videoUrl = "http://www.youtube.com/v/".$entry->getVideoId()."?version=3&f=videos&app=youtube_gdata";
		
		echo '<object width="100%" height="100%">
			<param name="movie" value="'.$entry->getVideoId().'"&autoplay=1"></param>
			<param name="wmode" value="transparent"></param>
			<embed src="'.$videoUrl.'"&autoplay=1" type="application/x-shockwave-flash" wmode="transparent"
			width=100%" height="100%"></embed>
			</object>';		
	}
	
	function getVideo($searchTerm){
		$yt = new Zend_Gdata_YouTube();
		$query = $yt->newVideoQuery();
		$query->setQuery($searchTerm);
		$query->setStartIndex(0);
		$query->setMaxResults(1);
		//$query->setFeedType('most recent');
		return $yt->getVideoFeed($query);
	}
	

?>