<?php  

class Text
{
	private $csource;		//obj
	
	function __construct($param)
	{
		$this->csource = $param;
	}
	
	
	//seperate from words
	private function sepTexts()
	{
		$textexp = $this->csource->xpath_exps['text']['text_exp'];	//get text expression
		$texts = $this->csource->xpath->query($textexp);	//parse
		return $texts;
	}

	//show 
	public function listAll()
	{

		$texts = $this->sepTexts();
		//to show
		foreach($texts as $text)
		{
			echo '<p>';
			echo $text->nodeValue;
			echo '</p>';
		}
	}

}


?>
