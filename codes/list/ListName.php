<?php

class Listname
{
	private $csource;		//obj
	
	function __construct($param)
	{
		$this->csource = $param;
	}

	//get branch_names to array
	private function branch_name()
	{
		$namexp = $this->csource->xpath_exps['list']['name_exp'];	//get name expression
		$names = $this->csource->xpath->query($namexp);		//parse
		return $names;
	}

	//get branch_urls to array
	private function branch_url()
	{
		$urlexp = $this->csource->xpath_exps['list']['url_exp'];	//get url expression
		$urls = $this->csource->xpath->query($urlexp);		//parse
		return $urls;
	}

	//get branch_times to array()
	private function branch_time()
	{
		$timexp = $this->csource->xpath_exps['list']['time_exp'];	//get time expression
		$times = $this->csource->xpath->query($timexp);	//parse
		return $times;
	}

	//main to deal
	public function listAll()
	{
		$names = $this->branch_name();
		$urls = $this->branch_url();
		$times = $this->branch_time();
		//show the list
		$num = 0;
		$tourl = $this->csource->xpath_exps['list']['tourl'];
		$urlhead = $this->csource->xpath_exps['list']['urlhead'];
		foreach($urls as $url)
		{
			echo '<ul><li><a target=_blank; href="';
			echo $tourl . $urlhead . $url->nodeValue . '">';
			echo $names->item($num)->nodeValue . '</a>  ';
			echo $times->item($num)->nodeValue;
			echo '</li></ul>';
			$num++;
		}
	}

}


?>
