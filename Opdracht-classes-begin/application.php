<?php 
	function __autoload($klasse)
	{
		include 'classes/'. $klasse . '.php';
	}
	$percent = new Percent(150, 100);
?>
<body>

<table>
	<caption>Hoeveel procent is 150 van 100?</caption>
	<tr>
		<td>Absoluut</td>
		<td><?php echo $percent->absolute ?></td>
	</tr>
	<tr>
		<td>Relatief</td>
		<td><?php echo $percent->relative ?></td>
	</tr>
	<tr>
		<td>Geheel getal</td>
		<td><?php echo $percent->hundred ?>%</td>
	</tr>
	<tr>
		<td>Nominaal</td>
		<td><?php echo $percent->nominal ?></td>
	</tr>
</table>

</body>
</html>