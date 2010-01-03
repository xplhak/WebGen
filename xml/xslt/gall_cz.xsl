<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="http://www.w3.org/1999/xhtml">

<!--
/*
    Copyright (c) 2009 Jaromír Plhák

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
*/
-->

<xsl:output indent="yes" method="xml" doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" doctype-public="-//W3C//DTD XHTML 1.0 Strict//EN" encoding="utf-8" media-type="text/html"/>

<xsl:template match="/">   
    <html>
        <xsl:attribute name="xml:lang">cs</xsl:attribute>
        <xsl:attribute name="lang">cs</xsl:attribute>

        <xsl:apply-templates/>
    </html>
</xsl:template>

<xsl:template match="presentation">
    
    <xsl:text>&#xA;&#xA;&#9;</xsl:text><head>
        <xsl:text>&#xA;&#9;&#9;</xsl:text><meta name="content-type" content="text/html; charset=UTF-8" />       
        <xsl:text>&#xA;&#9;&#9;</xsl:text><link>    
            <xsl:attribute name="rel">stylesheet</xsl:attribute>
            <xsl:attribute name="type">text/css</xsl:attribute>

            <xsl:attribute name="href"><xsl:value-of select="./style/css"/></xsl:attribute>			
       <!--     <xsl:attribute name="href"><xsl:text>style.css</xsl:text></xsl:attribute> -->


        </link>        
        
        <xsl:text>&#xA;&#9;&#9;</xsl:text><title>
            <xsl:apply-templates select="./galleryData/name"/>
            <xsl:text> - Fotogalerie</xsl:text>
        </title>
    
    <xsl:text>&#xA;&#9;</xsl:text></head>
    
    <xsl:text>&#xA;&#xA;&#9;</xsl:text><body>
		<xsl:text>&#xA;&#9;&#9;&#9;</xsl:text><div id="container">
			<xsl:apply-templates select="./galleryData"/>
		
			<xsl:text>&#xA;&#xA;&#9;&#9;</xsl:text><div id="footer">
				<xsl:text>&#xA;&#9;&#9;&#9;</xsl:text><p>Vygenerováno aplikací <a href="http://lsd.fi.muni.cz/~xplhak/webgen" title="WebGen">WebGen</a>. Datum poslední aktualizace: <xsl:value-of select="//@lastModified"/></p>
			<xsl:text>&#xA;&#9;&#9;</xsl:text></div>			
		
		<xsl:text>&#xA;&#9;&#9;&#9;</xsl:text></div>
    <xsl:text>&#xA;&#9;</xsl:text></body>
</xsl:template>

<xsl:template match="galleryData">
	
	<xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text><div id="header">
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><h1 id="heading"><xsl:apply-templates select="./name"/><xsl:text> - Fotogalerie</xsl:text></h1>
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><span id="heading_author"><xsl:value-of select="./person/fullName"/></span>
	<xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text></div>
	
	<xsl:apply-templates select="./collections"/>
</xsl:template>

<xsl:template match="collections">
		<xsl:apply-templates select="./collection"/>
</xsl:template>

<xsl:template match="collection">
	<xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text><div id="navdiv">
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><ul class="mainlink">
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><li>	
			<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><a>
				<xsl:attribute name="href"><xsl:value-of select="//@presentationName" /><xsl:text>.html</xsl:text></xsl:attribute>
				<xsl:attribute name="title"><xsl:text>O mně</xsl:text></xsl:attribute>						
				<xsl:text>Gallery pics</xsl:text></a>
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text></li>
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></ul>
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text></div>
		
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><div id="content">
			<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><ul id="picturelist">
				<xsl:apply-templates select="./photos"/>
			<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></ul>
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></div>
</xsl:template>

<xsl:template match="photos">
	<xsl:apply-templates select="photo"/>
</xsl:template>

<xsl:template match="photos/photo">
	<xsl:variable name="row" select="//rowPhotos"/>
	
	<xsl:if test="position() mod $row = 0">
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><li>
			<xsl:attribute name="class"><xsl:text>photo_linend</xsl:text></xsl:attribute>
			<xsl:value-of select="./alt"/><xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><a>
				<xsl:attribute name="href"><xsl:value-of select="./url"/></xsl:attribute>
				<xsl:attribute name="title"><xsl:value-of select="./alt"/></xsl:attribute>
				<img><xsl:attribute name="src"><xsl:value-of select="./url"/></xsl:attribute><xsl:attribute name="alt"><xsl:value-of select="./alt"/></xsl:attribute><xsl:attribute name="title"><xsl:value-of select="./alt"/></xsl:attribute></img></a>
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text></li>
	</xsl:if>
	
	<xsl:if test="position() mod $row != 0">
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><li>
			<xsl:attribute name="class"><xsl:text>photo</xsl:text></xsl:attribute>
			<xsl:value-of select="./alt"/><xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><a>
				<xsl:attribute name="href"><xsl:value-of select="./url"/></xsl:attribute>
				<xsl:attribute name="title"><xsl:value-of select="./alt"/></xsl:attribute>
				<img><xsl:attribute name="src"><xsl:value-of select="./url"/></xsl:attribute><xsl:attribute name="alt"><xsl:value-of select="./alt"/></xsl:attribute><xsl:attribute name="title"><xsl:value-of select="./alt"/></xsl:attribute></img></a>
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text></li>
	</xsl:if>
</xsl:template>

</xsl:stylesheet>