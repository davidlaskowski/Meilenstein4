<?php

class Calendar {

	public function __construct() {
		$this->naviHref = htmlentities($_SERVER['PHP_SELF']);
	}

	private $dayNames = array("Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag", "Sonntag");
	private $curYear = 0;
	private $curMonth = 0;
	private $curDay = 0;
	private $curDate = null;
	private $daysInMonth = 0;
	private $naviHref = null;

	public function show() {
		$year = null;
		$month = null;

		if(null == $year && isset($_GET['year'])) {
			$year = $_GET['year'];
		} else if(null == $year) {
			$year = date("Y", time());
		}

		if(null == $month && isset($_GET['month'])) {
			$month = $_GET['month'];
		} else if(null == $month) {
			$month = date("m", time());
		}

		$this->curYear = $year;
		$this->curMonth = $month;
		$this->daysInMonth = $this->_daysInMonth($month, $year);

		$content = '<div id="calendar">'.
						'<div class="box">'.
						$this->_createNavi().
						'</div>'.
						'<div class="box-content">'.
							'<ul class="label">'.$this->_createLabels().'</ul>';
							$content.='<div class="clear"></div>';
							$content.='<ul class="dates">';

							$weeksInMonth = $this->_weeksInMonth($month, $year);

							for($i = 0; $i < $weeksInMonth; $i++) {
								for($j = 1; $j <= 7; $j++) {
									$content.=$this->_showDay($i*7 + $j);
								}
							}

							$content.='</ul>';
							$content.='<div class="clear"></div>';
						$content.='</div>';
		$content.='</div>';
		return $content;
	}

	private function _showDay($cellNumber) {
		if($this->curDay == 0) {
			$firstDayOfTheWeek = date('N', strtotime($this->curYear.'-'.$this->curMonth.'-01'));

			if(intval($cellNumber) == intval($firstDayOfTheWeek)) {
				$this->curDay = 1;
			}
		}

		if(($this->curDay != 0) && ($this->curDay <= $this->daysInMonth)) {
			$this->curDate = date('Y-m-d', strtotime($this->curYear.'-'.$this->curMonth.'-'.($this->curDay)));
			$cellContent = $this->curDay;
			$this->curDay++;
		} else {
			$this->curDate = null;
			$cellContent = null;
		}

		return '<li id="li-'.$this->curDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
                ($cellContent==null?'mask':'').'">'.$cellContent.'</li>';
	}

	private function _createNavi() {
		$nextMonth = $this->curMonth == 12?1:intval($this->curMonth) + 1;
		$nextYear = $this->curMonth == 12?intval($this->curYear) + 1:$this->curYear;
		$preMonth = $this->curMonth == 1?12:intval($this->curMonth) - 1;
		$preYear = $this->curMonth == 1?intval($this->curYear) - 1:$this->curYear;

		return '<div class="header">'.
					'<a class="prev material-icons" href="'.$this->naviHref.'?month='.sprintf('%02d', $preMonth).'&year='.$preYear.'">keyboard_arrow_left</a>'.
					'<a class="prev pyear material-icons" href="'.$this->naviHref.'?month='.sprintf('%02d', $this->curMonth).'&year='.($this->curYear - 1).'">arrow_back</a>'.
						'<a class="title">'.date('Y M', strtotime($this->curYear.'-'.$this->curMonth.'-1')).'</a>'.
					'<a class="next material-icons" href="'.$this->naviHref.'?month='.sprintf('%02d', $nextMonth).'&year='.$nextYear.'">keyboard_arrow_right</a>'.
					'<a class="next nyear material-icons" href="'.$this->naviHref.'?month='.sprintf('%02d', $this->curMonth).'&year='.($this->curYear + 1).'">arrow_forward</a>'.
				'</div>';
	}

	private function _createLabels() {
		$content = '';

		foreach ($this->dayNames as $index => $label) {
			$content.='<li class="'.($label == 6?'end title':'start title').' titel">'.$label.'</li>';
		}

		return $content;
	}

	private function _weeksInMonth($month = null, $year = null) {
		if(null == ($year)) {
			$year = date("Y", time());
		}
		if(null == ($month)) {
			$month = date("m", time());
		}

		$daysInMonth = $this->_daysInMonth($month, $year);
		$numOfWeeks = ($daysInMonth%7 == 0?0:1) + intval($daysInMonth/7);
		$monthEndingDay = date('N', strtotime($year.'-'.$month.'-'.$daysInMonth));
		$monthStartDay = date('N', strtotime($year.'-'.$month.'-01'));

		if($monthEndingDay < $monthStartDay) {
			$numOfWeeks++;
		}

		return $numOfWeeks;
	}

	private function _daysInMonth($month = null, $year = null) {
		if(null == ($year)) {
			$year = date("Y", time());
		}
		if(null == ($month)) {
			$month = date("m", time());
		}

		return date('t', strtotime($year.'-'.$month.'-01'));
	}

}

?>