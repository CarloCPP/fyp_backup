<?php
defined('MOODLE_INTERNAL') || die();
class block_project extends block_base {
    public function init() {
        $this->title = get_string('project', 'block_project');
//        $this->title = "Project Title";
        // to give values to the class member
    }

    public function get_content() {
    if ($this->content !== null) {
      return $this->content;
    }

        $this->content         = new stdClass;
        $this->content->items  = array();
        $this->content->icons  = array();
        $this->content->footer = 'Footer here...';
        
        $this->content->items[] = html_writer::tag('a', 'Menu Option 1', array('href' => 'some_file.php'));
        $this->content->icons[] = html_writer::empty_tag('img', array('src' => 'images/icons/1.gif', 'class' => 'icon'));

    return $this->content;
    }
    // The PHP tag and the curly bracket for the class definition
    // will only be closed after there is another function added in the next section.
}
