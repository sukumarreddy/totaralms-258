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
 * Contact Advisor block caps.
 *
 * @package    block_contact_advisor
 * @copyright  Daniel Neis <danielneis@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

class block_contact_advisor extends block_base {

    function init() {
	global $USER, $_SERVER;
        $this->title = get_string('pluginname', 'block_contact_advisor');
    }

    function get_content() {
        global $USER, $CFG, $OUTPUT;

        if ($this->content !== null) {
            return $this->content;
        }

        if (empty($this->instance)) {
            $this->content = '';
            return $this->content;
        }

        $this->content = new stdClass();
        $this->content->items = array();
        $this->content->icons = array();
        $this->content->footer = '';

        // user/index.php expect course context, so get one if page has module context.
        $currentcontext = $this->page->context->get_course_context(false);

        if (! empty($this->config->text)) {
            $this->content->text = $this->config->text;
        }

        $this->content = '';
        if (empty($currentcontext)) {
            return $this->content;
        }
        if ($this->page->course->id == SITEID) {
            $this->context->text .= "site context";
        }

        if (! empty($this->config->text)) {
            $this->content->text .= $this->config->text;
        }


        $this->content->text = '<form action="https://cs18.salesforce.com/servlet/servlet.WebToCase?encoding=UTF-8" method="POST" onsubmit="return confirm(&quot;Clicking submit will generate a case for your advisor to followup.\nAre you sure?&quot;);">';
        $this->content->text .= '<input name="orgid" value="00D11000000CvJn" type="hidden" /> ';
        $this->content->text .= '<input name="retURL" value="http://astd.synegen.com/totaralms_258/my/index.php?" type="hidden" /> ';
        $this->content->text .= '<input name="email" value="' . $USER->email . '" type="hidden" /> ';
        $this->content->text .= '<input name="type" value="Learner Request" type="hidden" /> ';
        $this->content->text .= '<label for="subject" style="font-weight: bold;">Subject</label><input id="subject" maxlength="80" name="subject" size="22" type="text" /><br /> ';
        $this->content->text .= '<label for="reason" style="font-weight: bold;">Case Reason</label><select id="reason" name="reason">';
        $this->content->text .= '<option value="">--None--</option>';
        $this->content->text .= '<option value="Technical Issues">Technical Issues</option>';
        $this->content->text .= '<option value="Question about Quiz">Question about Quiz</option>';
        $this->content->text .= '<option value="Problem Downloading Materials">Issue with Materials</option>';
        $this->content->text .= '<option value="Other">Other</option>';
        $this->content->text .= '</select><br />';
        $this->content->text .= '<label for="priority" style="font-weight: bold;">Priority</label><br/><select id="priority" name="priority">';
        $this->content->text .= '<option value="">--None--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>';
        $this->content->text .= '<option value="High">High</option>';
        $this->content->text .= '<option value="Medium">Medium</option>';
        $this->content->text .= '<option value="Low">Low</option>';
        $this->content->text .= '</select><br /> <label for="description" style="font-weight: bold;">Description</label><textarea name="description" cols=23 rows=4></textarea><br /> <input name="submit" type="submit" /></form>';



        return $this->content;
    }

    // my moodle can only have SITEID and it's redundant here, so take it away
    public function applicable_formats() {
        return array('all' => false,
                     'site' => true,
                     'site-index' => true,
                     'course-view' => true, 
                     'course-view-social' => false,
                     'mod' => true, 
                     'mod-quiz' => false);
    }

    public function instance_allow_multiple() {
          return true;
    }

    function has_config() {return true;}

    public function cron() {
            mtrace( "Hey, my cron script is running" );
             
                 // do something
                  
                      return true;
    }
}
