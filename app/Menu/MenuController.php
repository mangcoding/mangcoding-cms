<?php

namespace App\Menu;
use Illuminate\Support\ServiceProvider;
use Collective\Html\HtmlFacade as HTML;
use Illuminate\Support\Facades\URL;

class MenuController {
    protected $currentKey;
	private function createAnchor($item)
    {
        $output = '<a href="' . url($item['url']) . '">';
        $output .= $item['title'];
        $output .= '</a>';

        return $output;
    }
    private function createAnchorDrop($item)
    {
        #$output = '<a href="' . url($item['url']) . '">';
        $output = '<a href="#">';
        $output .= $item['title'];
        $output .= '</a>';

        return $output;
    }
    private function sortItems() {
        usort($this->items, function($a, $b) {
            if($a['sort'] == $b['sort']) {
                return 0;
            }

            return ($a['sort'] < $b['sort'] ? -1 : 1);
        });
    }
    private function render($items=0, $menuid = 0) {
        $items = ($items) ? $items : Menu::semua();
    	if ($menuid !== 0) {
    		$menu = '<ul class="sub-menu">';
       	}else $menu = "";
    	foreach($items as $item) {
            $has_children = $item['children'];
            $classes = ($has_children !=0) ? array('menu-item-has-children') : array();
            $menu .= '<li' . HTML::attributes(array('class' => implode(' ', $classes))) . '>';
            $menu .= ($has_children !=0) ? $this->createAnchorDrop($item) : $this->createAnchor($item);
            $menu .= ($has_children !=0) ? $this->render($item['children'], $item["idpages"]) : '';
            $menu .= '</li>';
        }
       	if ($menuid !==0) { $menu .= '</ul>'; }
        return $menu;
	}
	public static function generate() {
	   $menu = new MenuController();
	   return  '<ul id="menu-main-menu" class="navigation--main">
                   <li class="menu-item-has-children visible-xs">
                        <a href="#">'.trans('button.lang').'</a>
                        <ul class="sub-menu">
                            <li><a href="'. url('language/en') .'">English</a></li>
                            <li><a href="'. url('language/id') .'">Bahasa Indonesia</a></li>
                        </ul>
                    </li>
                  
        		  '.$menu->render().'
                </ul>';
	}
} 
/*
|--------------------------------------------------------------------------
| Menu Navigation
|--------------------------------------------------------------------------
<ul id="menu-main-menu" class="navigation--main">
    <li class="menu-item-has-children">
        <a href="index.html">IIHA</a>
        <ul class="sub-menu">
            <li class="visible-xs"><a href="login.html">Login Member</a></li>
            <li><a href="about.html">About us</a></li>
            <li><a href="contact-us.html">Contact Us</a></li>
            <li><a href="board-page.html">Board of Advisory</a></li>
            <li><a href="board-page.html">Board of Administration</a></li>
        </ul>
    </li>
    <li class="menu-item-has-children">
        <a href="membership.html">Membership</a>
        <ul class="sub-menu">
            <li><a href="membership.html">Types of membership</a></li>
            <li><a href="membership.html">Benefits</a></li>
            <li><a href="membership.html">Become a member</a></li>
            <li><a href="membership.html">Renew your membership</a></li>
            <li><a href="membership.html">Frequently Asked Questions</a></li>
        </ul>
    </li>
    <li class="menu-item-has-children">
        <a href="certification.html">Certification</a>
        <ul class="sub-menu">
            <li><a href="certification.html">Level of Competency</a></li>
            <li><a href="certification.html">Certification process</a></li>
            <li><a href="certification.html">Apply for certification</a></li>
        </ul>
    </li>
    <li class="menu-item-has-children">
        <a href="publication.html">Publication and Resources</a>
        <ul class="sub-menu">
            <li><a href="publication.html">IIHA By law (AD/ART)</a></li>
            <li><a href="publication.html">Regulation (peraturan): NAB, dll</a></li>
            <li><a href="publication.html">Link (NIOSH, ACGIH, ATSDR, OSHA, AIHA, dll)</a></li>
        </ul>
    </li>
    <li class="menu-item-has-children">
        <a href="training.html">Training</a>
        <ul class="sub-menu">
            <li><a href="training.html">Topics and Syllabus</a></li>
            <li><a href="training.html">Training Schedule</a></li>
            <li><a href="training.html">Registration for a training</a></li>
        </ul>
    </li>
    <li class="menu-item-has-children">
        <a href="event.html">Event</a>
        <ul class="sub-menu">
            <li><a href="event.html">Incoming seminar</a></li>
            <li><a href="event.html">IIHA conference</a></li>
            <li><a href="event.html">Registration</a></li>
        </ul>
    </li>
</ul>   
 */