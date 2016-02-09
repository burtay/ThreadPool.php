<?php

/*
*	PHP Thread Pool Class
*	Coded By Burtay
*	http://www.burtay.org
*	admin[at]burtay.org
*	@haciburtay
*/


class BurtayThreadPool extends Thread
{
	private $sinif;
	
	public function __construct($sinif)
	{
		$this->sinif = $sinif;
	}
	
	public function run()
	{		
		$this->sinif->calistir();
	}	
}


class Burtay
{
	public function __construct($threadSayisi,BurtayThread $sinif)
	{
		$pool  = new Pool($threadSayisi);
		$is_listesi	= array();
		for($i=1;$i<=$threadSayisi;$i++)
		{
			$is_listesi[] = new burtayThreadPool($sinif);
		}
		foreach($is_listesi as $liste)
		{
			$pool->submit($liste);
		}
		$pool->shutdown();
	}
}
?>
