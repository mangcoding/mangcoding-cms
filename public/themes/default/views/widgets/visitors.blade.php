<?php
Visitor::log();
$all = Visitor::count();
$now = date ('Y-m-d');
$today = Visitor::range($now, $now);
$yesterdayDate = date('Y-m-d',strtotime("-1 days"));
$yesterday = Visitor::range($yesterdayDate, $yesterdayDate);
$lastWeekDate = date('Y-m-d',strtotime("-1 weeks"));
$lastWeek = Visitor::range($lastWeekDate, $yesterdayDate);
$lastMonthDate = date('Y-m-d',strtotime("-1 month"));
$lastMonth = Visitor::range($lastMonthDate, $yesterdayDate);
?>

<div class="panel push-down-30">
	<h4 class="sidebar__headings">Visitor Counter</h4>
	<div class="page-box page-box--block visitor-block">
		<h2 align="center" class="v-stat">{{ $all }}</h2>
		<p align="justify"><i class="fa fa-user v-today"></i> Today<span class="pull-right">{{ $today }}</span></p>
		<p align="justify"><i class="fa fa-user v-yesterday"></i> Yesterday<span class="pull-right">{{ $yesterday }}</span></p>
		<p align="justify"><i class="fa fa-user v-week"></i> Last Week<span class="pull-right">{{ $lastWeek }}</span></p>
		<p align="justify"><i class="fa fa-user v-month"></i> Last Month<span class="pull-right">{{ $lastMonth }}</span></p>
		<p align="justify"><i class="fa fa-users v-total"></i> Total Counter<span class="pull-right">{{ $all }}</span></p>
	</div>
</div>