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

<xsl:output omit-xml-declaration="yes" indent="yes" method="xml" doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" doctype-public="-//W3C//DTD XHTML 1.0 Strict//EN" encoding="utf-8" media-type="text/html"/>s

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
            <xsl:apply-templates select="./blogData/title"/>
            <xsl:text> - Personal blog</xsl:text>
        </title>
    
    <xsl:text>&#xA;&#9;</xsl:text></head>
    
    <xsl:text>&#xA;&#xA;&#9;</xsl:text><body>
		<xsl:text>&#xA;&#9;&#9;&#9;</xsl:text><div id="content">
			<xsl:apply-templates select="./blogData"/>
		
			<xsl:text>&#xA;&#xA;&#9;&#9;</xsl:text><div id="footer">
				<xsl:text>&#xA;&#9;&#9;&#9;</xsl:text><p>Generated using <a href="http://lsd.fi.muni.cz/~xplhak/webgen" title="WebGen system">WebGen system</a>. Last update: <xsl:value-of select="//@lastModified"/></p>
			<xsl:text>&#xA;&#9;&#9;</xsl:text></div>			
		
		<xsl:text>&#xA;&#9;&#9;&#9;</xsl:text></div>
    <xsl:text>&#xA;&#9;</xsl:text></body>
</xsl:template>

<xsl:template match="blogData">
	<xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text><div id="header">
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><h1 id="heading"><xsl:apply-templates select="./title"/><xsl:text> - Personal blog</xsl:text></h1>
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><span id="heading_author"><xsl:value-of select="./person/fullName"/></span>
	<xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text></div>
	
	<xsl:apply-templates select="./articles"/>
</xsl:template>

<xsl:template match="articles">
		<xsl:apply-templates select="./article"/>
</xsl:template>

<xsl:template match="article">
	<xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text><div class="article">
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><h2><xsl:value-of select="./title"/></h2>
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><span class="author"><xsl:value-of select="./author"/><xsl:text>, </xsl:text><xsl:value-of select="date"/></span>
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><p>
			<xsl:apply-templates select="./text"/>
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></p>
	<xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text></div>
</xsl:template>

<xsl:template match="text">
	<xsl:apply-templates/>
</xsl:template>

<xsl:template match="//br">
    <br />
</xsl:template>

</xsl:stylesheet>