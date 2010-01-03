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

/* Tento soubor čte data ze souboru question.dat, který předtím
 * vygeneroval skript question_gen.php . Z nich pak staví anketní
 * otázku, na kterou čeká na odpověď. Každý navštěvník (počítáno přes
 * cookies) může hlasovat jen jednou.
*/

 
if (!file_exists($name))												//založení souboru v případě potřeby
	fwrite($name,'');

$IP    = $_SERVER['REMOTE_ADDR'];										//načítám seznam těch, co už odpověděli
$logs  = file('question_IP.dat');
	
$file = fopen('question.dat','r');										//načítám data otázky samotné
$data = fgets($file);
fclose($file);

$data = explode(';',$data);												//přečte něco jako "Jste mu%28%44;ANO\15;NE\9". Přetransformujeme.
$data[0] = urldecode($data[0]);											//v nule bude otázka
for ($i=1;$i<sizeof($data);$i++)										//všude jinde dvojice odpověď-počet hlasů
{
	$data[$i]    = explode('\\',$data[$i]);
	$data[$i][0] = urldecode($data[$i][0]);
}

$answer = $_POST["answer"];												//pokud přišla nová odpověď, zpracujeme ji
if ((isset($answer))
  &&(strlen($answer)>0)
  &&(!in_array("$IP\n",$logs)))
{
	$data[$answer][1]++;												//odpověď přičteme
	
	$output    = $data;													//převedeme do bezpečného formátu
	$output[0] = urlencode($output[0]);
	for ($i=1; $i<sizeof($output); $i++)
	{
		$output[$i][0] = urlencode($output[$i][0]);
		$output[$i]    = implode('\\',$output[$i]);
	}
	
	$file      = fopen('question.dat','w');								//zapíšeme
	fputs($file,implode(';',$output));
	fclose($file);
	
	array_push($logs,"$IP\n");											//a zapamatujeme odesílatele	
	file_put_contents('question_IP.dat',$logs,FILE_APPEND);
					
	$notice = "Děkujeme za Vaši odpověď.";
}

if (in_array("$IP\n",$logs))												//už jednou odpověděl? Pokud ano, formulář bude vypadat jinak
{
	$answer_mod = 'DISABLED';
	$notice = "Na otázku jste již odpověděl(a).";
}

?>

<div id="counter">
<form action="" method="POST">
    <table>
    	<tr>
    		<th colspan="2">
    			Anketní otázka: <br /> <?php echo $data[0]; ?> 
    		</th>
    	</tr>
    	<?php
    	for ($i=1;$i<sizeof($data);$i++)									//generujeme potřebné množství odpovědí
    	{	
    		$cell0 = $data[$i][0];
    		$cell1 = $data[$i][1];
    		echo "
    	<tr>
    		<td>
    			<input type=\"radio\" name=\"answer\" value=\"$i\" $answer_mod>
    			$cell0
    			</input>
    		</td>
    		<td>
    			$cell1
    		</td>
    	</tr>";
    	}
    	?>
    	<tr>
    		<td>
    			<input type="submit" value="Odeslat" <?php echo $answer_mod ?>
    		</td>
    	</tr>
    </table>
</form>
<?php echo $notice?>
</div>
