<?php

/**
 * Kelas ini berisi fungsi-fungsi untuk meng-generate tag-tag html
 * 
 */
class WY_Html
{
    /**
     * Meng-generate tag <ul>[<li></li>,...]</ul>
     * @param array $list item-item tag <li> yang akan di generate
     * @param array $attributes atribut tambahan untuk tag <ul>
     * @return string tag <ul> yang telah di generate
     */
	public static function ul($list, $attributes = null)
    {
        $html = "<ul>";
        
        $html .=  "</ul>";
        
        return $html;
    }
}