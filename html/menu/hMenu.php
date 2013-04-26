<?php
/* programado por Herson Salinas 2011 */

class hMenu{
	private $file = "";
	private $valid = false;
	private $rawMenu = "";
	private $salida = "";
	private $aLineas;
	private $nombre = "";
	public $cache = false;
	public $rutaCache = "";

	function __construct($archivo = '', $lCache = false, $cRutaCache = ""){
		$this->cache = $lCache;
		$this->rutaCache = $cRutaCache;
		
		if (!empty($archivo)){
			$this->archivo($archivo);
		}
	}

	public function archivo($archivo){
		if(is_file($archivo)){
			$this->file = $archivo;
			$this->rawMenu = $this->t( trim(file_get_contents($archivo)) );
			$this->valid = true;
		}
	}

	public function fromString($srt){
		$this->rawMenu = $this->t( trim($srt) );
		$this->valid = true;
	}

	public function getRaw(){
		return $this->rawMenu;
	}

	public function getMenu($id){
		if($this->cache){
			$nombreCache = $this->rutaCache . $this->file . ".hMenuCache";
			if( is_file($nombreCache) and is_file($this->file) ){
			
				if( filemtime($nombreCache) >= filemtime($this->file) )
				//echo "desde el cache";
				return file_get_contents($nombreCache);
			}
		}
		//echo "desde el archivo";
		
		if (!$this->valid) return "<!-- menu invalido -->";

		$this->nombre = $id;
		$str = str_replace("\r\n", "\n", $this->rawMenu);
		$str = str_replace("\r", "\n", $str);
		
		$arrayT = explode("\n", $str);
		$this->aLineas = array();
		
		foreach($arrayT as $k => $linea){
			if( !empty($linea) and substr(trim($linea),0,1) !='#' ) 
				$this->aLineas[] = $linea;
		}
		$nLineas = count($this->aLineas);

		$nivel = -1;
		for ($n = 0; $n < $nLineas; $n++){
		
			$linea		= $this->aLineas[$n];
			$nivelAnt	= $nivel;
			$nivel		= $this->getNivel($n);
			$nivelSig	= $this->getNivel($n + 1);

			$cont = $this->contenidoLI(trim($linea), $nivel, $nivelSig);
			$this->imprimirUL($n, $nLineas, $nivel, $nivelAnt, $nivelSig, $cont);
		}
		$output = "<div class=\"hmenudiv\" id='$id'>"
			 . "\n<ul class=\"hmenu\">" 
			 . $this->salida
			 . "\n</ul>"
			 . "\n<div class='cleaner'></div>"
			 . "\n</div>";
		
		if($this->cache){
			$file = fopen( $nombreCache, "w+") or $this->error("Error al abrir/crear archivo de cache");
			fwrite($file, $output) or $this->error("Error al escribir en el archivo de cache");
			fclose($file);
		}
		
		return $output;
	}

	private function getNivel($n){
		if ($n < 0 ){
			return -1;
		}
		elseif ($n >= count($this->aLineas) ){
			return 0;
		}else{
			return strlen($this->aLineas[$n]) - strlen(ltrim($this->aLineas[$n]));
		}
	}

	private function imprimirUL($n, $nLineas, $nivel, $nivelAnt, $nivelSig, $cont){		
		static $nCont = 0; 
		$nCont++;

		$enter = "\n";
		$nDiff = abs($nivelSig - $nivel);
		$lUltimo = ($n + 1 == $nLineas);
		$lPrimero = ( $nivelAnt < $nivel );
		
		$idLI = 'hmenu_'.$this->nombre.'_'.$nivel.'_'.$nCont;
		
		$this->salida .= "$enter<li id=\"$idLI\">$cont";
		
		if ($nivelSig > $nivel){
			$this->salida .= $enter.'<ul class="ulsubmenu">';
		}else
		if ($nivelSig == $nivel){
			$this->salida .= "</li>";
		}else
		if ($nivelSig < $nivel){
			$this->salida .= "</li>" . str_repeat("$enter</ul>$enter</li>", $nDiff);
		}
		
	}

	private function contenidoLI($linea, $nivel, $nivelSig){
		$aPartes = explode("\t",$linea);
		$nPartes = count($aPartes);
		
		if($nivel == 0){
			$clase = ' class="menucon"';
		}elseif($nivelSig > $nivel){
			$clase = ' class="elsub"';
		}else{
			$clase = '';
		}
		
		if ($nPartes == 1){
			return "<a href='#'$clase>" . $linea . "</a>";
		}
		else if ($nPartes == 2){
			if (substr(trim($aPartes[1]), 0, 11) == "javascript:"){
				return '<a' . $clase . ' href="" onclick="' . substr(trim($aPartes[1]), 11) . '">' . $aPartes[0] . '</a>';
			}else{
				return '<a' . $clase . ' href="' . $aPartes[1] . '">' . $aPartes[0] . '</a>';
			}
		}else if ($nPartes == 3){
			return '<a' . $clase . ' href="' . $aPartes[1] . '" target="'. $aPartes[2] . '">' . $aPartes[0] . '</a>';
		}
	}

	private function t($str){
		$str = str_replace("&", "&amp;", $str);
		$antes = array("<",    ">",    '"');
		$luego = array("&lt;", "&gt;", "&quot;");
		$str = str_replace($antes, $luego, $str);
		
		return ($str);
	}
	
	public function error($str){
		echo "<!-- $str -->";
	}
}





?>