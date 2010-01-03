<?php

/*
    Copyright (c) 2009 Martin Honek

    Permission is hereby granted, free of charge, to any person
    obtaining a copy of this software and associated documentation
    files (the "Software"), to deal in the Software without
    restriction, including without limitation the rights to use,
    copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the
    Software is furnished to do so, subject to the following
    conditions:
    
    The above copyright notice and this permission notice shall be
    included in all copies or substantial portions of the Software.
    
    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
    EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
    OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
    NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
    HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
    WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
    FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
    OTHER DEALINGS IN THE SOFTWARE.

    Jakékoli změny a distribuce tohoto skriptu jsou povoleny, pokud
    nebude odstraněno jméno autora.

    Autor: Martin Honek
    Poslední změna: 1.12.2009
*/

/* Skript počítá přístupy tohoto dne a přístupy celkem. Návštěvník
 * se zapíše do souboru, abychom si ho už nezapisovli znova.
 */


$IP    = $_SERVER['REMOTE_ADDR'];
$name  = 'counter.dat';
$logs  = file($name);
$visit = $IP.";".date("Y-m-d")."\n";  						  			//Záznam vypadá jako IP;datum, takže asi takhle: 132.168.2.12;2009-12-1

if (!file_exists($name))												//založení souboru v případě potřeby
	fwrite($name);

for ($i=0; $i<sizeof($logs); $i++)										//hledání návštěvníka v záznamech
{
	if (preg_match("/$IP;/",$logs[$i]))
	{
		break;
	}
}

if ($i == sizeof($logs))												//nenašli? Zapiš!
	array_push($logs,"$visit");
if ($logs[$i] != $visit)												//našli? A je už zapsaný dneska?
	$logs[$i]  = $visit;

file_put_contents($name,implode("",$logs));								//zapiš změny

$unique = sizeof($logs);												//spočítej návštěvy
$today = 0;
foreach ($logs as $log)
	if (strpos($log,date("Y-m-d")))
		$today++;
?>

<div id="counter">
	<table>
		<tr>
			<th colspan="2">Počet návštěvníků:</th>
		</tr>
		<tr>
			<td><b>Celkem</b>			</td>
			<td><?php echo $unique; ?>	</td>
		</tr>
		<tr>
			<td><b>Dnes</b>			</td>
			<td><?php echo $today; ?>	</td>
		</tr>
	</table>
</div>
