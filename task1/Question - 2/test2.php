<?php

echo "Input Data - 4,5,6,7,8,9,10,11, 12,13,14, 15, 16, 17, 18";
echo "<br /><br />";
echo "Output Result";
echo "<br /><br />";

$type = 'Foo';
$obj = new $type(4,5,6,7,8,9,10,11, 12,13,14, 15, 16, 17, 18); 




class Foo {
	const MULTIPLETHREE = 'Fizz';
	const MULTIPLEFIVE = 'Buzz';
	
	public $tempOutput = array();
	public $finalOutput = array();
	public $output;
	public $outputData;
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
				
			$this->tempOutput[] = $this->result;
				$this->output = array_slice($this->tempOutput, -3, 2, true);
				
			$this->outputData = implode("", $this->output);
	
			if($this->outputData == 'FizzBuzz' || $this->outputData == 'BuzzFizz') 
				$this->result = 'Bazz';

			$this->finalOutput[] = $this->result;
				unset($this->result);
		}
		
		$comma_separated = implode(",", $this->finalOutput);
		echo $comma_separated;
		
		
            
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