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
 * Scheduled task to sync cohorts based on attribute.
 *
 * @package   local_ldap_syncplus
 * @copyright 2016 Lafayette College ITS
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_ldap_syncplus\task;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/local/ldap/locallib.php');

/**
 * Scheduled task to sync cohorts based on attributes.
 *
 * @package   local_ldap_syncplus
 * @copyright 2016 Lafayette College ITS
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class attribute_sync_task extends \core\task\scheduled_task {
    /**
     * Get the name of the task.
     *
     * @return string the name of the task
     */
    public function get_name() {
         return get_string('attributesynctask', 'local_ldap_syncplus');
    }

    /**
     * Execute the task.
     *
     * @see local_ldap_syncplus::sync_cohorts_by_attribute()
     */
    public function execute() {
        if ($plugin = new \local_ldap_syncplus()) {
            $plugin->sync_cohorts_by_attribute();
        }
    }
}
