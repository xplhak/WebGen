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

/* Toto je soubor, který generuje anketní otázku. Skript pracuje
 * iterativně - odkazuje sám na sebe a dotazuje se na další a další
 * údaje až do chvíle, kdy uživatel zadá vše potřebné. To potom
 * vygeneruje do svého adresáře soubor question.dat, kam v bezpečném
 * formátu uloží data, která pak bude číst skript question.php .
*/

$notice_class="error";													//dokud není všechno v pořádku, hlásíme chybu

$question = ''; 														//načítání dat z formuláře - otázka
if ((isset($_POST["question"]))&&(strlen($_POST["question"])>0))
	$question = $_POST["question"];
	else
	$notice = "Není vyplněna otázka!";

$count = 0;																//načítání dat z formuláře - počet odpovědí
if ((isset($_POST["count"]))&&($_POST["count"]>0))
	$count = $_POST["count"];
	else
	$notice = "Není zadán počet možných odpovědí!";

for ($i=1; $i<=$count; $i++)											//načítání dat z formuláře - odpovědi samotné
{
	$answers[$i] = '';
	if ((isset($_POST["answer".$i]))&&(strlen($_POST["answer".$i])>0))
		$answers[$i] = $_POST["answer".$i];
		else
		$notice = "Některé odpovědi jsou prázdné!";
}

if (!isset($notice))													//pokud nedošlo k chybě
{
	for ($i=1; $i<=sizeof($answers); $i++)								//ošetříme data proti oddělovačům
		$output[$i] = urlencode($answers[$i]).'\\0';
	$output = array_merge(array(urlencode($question)),$output);
	$file   = fopen('question.dat','w');
	
	fputs($file,implode(';',$output));									//zapíšeme do souboru
	fclose($file);
	
	$notice = 'Změny byly úspěšně uloženy.';							//a oznámíme uživateli
	$notice_class = 'ok';
}

?>
<form action="" method="POST">
<ul class="clear">
	<li>
		<label>
			<input type="text"   name="question" value="<?php echo $question; ?>"/>
			Otázka:
		</label>
	</li>
	<li>
		<label>
			<input type="text"   name="count"   value="<?php echo $count; ?>"/>
			Počet možných odpovědí:
		</label>
	</li>
		
	<?php																//generujeme potřebný počet odpovědí
	for ($i=1; $i<=$count ;$i++)
	{
		$value = $answers[$i];
		echo "
	<li>
		<label>
			<input type=\"text\" name=\"answer$i\" value=\"$value\"/>
			Odpověď č. $i:
		</label>
	</li>
	";
	}
	?>
	
	<input id="submit_button" type="submit" value="Uložit změny" />
</ul>
</form>

<?php
if (isset($notice))
	echo "<h2 class=\"$notice_class\">$notice</h2>"						//vypíšeme, co je špatně (pokud něco)
?>
