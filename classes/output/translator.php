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
 * mdeditor specific renderers.
 *
 * @package   tool_mdeditor
 * @copyright 2019 Moodle
 * @author    Bas Brands
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace tool_mdeditor\output;

defined('MOODLE_INTERNAL') || die();

use renderable;
use templatable;
use renderer_base;
use stdClass;

/**
 * Class containing data for mdeditor translator page
 *
 * @copyright  2019 Bas Brands
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class translator implements renderable, templatable {

    /**
     * @var tool_mdeditor_translator $translator object.
     */
    private $translator;

    /**
     * Construct this renderable.
     *
     * @param tool_mdeditor_translator $translator The translator object.
     */
    public function __construct(\tool_mdeditor_translator $translator) {
        $this->translator = $translator;
    }

    /**
     * Export the data.
     *
     * @param renderer_base $output
     * @return stdClass
     */
    public function export_for_template(renderer_base $output) {
        $data = new stdClass();

        $data->nostrings = $output->notification(get_string('nostringsfound', 'tool_mdeditor'));
        $data->formurl = $this->translator->handler;
        $data->currentpage = $this->translator->currentpage;
        $data->sesskey = sesskey();
        $data->strings = [];

        if (!empty($this->translator->strings)) {
            $data->hasstrings = true;
            foreach ($this->translator->strings as $string) {
                // Find strings that use placeholders.
                if (preg_match('/\{\$a(->.+)?\}/', $string->master)) {
                    $string->placeholderhelp = $output->help_icon('placeholder', 'tool_mdeditor',
                            get_string('placeholderwarning', 'tool_mdeditor'));
                }
                if (!is_null($string->local) and $string->outdated) {
                    $string->outdatedhelp = $output->help_icon('markinguptodate', 'tool_mdeditor');
                    $string->checkupdated = true;
                }
                if ($string->original !== $string->master) {
                    $string->showoriginalvsmaster = true;
                }
                $string->local = s($string->local);
                $data->strings[] = $string;
            }
        }
        return $data;
    }
}