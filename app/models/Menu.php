<?php

class Menu extends Eloquent  {
	
	//protected $table = 'hms_menu';

	protected $guarded = array();

	public $timestamps = false;

	public static function getAuthMenus()
	{		
		
		$menus = Menu::where('flag','=',Auth::user()->flag)->orderBy('order','ASC')->get();

		$result = array();
		foreach ($menus as $key => $menu) {
			if ( $menu->parent == 0 ) {
				$result['parent'][] = $menu;
				foreach ($menus as $skey => $smenu) {
					if ($smenu->parent == $menu->id) {
						$result['child'][$menu->id][] = $smenu;
					}
				}
			}
		}
		return $result;

	}
	
}