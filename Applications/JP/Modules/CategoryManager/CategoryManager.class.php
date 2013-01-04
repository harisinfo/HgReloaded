<?php

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
		$this->response = $this->showCategoryManager();
		return $this->response;
	}
	
	
	protected function showCategoryManager()
	{
		$response = array();
		$sql = "SELECT c.*, sc.sub_category_id, sc.sub_category_label, sc.sub_category_name 
				FROM category AS c
				LEFT JOIN sub_category AS sc ON (sc.category_id=c.category_id) ";

		if(isset($this->request['_request']['ui_source'])===TRUE&&$request['_request']['ui_source']!='admin')
		{
			// will think about this later
		}
		else
		{
			$where = "WHERE c.flag_hide=0 AND c.flag_delete=0";
		}
		
		$order_by = " ORDER BY c.sort_order ASC, c.category_label ASC, sc.sub_category_label ASC";
		$sql = $sql . $where . $order_by;
		$result = $this->o->query( $sql );

		while( $row=$result->fetch_array( MYSQLI_ASSOC ) )
		{
			$response['category_id'][$row['category_id']] = $row['category_id'];
			$response['category_label'][$row['category_id']] = $row['category_label'];
			$response['sub_category_id'][$row['category_id']][$row['sub_category_id']] = $row['sub_category_id'];
			$response['sub_category_label'][$row['category_id']][$row['sub_category_id']] = $row['sub_category_label'];
			//$response['sub_category_seo'][$row['category_id']][$row['sub_category_id']] = URLManager::init($row['sub_category_label']);
		}
		
		return $response;
	}

}