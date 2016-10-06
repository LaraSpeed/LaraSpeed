<?php
namespace Berthe\Codegenerator\Core;
use Philo\Blade\Blade;

class FileGenerator{
	
	public $vars;
	public $view;
	public $renderer;
	
	public $views = __DIR__ . '/../views';
	public $cache = __DIR__ . '/../cache';
	/**
	 * [__construct description]
	 * @param string $template path to template file
	 * @param array  $vars     array of variables to inject
	 */
	public function __construct(string $viewm = "", array $vars = [])
	{
		$this->views = dirname( $viewm );
		$this->view  = basename( $viewm );
		$this->setVars($vars);
		$this->renderer = new Blade($this->views, $this->cache);
	}
	
	public function setVars(array $vars){
		$this->vars = $vars;
	}
	
	public function render($view = null){
		$view = $view ?: $this->view;
		return $this->renderer->view()->make($view, $this->vars)->render();
	}
	
	public function put($output){
		file_put_contents($output, $this->render());
		//chmod($output, 777);
	}
}
