 <?php
class Validate
{
	public $errors = [];
	public $required;


	public function init($string,$alias){
		$this->string = $string;
		$this->alias = $alias;
		$this->empty = $this->is_empty();

		return $this;
	}
	public function min($min){
		$this->min = $min;
		if(!$this->empty && strlen($this->string) < $this->min){
				$this->errors[] = $this->alias." must have minimum ".$this->min.' characters';
		}
		return $this;

	}
	public function length($length){
		$this->length = $length;
		if(!$this->empty && strlen($this->string) != $this->length){
				$this->errors[] = $this->alias." must have ".$this->length.' characters';
		}
		return $this;
	}
	public function email(){
		if(!$this->empty && filter_var($this->string, FILTER_VALIDATE_EMAIL) == false){
				$this->errors[] = $this->alias." is not valid";
		}
		return $this;
	}
	public function number(){
		$pattern = "/^[0-9]*$/";		
		if(!$this->empty && !preg_match($pattern, $this->string)){				
					$this->errors[] = $this->alias." is not valid";
		}
		return $this;
	}
	public function text(){
		$pattern = "/^[a-zA-Z]*$/";		
		if(!$this->empty && !preg_match($pattern, $this->string)){				
					$this->errors[] = $this->alias." is not valid";
		}
		return $this;
	}

	public function compare($value,$label){
			
		if(!$this->empty && $this->string != $value){				
			$this->errors[] = $label." is not match with ".strtolower($this->alias);
		}
		return $this;
	}
	public function varchar(){
		$pattern = "/^[a-zA-Z0-9\s]*$/";		
		if(!$this->is_empty() && !preg_match($pattern, $this->string)){				
					$this->errors[] = $this->alias." is not valid";
		}
		return $this;
	}
	public function is_empty(){
		$status = false;
		if(empty($this->string)){
				$this->errors[] = $this->alias." is required";
				$status = true;
		}

		return $status;
	}
}