<?php

namespace src\Controllers;

class Main
{
	protected function getMenu(): array
	{
		$menu = [];

		foreach ($this->config['sections'] as $section) {
			if ($section['enabled']) {
				$menu[] = $section;
			}
		}

		return $menu;
	}
}
