<?php

/**
* @name: ParseJsonManager
* @author: Hari Ramamurthy <info@harisinfo.co.uk>
* @since: 2012/10/12
*/

error_reporting(E_ALL);
ini_set("display_errors", 1);


final class ParseJsonManager
{   	
	protected static $jsonString = 'localhost';
	protected static $auctions = array();
	protected static $request;
	
	public function __construct( $request )
	{
		ParseJsonManager::$request = $request;
		
		if( $request == 'recent' )
		{			
			ParseJsonManager::$jsonString = file_get_contents( 'http://uk.madbid.com/json/site/load/closed/recently/' );
		}
		else
		{			
			ParseJsonManager::$jsonString = file_get_contents( 'http://uk.madbid.com/json/site/load/future/' );
		}
	}
	
	
	public static final function init()
	{
		echo "here";
		$a = json_decode( ParseJsonManager::$jsonString, TRUE );
		var_dump( $a );
		$auctions = $a[ 'response' ][ 'items' ];
		foreach( $auctions as $key => $value )
		{
			$b[ $auctions[ $key ][ 'auction_id' ] ][ 'auction_id' ] = $auctions[ $key ][ 'auction_id' ];
			$b[ $auctions[ $key ][ 'auction_id' ] ][ 'product_id' ] = $auctions[ $key ][ 'product_id' ];
			$b[ $auctions[ $key ][ 'auction_id' ] ][ 'title' ] = $auctions[ $key ][ 'title' ];
			$b[ $auctions[ $key ][ 'auction_id' ] ][ 'credit_cost' ] = $auctions[ $key ][ 'auction_data' ][ 'credit_cost' ];
			$b[ $auctions[ $key ][ 'auction_id' ] ][ 'highest_bid' ] = $auctions[ $key ][ 'auction_data' ][ 'last_bid' ][ 'highest_bid' ];
			$b[ $auctions[ $key ][ 'auction_id' ] ][ 'date_opens' ] = $auctions[ $key ][ 'auction_data' ][ 'date_opens' ];
			$b[ $auctions[ $key ][ 'auction_id' ] ][ 'date_bid' ] = $auctions[ $key ][ 'auction_data' ][ 'last_bid' ][ 'date_bid' ];
		}
				
		if( ParseJsonManager::$request == 'recent' )
		{
			$table = 'auction_data';
		}
		else
		{
			$table = 'auction_data_future';
		}
		
		foreach( $b as $k => $v )
		{
			$string = "('" . implode("','", $b[ $k ] ) . "'); ";
			echo "INSERT IGNORE INTO {$table} (auction_id, product_id, title, credit_cost, highest_bid, date_opens, date_bid ) VALUES $string <br /><br />";
		}
	}
}

$p = new ParseJsonManager( $_GET[ 'rtype' ] );
$p->init();