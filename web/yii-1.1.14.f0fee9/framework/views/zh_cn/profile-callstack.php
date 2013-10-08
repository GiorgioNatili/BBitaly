<!-- start profiling callstack -->
<table class="yiiLog" width="100%" cellpadding="2"
	style="border-spacing: 1px; font: 11px Verdana, Arial, Helvetica, sans-serif; background: #EEEEEE; color: #666666;">
	<tr>
		<th style="background: black; color: white;" colspan="2">程序概要分析 - 堆栈调用报告</th>
	</tr>
	<tr style="background-color: #ccc;">
		<th>步骤</th>
		<th>时间 (秒)</th>
	</tr>
<<<<<<< HEAD
<?php
foreach ( $data as $index => $entry ) {
	$color = ($index % 2) ? '#F5F5F5' : '#FFFFFF';
	list ( $proc, $time, $level ) = $entry;
	$proc = CHtml::encode ( $proc );
	$time = sprintf ( '%0.5f', $time );
	$spaces = str_repeat ( '&nbsp;', $level * 8 );
	
=======
<?php
foreach ( $data as $index => $entry ) {
	$color = ($index % 2) ? '#F5F5F5' : '#FFFFFF';
	list ( $proc, $time, $level ) = $entry;
	$proc = CHtml::encode ( $proc );
	$time = sprintf ( '%0.5f', $time );
	$spaces = str_repeat ( '&nbsp;', $level * 8 );
	
>>>>>>> def2c902e2605700237265c6ff0100057658fafc
	echo <<<EOD
	<tr style="background:{$color}">
		<td>{$spaces}{$proc}</td>
		<td align="center">{$time}</td>
	</tr>
<<<<<<< HEAD
EOD;
}
=======
EOD;
}
>>>>>>> def2c902e2605700237265c6ff0100057658fafc
?>
</table>
<!-- end of profiling callstack -->