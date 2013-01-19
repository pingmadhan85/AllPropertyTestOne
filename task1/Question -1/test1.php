<?php

echo "Input Data - 12,13,14,15,16,17";
echo "<br /><br />";
echo "Output Result";
echo "<br /><br />";

$type = 'Foo';
$obj = new $type(12,13,14,15,16,17); 
$outputArray  = (array) $obj;

echo "<pre>";
print_r($outputArray);
echo "</pre>";

class Foo {
	const MULTIPLETHREE = 'Fizz';
	const MULTIPLEFIVE = 'Buzz';
	
	public $output = array();
	public $result; 
	
	function __construct(  ) {
		
        $args = func_get_args();
        for( $i=0, $n=count($args); $i<$n; $i++ ) {
			$divident3 = $this->processData($args[$i], 3);
			$divident5 = $this->processData($args[$i], 5);
	
			if($divident3)
				$this->result = self::MULTIPLETHREE;
				
			if($divident5)
				$this->result = self::MULTIPLEFIVE;
				
			if(!$divident3 && !$divident5)
				$this->result =$args[$i];
		
			$this->output[] = $this->result;
			 unset($this->result);
		}
		
		return $this->output; 
            
    }
	
	public function processData($number, $divident) {
		$modulus = $number % $divident;
		if($modulus == 0) {
			return true;
		} else {
			return false;
		}
	} 
	
}
?>