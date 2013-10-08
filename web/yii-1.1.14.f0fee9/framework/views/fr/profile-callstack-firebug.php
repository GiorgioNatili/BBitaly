<<<<<<< HEAD
<script type="text/javascript">
/*<![CDATA[*/
if(typeof(console)=='object')
{
	console.group("Profiling Callstack Report");
<?php
foreach($data as $index=>$entry)
{
	list($proc,$time,$level)=$entry;
	$proc=CJavaScript::quote($proc);
	$time=sprintf('%0.5f',$time);
	$spaces=str_repeat(' ',$level*8);
	echo "\tconsole.log(\"[$time]{$spaces}{$proc}\");\n";
}
?>
	console.groupEnd();
}
/*]]>*/
=======
<script type="text/javascript">
/*<![CDATA[*/
if(typeof(console)=='object')
{
	console.group("Profiling Callstack Report");
<?php
foreach($data as $index=>$entry)
{
	list($proc,$time,$level)=$entry;
	$proc=CJavaScript::quote($proc);
	$time=sprintf('%0.5f',$time);
	$spaces=str_repeat(' ',$level*8);
	echo "\tconsole.log(\"[$time]{$spaces}{$proc}\");\n";
}
?>
	console.groupEnd();
}
/*]]>*/
>>>>>>> def2c902e2605700237265c6ff0100057658fafc
</script>