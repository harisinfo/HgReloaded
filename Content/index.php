<?php
	ob_start();
	global $pages;
	
	if( isset( $_GET[ 'page_keyword' ] ) === TRUE )
	{
		$page_keyword = addslashes( $_GET[ 'page_keyword' ] );	
	}
	else
	{
		$page_keyword = 'win-penny-auctions';
	}
	
	
	$pages[ 'win-penny-auctions' ] = 'index.html';
	$pages[ 'penny-auction-explained' ] = 'penny-auction-explained.html';
	$pages[ 'penny-auction-reviews' ] = 'penny-auction-reviews.html';
	$pages[ 'penny-auction-faqs' ] = 'penny-auction-faqs.html';
	$pages[ 'penny-auction-offer-codes' ] = 'penny-auction-offer-codes.html';
	$pages[ 'penny-auction-bidding-strategies' ] = 'penny-auction-bidding-strategies.html';
	$pages[ 'penny-auction-top-10-tips' ] = 'penny-auction-top-10-tips.html';
	$pages[ 'about-my-penny-auction-experience' ] = 'about-my-penny-auction-experience.html';
	$pages[ 'contact' ] = 'contact.html';
	
	// meta
	
	$meta_description[ 'win-penny-auctions' ] = 'An independent unbiased resource dedicated to reviewing penny auctions available in the UK / European Union and a dedicated platform providing tips, strategies and best promotional offers available on various pay to bid online auction sites';
	$meta_keywords[ 'win-penny-auctions' ] = 'Penny Auctions review, MadBid Scam, Beezid Review, Beezid Scam, How to win penny auctions, penny auction tips';
	$meta_title[ 'win-penny-auctions' ] = 'How to Win Penny Auctions';
	
	
	$meta_description[ 'penny-auction-explained' ] = 'Penny Auctions Explained';
	$meta_keywords[ 'penny-auction-explained' ] = 'Penny Auctions Explained, Penny Auctions review, MadBid Scam, Beezid Review, Beezid Scam, How to win penny auctions, penny auction tips';
	$meta_title[ 'penny-auction-explained' ] = 'How penny auctions work';
	
	
	$meta_description[ 'penny-auction-reviews' ] = 'Reviews for Beezid and MadBid';
	$meta_keywords[ 'penny-auction-reviews' ] = 'Beezid under the microscope, MadBid reviews';
	$meta_title[ 'penny-auction-reviews' ] = 'Reviews for MadBid and Beezid';
	
	if( !isset( $meta_description[ $page_keyword ] ) === TRUE )
	{
		$meta_description[ $page_keyword ] = ucwords( strtolower( str_replace("-", " ", $page_keyword ) ) );
	}
	
	if( !isset( $meta_title[ $page_keyword ] ) === TRUE )
	{
		$meta_title[ $page_keyword ] = ucwords( strtolower( str_replace("-", " ", $page_keyword ) ) );
	}
	
	if( !isset( $meta_keywords[ $page_keyword ] ) === TRUE )
	{
		$meta_keywords[ $page_keyword ] = ucwords( strtolower( str_replace("-", " ", $page_keyword ) ) );
	}
	
	
	
	if( isset( $pages[ $page_keyword ] ) === TRUE )
	{
		// do something
	}
	else
	{
		exit;
	}
	
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="Lang" content="en">
<meta name="author" content="ian.davis@howtowinpennyauctions.co.uk">
<meta name="description" content="<?php echo $meta_description[ $page_keyword ]; ?>">
<meta name="keywords" content="<?php echo $meta_keywords[ $page_keyword ]; ?>">
<meta name="creation-date" content="01/12/2012">
<meta name="revisit-after" content="7 days">
<title><?php echo $meta_title[ $page_keyword ]; ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="content">
<?php 
include_once( 'topnav.php' ); 
?>
<div id="topbanner" style="float: right; margin-top: -113px;">
<a href="http://click.linksynergy.com/fs-bin/click?id=U0BEgoGrFzE&offerid=260860.10000189&type=4&subid=0&LSNSUBSITE=subsite"><IMG alt="Holiday Auction Shopping at Beezid.com" border="0" src="http://www.beezid.com/img/aff/banners/animated_wpfp_468x60_3.gif"></a><IMG border="0" width="1" height="1" src="http://ad.linksynergy.com/fs-bin/show?id=U0BEgoGrFzE&bids=260860.10000189&type=4&subid=0">
</div>
<div style="clear:both;"></div>

<div id="rightbanner" style="float: right; margin: 4px; margin-top: 85px;">
<a href="http://click.linksynergy.com/fs-bin/click?id=U0BEgoGrFzE&offerid=260860.10000144&type=4&subid=0&LSNSUBSITE=subsite"><IMG alt="Get up to 98% OFF everything at Beezid penny auction" border="0" src="http://www.beezid.com/img/aff/banners/up-to-98-percent-off-300x250.gif"></a><IMG border="0" width="1" height="1" src="http://ad.linksynergy.com/fs-bin/show?id=U0BEgoGrFzE&bids=260860.10000144&type=4&subid=0">
</div>

<?php
include_once( "templates/{$pages[ $page_keyword ]}" ); 
?>
</div>



<div id="skyscrapper_left" style="position:absolute; top: 7px; right: 45px; height: 500px; width: auto;">
<a href="http://click.linksynergy.com/fs-bin/click?id=U0BEgoGrFzE&offerid=260860.10000143&type=4&subid=0&LSNSUBSITE=subsite"><IMG alt="Holiday Penny Auction Shopping Deals on Beezid.com" border="0" src="http://www.beezid.com/img/aff/banners/wpfp_120x600.jpg"></a><IMG border="0" width="1" height="1" src="http://ad.linksynergy.com/fs-bin/show?id=U0BEgoGrFzE&bids=260860.10000143&type=4&subid=0">
</div>

<div id="skyscrapper" style="position:absolute; top: 7px; left: 45px; height: 500px; width: auto;">
<a href="http://click.linksynergy.com/fs-bin/click?id=U0BEgoGrFzE&offerid=260860.10000098&type=4&subid=0&LSNSUBSITE=subsite"><IMG alt="Beezid" border="0" src="http://www.beezid.com/img/aff/banners/120x600_v7.jpg"></a><IMG border="0" width="1" height="1" src="http://ad.linksynergy.com/fs-bin/show?id=U0BEgoGrFzE&bids=260860.10000098&type=4&subid=0">
</div>

<div id="footer">
<p>
&copy; How to win Penny Auctions 2012 - <?php echo date("Y", time() );?> 
<a href="/penny-auction-explained.html">Penny Auctions Explained</a>
<a href="/about-my-penny-auction-experience.html">About me</a>
<a href="/contact.html">Contact</a>
</p>

</div>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38612621-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>

<?php
	ob_end_flush();
?>