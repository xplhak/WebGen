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

			<xsl:attribute name="href"><xsl:value-of select="//@presentationName" /><xsl:text>.css</xsl:text></xsl:attribute>
       <!--     <xsl:attribute name="href"><xsl:value-of select="./style/css"/></xsl:attribute>-->		
       <!--     <xsl:attribute name="href"><xsl:text>style.css</xsl:text></xsl:attribute> -->
        </link>
        
        <xsl:if test="./personalPageData/cv!=''">
			<xsl:text>&#xA;&#9;&#9;</xsl:text><link>    
				<xsl:attribute name="rel">stylesheet</xsl:attribute>
				<xsl:attribute name="type">text/css</xsl:attribute>
				
				<xsl:attribute name="href"><xsl:value-of select="//@presentationName" /><xsl:text>_cv.css</xsl:text></xsl:attribute>
			</link>
		</xsl:if>
        
        <xsl:if test="./personalPageData/applications/guestbook != ''"> 
			<xsl:text>&#xA;&#9;&#9;</xsl:text><link>    
				<xsl:attribute name="rel">stylesheet</xsl:attribute>
				<xsl:attribute name="type">text/css</xsl:attribute>
				
				<xsl:attribute name="href"><xsl:text>./page_files/gb.css</xsl:text></xsl:attribute>
			</link>
		</xsl:if>
        
        <xsl:text>&#xA;&#9;&#9;</xsl:text><title>
            <xsl:text>Personal page - </xsl:text>
            <xsl:value-of select="//@presentationFullName" />
        </title>
        
        <xsl:text>&#xA;&#9;&#9;</xsl:text><script>
            <xsl:attribute name="type">text/javascript</xsl:attribute>
            <xsl:attribute name="src">./page_files/jquery.js</xsl:attribute>
            <xsl:text> </xsl:text>
        </script>
        
        <xsl:text>&#xA;&#9;&#9;</xsl:text><script>
            <xsl:attribute name="type">text/javascript</xsl:attribute>
            <xsl:attribute name="src"><xsl:value-of select="//@presentationName" /><xsl:text>.js</xsl:text></xsl:attribute>
            <xsl:text> </xsl:text>
        </script>
        
        <xsl:if test="./personalPageData/applications/guestbook != ''">
			<xsl:text>&#xA;&#9;&#9;</xsl:text><script>
				<xsl:attribute name="type">text/javascript</xsl:attribute>
				<xsl:attribute name="src"><xsl:text>./page_files/gb.js</xsl:text></xsl:attribute>
				<xsl:text> </xsl:text>
			</script>
		</xsl:if>  
    
    <xsl:text>&#xA;&#9;</xsl:text></head>
    
    <xsl:text>&#xA;&#xA;&#9;</xsl:text><body>
        <xsl:apply-templates select="./personalPageData"/>
    <xsl:text>&#xA;&#9;</xsl:text></body>
</xsl:template>


