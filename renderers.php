<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Unitec Corporate Theme
 *
 * @package   theme_unitec_corporate
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class theme_unitec_corporate_core_renderer extends core_renderer {
 
    protected function render_custom_menu(custom_menu $menu) {
        
        $mycourses = $this->page->navigation->get('mycourses');
 
if (isloggedin() && $mycourses && $mycourses->has_children()) {
    $branchlabel = get_string('mycourses');
    $branchurl   = new moodle_url('/course/index.php');
    $branchtitle = $branchlabel;
    $branchsort  = 10000;
 
    $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
 
    foreach ($mycourses->children as $coursenode) {
        $branch->add($coursenode->get_content(), $coursenode->action, $coursenode->get_title());
    }
}
 
return parent::render_custom_menu($menu); 
        
    }
 
}