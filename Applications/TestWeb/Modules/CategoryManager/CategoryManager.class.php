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
	private $module = 'category';
	
	public function __construct( $request = FALSE, $object = NULL )
	{
		global $loadModules;
		$this->request = $request;
		$this->o = $object;
		$this->response = FALSE;
		
		if( isset( $loadModules[ 'attach' ][ $this->module ] ) === TRUE )
		{
			foreach( $loadModules[ 'attach' ][ $this->module ] as $key => $value )
			{
				$l = TRUE;
				
				if( isset( $loadModules[ 'attach' ][ $value ] ) === TRUE && count( $loadModules[ 'attach' ][ $value ] ) > 0  )
				{
					if( in_array( $this->module, $loadModules[ 'attach' ][ $value ] ) === TRUE )
					{
						$l = FALSE;
					}
				}
				
				if( $l === TRUE )
				{
					$j = @include_once( __APPLICATIONS_ROOT . "/" . $this->request[ '_request' ][ 'application' ] . "/" . __MODULE_DIR . "/" . $loadModules[ 'manager' ][ $value ] . 
											"/" . $loadModules[ 'manager' ][ $value ] . ".class.php" );
										
					if( intval( $j ) == 1 )
					{
						$attachObj = new $loadModules[ 'manager' ][ $value ]( $this->request, $this->o );
						$this->response[ $value ] = $attachObj->init();
					}
					else
					{
						echo "Failed to attach module $value, send silent output to error log <br />\n";
					}
				}
				else
				{
					echo "Failed to attach module $value as it is dependent, send silent output to error log <br />\n";
				}
			}
		}
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