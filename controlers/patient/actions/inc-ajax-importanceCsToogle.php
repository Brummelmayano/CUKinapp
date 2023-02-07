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
 * Patient > ajax : toogle de l'importance d'une ligne de l'historique médical
 *
 * @author Bertrand Boutillier <b.boutillier@gmail.com>
 */

if(!is_numeric($_POST['objetID'])) die;

if ($_POST['importanceActu']=='n') {
    $importance='y';
} else {
    $importance='n';
}

$data=array(
  'id'=>$_POST['objetID'],
  'important'=>$importance
);
msSQL::sqlInsert('objets_data', $data);