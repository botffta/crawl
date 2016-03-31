<?php  

class ConHead
{
	public $inipath;
	public $url_target;		//the url of target from GET param
	private $content;
	private $dom;
	private $xpath;
	private $xpath_exps;	//exps of xpath


	function __construct($param)
	{
		//get url target from GET-param
		if( empty($_GET['param']) )
			$this->outgram('get url target failed!');
		else
			$this->url_target = urldecode($_GET['param']);

		$this->set_inipath($param);		//get the xpath expression
		$this->parse_dom();			//get the dom
		$this->parse_xpath();		//get the xpath
	}

	//Error message display
	public function outgram($info)
	{
		$message = 'ERROR: '.$info;
		exit($message);
	}

	//get this content
	public function __get($param)
	{
		if( isset($this->$param) )
			return $this->$param;
		else
			return NULL;
		
	}

	//set the path of ini document
	public function set_inipath($param)
	{
		$this->inipath = $param;
		$this->acquire_exps($this->inipath);
	}

	
	//parse the configuration file
	private function acquire_exps($param)
	{
		//set parse_ini_file second param to true for return Multidimensional array
		if( ($exps=parse_ini_file($param, true)) == FALSE )
			$this->outgram('ini file open failed!');
		else
		{
			$this->xpath_exps = $exps;
			return $this->xpath_exps;
		}
	}

	
	//parse the target dom
	private function parse_dom()
	{
		$contents = $this->acquire_contents($this->url_target);	//get file contents
		$this->dom = new DOMDocument();
		@$this->dom->loadHTML($contents);	//nothing display
	}

	
	//get file contents
	private function acquire_contents($param)
	{
		$param = urldecode($param);	//decode the url
		if( ($contents = file_get_contents($param)) == FALSE)
			$this->outgram('get target file contents failed!');
		$res = mb_convert_encoding($contents, 'HTML-ENTITIES', 'UTF-8');
		return $res;
		//return $contents;
	}


	//parse xpath
	private function parse_xpath()
	{
		$this->xpath = new DOMXPath($this->dom);
	}

}


?>
