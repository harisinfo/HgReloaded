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
	
	$meta_description[ 'win-penny-auctions' ] = 'An independent unbiased resource dedicated to reviewing penny auctions available in the 
													UK / European Union and a dedicated platform providing tips, strategies and best promotional 
													offers available on various pay to bid online auction sites';
	$meta_keywords[ 'win-penny-auctions' ] = 'Penny Auctions review, MadBid Scam, Beezid Review, Beezid Scam, How to win penny auctions, penny auction tips';
	$meta_title[ 'win-penny-auctions' ] = 'Win Penny Auctions - Home';
	
	
	$meta_description[ 'penny-auction-explained' ] = 'Penny Auctions Explained';
	$meta_keywords[ 'penny-auction-explained' ] = 'Penny Auctions Explained, Penny Auctions review, MadBid Scam, Beezid Review, Beezid Scam, 
													How to win penny auctions, penny auction tips';
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Lang" content="en">
<meta name="author" content="ian.davis@winpennyauctions.co.uk">
<meta name="description" content="<?php echo $meta_description[ $page_keyword ]; ?>">
<meta name="keywords" content="<?php echo $meta_keywords[ $page_keyword ]; ?>">
<meta name="creation-date" content="01/12/2012">
<meta name="revisit-after" content="7 days">
<title><?php echo $meta_title[ $page_keyword ]; ?></title>
</head>
<body>

<?php 
include_once( 'topnav.php' ); 
include_once( "templates/{$pages[ $page_keyword ]}" ); 
?>

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