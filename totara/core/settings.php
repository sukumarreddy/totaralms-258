<?php
/*
 * This file is part of Totara LMS
 *
 * Copyright (C) 2010 onwards Totara Learning Solutions LTD
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package totara
 * @subpackage totara_core
 */

global $SITE, $CFG;

$optionaltotarasettings = new admin_settingpage('optionaltotara', new lang_string('totarafeatures', 'totara_core'));

$ADMIN->add('root', $optionaltotarasettings, 'users');

// Totara Settings.
$optionaltotarasettings->add(new admin_setting_configcheckbox('enablegoals',
    new lang_string('enablegoals', 'totara_hierarchy'),
    new lang_string('configenablegoals', 'totara_hierarchy'),
    1));

$optionaltotarasettings->add(new admin_setting_configcheckbox('enableappraisals',
    new lang_string('enableappraisals', 'totara_appraisal'),
    new lang_string('configenableappraisals', 'totara_appraisal'),
    1));

$optionaltotarasettings->add(new admin_setting_configcheckbox('enablefeedback360',
    new lang_string('enablefeedback360', 'totara_feedback360'),
    new lang_string('configenablefeedback360', 'totara_feedback360'),
    1));

$optionaltotarasettings->add(new admin_setting_configcheckbox('enablelearningplans',
    new lang_string('enablelearningplans', 'totara_plan'),
    new lang_string('configenablelearningplans', 'totara_plan'),
    1));