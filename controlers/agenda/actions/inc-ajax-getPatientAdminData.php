<?php
/*
 * This file is part of MedShakeEHR.
 *
 * Copyright (c) 2017
 * Bertrand Boutillier <b.boutillier@gmail.com>
 * http://www.medshake.net
 *
 * MedShakeEHR is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * MedShakeEHR is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with MedShakeEHR.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Agenda : obtenir les infos administratives patient
 *
 * @author Bertrand Boutillier <b.boutillier@gmail.com>
 */

$patient = new msPeople();
$patient->setToID($_POST['patientID']);
$datas = $patient->getSimpleAdminDatasByName();
if ($p['config']['optionGeActiverUnivTags'] == 'true') {
	$univTagsTypeID = msUnivTags::getTypeIdByName('patients');
	if (msUnivTags::getIfTypeIsActif($univTagsTypeID)) {
		$datas['tagsHtml'] = msUnivTags::getListHtml($univTagsTypeID, $_POST['patientID'], 'show');
	}
}
header('Content-Type: application/json');
echo json_encode($datas);
