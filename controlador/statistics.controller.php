<?php

	include_once($_SERVER['DOCUMENT_ROOT']."/DonacionesUI/modelo/statistics.model.php");

	class StatisticsController {


		public function guardarEstadisticas($enterprise_id, $app_id) {

			return (StatisticsModel::guardarEstadisticas($enterprise_id, $app_id));

		}

		public function estadisiticasPorModulo($app_id) {

			return (StatisticsModel::estadisiticasPorModulo($app_id));

		}

		public function estadisiticasModuloxEmpresa($enterprise_id, $app_id) {

			return (StatisticsModel::estadisiticasModuloxEmpresa($enterprise_id, $app_id));

		}

	}