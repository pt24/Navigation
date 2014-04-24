<?php

/**
 * Navigation node
 *
 * @author Jan Marek
 * @license MIT
 */

namespace Esports\Navigation;

use Nette\ComponentModel\Container;

class NavigationNode extends Container {

	/** @var string */
	public $label;

	/** @var string */
	public $url;

	/** @var bool */
	public $isCurrent = false;

	/**
	 * Add navigation node as a child
	 * @staticvar int $counter
	 * @param string $label
	 * @param string $url
	 * @return NavigationNode
	 */
	public function add($label, $url) {
		$navigationNode = new static;
		$navigationNode->label = $label;
		$navigationNode->url = $url;

		static $counter;
		$this->addComponent($navigationNode, ++$counter);

		return $navigationNode;
	}

	/**
	 * Set node as current
	 * @param bool $current
	 * @return NavigationNode
	 */
	public function setCurrent($current) {
		$this->isCurrent = $current;

		if ($current) {
			$this->lookup('Esports\Navigation\Navigation')->setCurrentNode($this);
		}

		return $this;
	}

}
