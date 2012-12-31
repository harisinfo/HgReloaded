<?php
/**
* @package: CategoryManager
* @author: Hari Ramamurthy <info@harisinfo.co.uk>
* @since: 2012/12/17
*/


class CategoryManager
{
	private $o;
	private $request;
	private $response;
	
	public function __construct( $request = FALSE, $object = NULL )
	{
		$this->request = $request;
		$this->o = $object;
		$this->response = FALSE;
	}
	
	
	public function init()
	{
		return $this->listCategorySubCategory();
	}
	
	
	public function listCategorySubCategory()
	{
		$whereSql = array();
		$whereSql[] = " WHERE c.flag_show = 1 ";
		
		if( isset( $this->request ) === TRUE && count( $this->request ) > 0 )
		{
			if( isset( $this->request[ '_request' ][ 'category_id' ] ) == TRUE )
				$whereSql[] = " c.category_id = " . intval( $this->request[ '_request' ][ 'category_id' ] ) . " ";
				
			if( isset( $this->request[ '_request' ][ 'sub_category_id' ] ) == TRUE )
				$whereSql[] = " sc.category_id = " . intval( $this->request[ '_request' ][ 'sub_category_id' ] ). " ";
				
		}
		
		$sql = "SELECT c.category_id, sc.sub_category_id, c.category_name, c.category_label, sc.sub_category_name, sc.sub_category_label, sc.flag_show AS sub_category_show 
				FROM category AS c 
				LEFT JOIN sub_category AS sc ON (sc.category_id = c.category_id) " ;
		$where = implode( " AND ", $whereSql );
		$order_by = " ORDER BY c.category_name ASC, sc.sub_category_name ASC";
		
		$sql = $sql . $where . $order_by;
				
		$result = $this->o->query($sql);
		$n = $result->num_rows;
		
		if( $n > 0 )
		{
			while( $row=$result->fetch_array( MYSQLI_ASSOC ) )
			{
				$this->response[ 'category_id' ][ $row[ 'category_id' ] ] = $row[ 'category_id' ];
				$this->response[ 'category_name' ][ $row[ 'category_id' ] ] = $row[ 'category_name' ];
				$this->response[ 'category_label' ][ $row[ 'category_id' ] ] = $row[ 'category_label' ];
				
				if( isset( $row[ 'sub_category_show' ] ) === TRUE && intval( $row[ 'sub_category_show' ] ) == 1 )
				{
					$this->response[ 'sub_category_id' ][ $row[ 'category_id' ] ][ $row[ 'sub_category_id' ] ] = $row[ 'sub_category_id' ];
					$this->response[ 'sub_category_name' ][ $row[ 'category_id' ] ][ $row[ 'sub_category_id' ] ] = $row[ 'sub_category_name' ];
					$this->response[ 'sub_category_label' ][ $row[ 'category_id' ] ][ $row[ 'sub_category_id' ] ] = $row[ 'sub_category_label' ];
				}
			}
		}
		
		return $this->response;
	}
	
}