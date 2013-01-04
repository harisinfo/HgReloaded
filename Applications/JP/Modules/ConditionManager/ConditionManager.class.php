<?php

class ConditionManager
{    
	private $o;
	private $request;
	private $response;
	private $module = 'condition';
	private $validateCondition = 'validateConditionManager';

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
		$this->showConditionManager();			
		return $this->response;
	}
		
	
	private function showConditionManager()
	{
		$this->getConditionRelatedQuestions();
		
		/*if(isset($request['search']['ticket'])===true)
		{
			$validate_ticket = validate_ticket($request['search']['ticket']);
			
			if($validate_ticket['result']==true)
			{
				$validate_function = $this->validateCondition;
				
				if(method_exists($this, $validate_function) === true)
				{
					$errors = array();
					$errors = $this->$validate_function($response, $request);
					
					if($errors['error_found']===true)
					{
						$response = FormManager::saveFormResponse($request, $response);
						$response['errors'] = $errors;
					}
					else
					{
						
						FormManager::saveForm($request, $response, $this->template);
						exit;
					}
				}
				else
				{
					die_with_header(500, "Bad Request");
				}
			}
			else
			{
				die_with_header(500, "Bad Request");
			}
		}*/
		
	}
	
	
	private function validateConditionManager($questions, $request)
	{
		$this->response[ $this->module ]['error_found'] = false;
		$answers = array();
				
		foreach($questions['question_id'] as $key => $value)
		{
			if($questions['question_required'][$key]==1)
			{
				unset($answers);
				$answer_key = "answer_".$key;
				$more_info_key = "more_info_".$key;
				// hook for date fields
				
				if($key==23)
				{
					$answer_key_dd = "answer_dd_".$key;
					$answer_key_mm = "answer_mm_".$key;
					$answer_key_yyyy = "answer_yyyy_".$key;
					
					$answers['answer']['dd_'.$key] = $request['search'][$answer_key_dd];
					$answers['answer']['mm_'.$key] = $request['search'][$answer_key_mm];
					$answers['answer']['yyyy_'.$key] = $request['search'][$answer_key_yyyy];
				}
				
				$answers['answer'][$key] = $request['search'][$answer_key];
				$answers['more_info'][$key] = $request['search'][$more_info_key];
				$answers['template'][$key] = $questions['question_template'][$key];
				
				$validation_response = array();
				$validation_response = FormManager::validateForm($answers); // removed ,$response
				
				$response['error_flag'][$key] = $validation_response['error_flag'];
				$response['error_message'][$key] = $validation_response['error_message'];				
				
				if($validation_response['error_flag']==true)
				{
					$response['error_found'] = true;
				}
			}
		}
		
		return $response;
	}
	
	
	private function saveConditionManager($request)
	{
		
	}		
	
	public function getConditionRelatedQuestions()
	{
		
		$sql = "SELECT medical_condition.* , medical_condition_question.* , question.* 
				FROM medical_condition AS medical_condition 
				LEFT JOIN `medical_condition_question` AS medical_condition_question ON ( medical_condition_question.medical_condition_id = medical_condition.medical_condition_id) 
				LEFT JOIN `question` AS question ON ( question.question_id = medical_condition_question.question_id) ";
				
		$where = " WHERE medical_condition_question.medical_condition_id = " . intval($this->request['_request']['condition_id']);
		$where .= " AND medical_condition_question.show_medical_condition_question = 1 ";
		$where .= " AND medical_condition_question.medical_condition_question_group =  " . MEDICAL_CONDITION_QUESTION_SPECIFIC;
		$order_by = " ORDER BY medical_condition_question.sort_order ASC";
		$sql = $sql . $where . $order_by;
		$result = $this->o->query( $sql );
		
		$n = $result->num_rows;
		
		if( $n > 0 )
		{
			$this->response[ $this->module ]['results'] = true;
			$this->response[ $this->module ][ 'condition_id' ] = intval( $this->request[ '_request' ][ 'condition_id' ] );
			
			$this->response[ $this->module ][ 'ticket' ] = encrypt( $this->module ."_" . __SITE_IDENTIFIER . "_" . 
									time() . "_" . intval( $this->request[ '_request' ][ 'condition_id' ] ), KEYHASH );
			
			$field_locale = "question_text_" . DEFAULT_LABEL;
			$field_condition_locale = "medical_condition_label_" . DEFAULT_LABEL;
			
			while( $row = $result->fetch_array( MYSQLI_ASSOC ) )
			{
				$this->response[ $this->module ]['condition_name'] = $row[$field_condition_locale];
				$this->response[ $this->module ]['question_id'][$row['question_id']] = $row['question_id'];
				$this->response[ $this->module ]['question_text_default'][$row['question_id']] = $row[$field_locale];
				$this->response[ $this->module ]['question_template'][$row['question_id']] = $row['question_template'];
				$this->response[ $this->module ]['question_required'][$row['question_id']] = $row['flag_required'];
				$this->response[ $this->module ]['question_default_selection'][$row['question_id']] = $row['default_selection'];
			}
			
		}
		
		//return $this->response;
	}
	
	
	private function getConditions($request=NULL)
	{
		global $medical_condition_label_table, $treatment_label_table, $connection;
		
		$medical_condition_label_table_lang = $medical_condition_label_table . "_" . DEFAULT_LABEL;
		$treatment_label_table_lang = $treatment_label_table . "_" . DEFAULT_LABEL;
		
		$sql = "SELECT mc.medical_condition_id, mc." . $medical_condition_label_table . ",  " . 
				"mc." . $medical_condition_label_table_lang . ", " . 
				"t.treatment_id, t." . $treatment_label_table . ", t." . $treatment_label_table_lang .
				"FROM medical_condition AS mc " . 
				"LEFT JOIN treatment AS t ON (t.treatment_id = mc.treatment_id) ";
				
		$where = "WHERE mc.medical_condition_id >= 1";
		
		if($request!=NULL)
		{
			// Check conditions
			if( isset($request['medical_condition_id']) === TRUE && is_numeric($request['medical_condition_id']) === TRUE )
			{
				$where .= " AND mc.medical_condition_id = " . intval( $request['medical_condition_id'] );
			}
			
			if( isset($request['treatment_id']) === TRUE && is_numeric($request['treatment_id']) === TRUE )
			{
				$where .= " AND t.treatment_id = " . intval( $request['treatment_id'] );
			}
			
			if( isset($request['is_admin']) === FALSE || is_numeric($request['is_admin']) === FALSE  )
			{
				// hide if not admin
				$where .= " AND mc.flag_hide = 0 AND t.flag_hide = 0";
			}
			
		}
				
		$order_by = "ORDER BY mc.sort_order, t.sort_order ASC";
		$sql = $sql . $where . $order_by;
		//$result = mysql_query($sql) or db_die($sql);
		$result = $connection->query($sql);
				
		while($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			$response['medical_condition_id'][ $row['medical_condition_id'] ] = $row['medical_condition_id'];
			$response['treatment_id'][ $row['medical_condition_id'] ][ $row['treatment_id'] ] = $row['treatment_id'];
			
			$response['medical_condition_label'][ $row['medical_condition_id'] ] = $row['medical_condition_label'];
			$response['treatment_label'][ $row['medical_condition_id'] ][ $row['treatment_id'] ] = $row['treatment_label'];
			
			$response['medical_condition_label_lang'][ $row['medical_condition_id'] ] = 
			$row[$medical_condition_label_table_lang];
			
			$response['treatment_label_lang'][ $row['medical_condition_id'] ][ $row['treatment_id'] ] = 
			$row[$treatment_label_table_lang];
			
			$response['medical_condition_hide'][ $row['medical_condition_id'] ]  = $row['flag_hide_medical_condition'];
			$response['treatment_hide'][ $row['treatment_id'] ]  = $row['flag_hide_treatment'];
		}
		
		return $response;
	}
	
    
}
