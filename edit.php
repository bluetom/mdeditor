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
 * @package    tool
 * @subpackage mdeditor
 * @copyright  2010 David Mudrak <david@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require(__DIR__ . '/../../../config.php');
require_once($CFG->dirroot.'/'.$CFG->admin.'/tool/mdeditor/locallib.php');
require_once($CFG->dirroot.'/'.$CFG->admin.'/tool/mdeditor/filter_form.php');
require_once($CFG->libdir.'/adminlib.php');

require_login(SITEID, false);
require_capability('tool/mdeditor:edit', context_system::instance());

$lng                    = required_param('lng', PARAM_LANG);
$currentpage            = optional_param('p', 0, PARAM_INT);
$translatorsubmitted    = optional_param('translatorsubmitted', 0, PARAM_BOOL);

admin_externalpage_setup('toolmdeditor', '', null,
    new moodle_url('/admin/tool/mdeditor/edit.php', array('lng' => $lng)),
    array('pagelayout' => 'report')); // Hack: allows for wide page contents.

$PAGE->requires->js_init_call('M.tool_mdeditor.init_editor', array(), true);

if (empty($lng)) {
    // PARAM_LANG validation failed
    print_error('missingparameter');
}

// pre-output processing
$filter     = new tool_mdeditor_filter_form($PAGE->url, null, 'post', '', array('class'=>'filterform'));
$filterdata = tool_mdeditor_utils::load_filter($USER);
$filterdata->stringid = "modulename_help";
$filter->set_data($filterdata);

if ($filter->is_cancelled()) {
    redirect($PAGE->url);

} elseif ($submitted = $filter->get_data()) {
    tool_mdeditor_utils::save_filter($submitted, $USER);
    redirect(new moodle_url($PAGE->url, array('p'=>0)));
}

if ($translatorsubmitted) {
    $strings = optional_param_array('cust', array(), PARAM_RAW);
    $updates = optional_param_array('updates', array(), PARAM_INT);
    $checkin = optional_param('savecheckin', false, PARAM_RAW);

    if ($checkin === false) {
        $nexturl = new moodle_url($PAGE->url, array('p' => $currentpage));
    } else {
        $nexturl = new moodle_url('/admin/tool/mdeditor/index.php', array('action'=>'checkin', 'lng' => $lng, 'sesskey'=>sesskey()));
    }

    if (!is_array($strings)) {
        $strings = array();
    }
    $current = $DB->get_records_list('tool_mdeditor', 'id', array_keys($strings));
    $now = time();

    foreach ($strings as $recordid => $customization) {
        $customization = trim($customization);

        if (empty($customization) and !is_null($current[$recordid]->local)) {
            $current[$recordid]->local = null;
            $current[$recordid]->modified = 1;
            $current[$recordid]->outdated = 0;
            $current[$recordid]->timecustomized = null;
            $DB->update_record('tool_mdeditor', $current[$recordid]);
            continue;
        }

        if (empty($customization)) {
            continue;
        }

        if ($customization !== $current[$recordid]->local) {
            $current[$recordid]->local = $customization;
            $current[$recordid]->modified = 1;
            $current[$recordid]->outdated = 0;
            $current[$recordid]->timecustomized = $now;
            $DB->update_record('tool_mdeditor', $current[$recordid]);
            continue;
        }
    }

    if (!is_array($updates)) {
        $updates = array();
    }
    if (!empty($updates)) {
        list($sql, $params) = $DB->get_in_or_equal($updates);
        $DB->set_field_select('tool_mdeditor', 'outdated', 0, "local IS NOT NULL AND id $sql", $params);
    }

    redirect($nexturl);
}

$translator = new tool_mdeditor_translator($PAGE->url, $lng, $filterdata, $currentpage);

// output starts here
$output     = $PAGE->get_renderer('tool_mdeditor');
$paginator  = $output->paging_bar($translator->numofrows, $currentpage, tool_mdeditor_translator::PERPAGE, $PAGE->url, 'p');

$editor = \editors_get_preferred_editor();
foreach ($translator->strings as $string) {
    $editor->use_editor($string->id, array());
}

echo $output->header();
echo $paginator;
echo $output->render($translator);
echo $paginator;
echo $output->footer();