<?php

/**
* @name: ParseJsonManager
* @author: Hari Ramamurthy <info@harisinfo.co.uk>
* @since: 2012/10/12
*/




class ParseJsonManager
{   	
	
	function ParseJsonManager( $request )
	{
		$this->request = $request;
		
		if( $request == 'recent' )
		{			
			$this->jsonString = file_get_contents( 'http://www.harisinfo.co.uk' ); //http://uk.madbid.com/json/site/load/closed/recently/
		}
		else
		{			
			$this->jsonString = file_get_contents( 'http://uk.madbid.com/json/site/load/future/' );
		}
	}
	
	
	function init()
	{
		$a = json_decode( $this->jsonString, TRUE );
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
				
		if( $this->request == 'recent' )
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

?>