<xsl:template match="personalPageData">
    <xsl:text>&#xA;&#xA;&#9;&#9;</xsl:text><div id="header">
        <xsl:text>&#xA;&#9;&#9;&#9;</xsl:text><div class="content">

			<xsl:choose>
				
				<xsl:when test="./person/photo != ''">
					<xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text><div id="main_photo">
						<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><img><xsl:attribute name="id">img_main_photo</xsl:attribute><xsl:attribute name="src"><xsl:value-of select="./person/photo/url"/></xsl:attribute><xsl:attribute name="alt"><xsl:value-of select="./person/photo/alt"/></xsl:attribute><xsl:attribute name="title"><xsl:value-of select="./person/photo/alt"/></xsl:attribute></img>
					<xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text></div>			
				</xsl:when>
				
				<xsl:otherwise>
					<xsl:if test="../style/css='pp1.css'">
						<xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text><div id="main_photo">
							<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><img><xsl:attribute name="id">img_main_photo</xsl:attribute><xsl:attribute name="src"><xsl:text>img/siluette.gif</xsl:text></xsl:attribute><xsl:attribute name="alt"><xsl:text>Silhouette</xsl:text></xsl:attribute><xsl:attribute name="title"><xsl:text>Silueta</xsl:text></xsl:attribute></img>
						<xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text></div>	
					</xsl:if>
				</xsl:otherwise>
			</xsl:choose>

            <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;</xsl:text><h1 id="heading">
				<xsl:value-of select="//@presentationFullName" />
            </h1>
            
            <!-- Menu bude vytvořeno pouze pokud bude prezentace obsahovat CV nebo knihu návštěv -->
				
				<xsl:if test="./cv!='' or ./applications/guestbook != ''">
					<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;</xsl:text><ul id="menu">
						<li>
							<a>
								<xsl:attribute name="href"><xsl:value-of select="//@presentationName" /><xsl:text>.html</xsl:text></xsl:attribute>
								<xsl:attribute name="title"><xsl:text>About me</xsl:text></xsl:attribute>						
								<xsl:text>About me</xsl:text>
							</a>
						</li>
						
						<xsl:if test="./cv!=''">
							<li>
								<a>
									<xsl:attribute name="href"><xsl:value-of select="//@presentationName" /><xsl:text>_cv.html</xsl:text></xsl:attribute>
									<xsl:attribute name="title"><xsl:text>Curriculum Vitae</xsl:text></xsl:attribute>
									<xsl:text>Curriculum Vitae</xsl:text>
								</a>
							</li>
						</xsl:if>						
						<xsl:if test="./applications/guestbook != ''">
							<li>
								<a>
									<xsl:attribute name="onclick"><xsl:text>set_content(this, './page_files/gb.php')</xsl:text></xsl:attribute>
									<xsl:attribute name="title"><xsl:text>Guestbook</xsl:text></xsl:attribute>
									<xsl:text>Kniha návštěv</xsl:text>
								</a>
							</li>
						</xsl:if>
					</ul>				
				</xsl:if>
			   
        <xsl:text>&#xA;&#9;&#9;&#9;</xsl:text></div>
    <xsl:text>&#xA;&#9;&#9;</xsl:text></div>
    
    <xsl:text>&#xA;&#xA;&#9;&#9;</xsl:text><div id="main">
        
        <!-- *********** HLAVNÍ (PROSTŘEDNÍ) ČÁST ************************ -->
        
        <xsl:text>&#xA;&#9;&#9;&#9;</xsl:text><div id="center">
            
				<xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text><div id="contact_information">
					<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><h2 id="h2_contact">
						<xsl:text>Contact information:</xsl:text>
					</h2>
						
					<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><dl id="dl_contact">
						<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Full name:</dt>
						<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:apply-templates select="./person"/></dd>
					
						<xsl:apply-templates select="./contacts"/>
					<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></dl>
				
					
				<xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text></div><xsl:text>&#xA;</xsl:text>
            
            <xsl:apply-templates select="./school"/>
            <xsl:apply-templates select="./business"/>
            <xsl:apply-templates select="./hobbies"/>
            <xsl:apply-templates select="./knowledges"/>
            <xsl:apply-templates select="./birth"/>
            <xsl:apply-templates select="./texts"/>
            <xsl:apply-templates select="./applications/photoGATE"/>
        <xsl:text>&#xA;&#9;&#9;&#9;</xsl:text></div>
        
        <!-- *********** PRAVÝ SLOUPEC ************************ -->
        
        <xsl:text>&#xA;&#xA;&#9;&#9;&#9;</xsl:text><div id="sidebar-right">
            <xsl:apply-templates select="./links"/>

            <!-- *********** XHTML valid značka ************************ -->

            <xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text><p>
                <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><a href="http://validator.w3.org/check?uri=referer">
                    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><img style="border:0" src="img/xhtml.png" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
                <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></a>
            <xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text></p>		
		
		    <!-- *********** CSS valid značka ************************ -->
		
            <xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text><p>
                <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><a href="http://jigsaw.w3.org/css-validator/check/referer">
                    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><img style="border:0" src="img/css.png" alt="Valid CSS!" height="31" width="88" />
                <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></a>
            <xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text></p>

        <xsl:text>&#xA;&#9;&#9;&#9;</xsl:text></div>     
    <xsl:text>&#xA;&#9;&#9;</xsl:text></div>

    <!-- *********** ZÁPATÍ ************************ -->

    <xsl:text>&#xA;&#xA;&#9;&#9;</xsl:text><div id="footer">
        <xsl:text>&#xA;&#9;&#9;&#9;</xsl:text><p>Generated using <a href="http://lsd.fi.muni.cz/tiki-index.php" title="WebGen system">WebGen system</a>. Last updated: <xsl:value-of select="//@lastModified"/></p>
    <xsl:text>&#xA;&#9;&#9;</xsl:text></div>
     
</xsl:template>

<xsl:template match="person">
    <xsl:if test="./prefix!=''">
        <xsl:value-of select="./prefix"/>
        <xsl:text> </xsl:text>
    </xsl:if>
    
    <xsl:value-of select="./fullName"/>
    
    <xsl:if test="./sufix!=''">
        <xsl:text> </xsl:text>
        <xsl:value-of select="./sufix"/>
    </xsl:if>
</xsl:template>

               

<!-- ************************ ODKAZY ******************************************** -->

<xsl:template match="links[.!='']">
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text><div id="links">            
        <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><ul class="all_links">
            <xsl:apply-templates select="./link"/>
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></ul>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text></div><xsl:text>&#xA;</xsl:text>
</xsl:template>

<xsl:template match="link[.!='']">
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><li class="li_link">
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><img><xsl:attribute name="class">img_link</xsl:attribute><xsl:attribute name="src"><xsl:text>img/</xsl:text><xsl:value-of select="./iconFile"/></xsl:attribute><xsl:attribute name="alt">ikona</xsl:attribute></img>
        
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><a><xsl:attribute name="class"><xsl:text>a_link_</xsl:text><xsl:value-of select="./type"/></xsl:attribute><xsl:attribute name="href"><xsl:value-of select="./url"/></xsl:attribute><xsl:attribute name="title"><xsl:value-of select="./title"/></xsl:attribute><xsl:value-of select="./title"/></a>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text></li>        
</xsl:template>

<!-- ************************ APLIKACE ******************************************** -->














</xsl:stylesheet>
