<?php

namespace fmasa\Controls;

use Nette\Application\UI\Control;
use Nette\Utils\Paginator;

/**
 * Pagination component for Nette Framework
 * Utilizes Nette\Utils\Paginator
 * @author František Maša <frantisekmasa1@gmail.com>
 * @property-read Paginator $paginator
 */
class Pagination extends Control
{

	/** @var Paginator */
	private $paginator;

	/** @persistent */
	public $page = 1;

	/** Constructor */
	public function __construct()
	{
		parent::__construct();
		$this->paginator = (new Paginator)
				->setBase(1);
	}

	/**
	 * @return Paginator
	 */
	public function getPaginator()
	{
		return $this->paginator;
	}

	/**
	 * {@inheritdoc}
	 */
	public function loadState(array $params)
	{
		parent::loadState($params);
		$this->paginator->page = $this->page;
	}

	/**
	 * @return void
	 */
	public function render()
	{
		if(!$this->template->getFile()) {
			$this->template->setFile(__DIR__ . '/Pagination.latte');
		}
		$this->paginator->page = $this->page;
		$this->redrawControl('pagination');
		$this->template->paginator = $this->paginator;
		$this->template->render();
	}

}