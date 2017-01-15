<?php

use Carbon\Carbon;

class DateHelper {
	
	public static function getLocalizedDays() {
		$timestamp = new Carbon('next Sunday');
		$days = array();
		setlocale(LC_TIME, config('app.locale'));
		for ($i = 1; $i < 8; $i++) {
			$timestamp = $timestamp->addDays(1);
			$days[$i] = $timestamp->formatLocalized('%A');
		}
		return $days;
	}

}
