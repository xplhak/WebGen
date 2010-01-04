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

<xsl:output indent="yes" encoding="utf-8"/>

<xsl:template match="/">
    <div id="cv">
        <xsl:apply-templates/>
    </div>
</xsl:template>

<xsl:template match="presentation">
     <xsl:apply-templates select="./personalPageData/cv"/>
</xsl:template>

<xsl:template match="cv">
	<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;</xsl:text><h2 id="cv_heading"><xsl:text>Curriculum vitae </xsl:text></h2>    
    
    <p>
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><img id="img_flag" src="img/flag_eu.gif" alt="Vlajka EU" title="Vlajka EU" />
    </p>

	<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;</xsl:text><h2><xsl:text>Personal information</xsl:text></h2>    
	
		<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><dl id="dl">
			<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Full name:</dt>
			<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd class="marked"><xsl:apply-templates select="../person"/></dd>
			
			<xsl:apply-templates select="./cvEmail"/>
			<xsl:apply-templates select="./cvAddress/address"/>
			<xsl:apply-templates select="./cvPhone"/>
			<xsl:apply-templates select="./nationality"/>
			<xsl:apply-templates select="./maritalStatus"/>
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></dl>

	<xsl:apply-templates select="./courses"/>
	<xsl:apply-templates select="./workExperiences"/>
	<xsl:apply-templates select="./personalSkills"/>
	<xsl:apply-templates select="./otherInformation"/>    
    
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

<xsl:template match="cvEmail[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Email address:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd class="marked"><xsl:value-of select="."/></dd>
</xsl:template>



<xsl:template match="address[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Address:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd class="marked">
        <xsl:value-of select="./street"/>
        <xsl:text> </xsl:text>
        <xsl:value-of select="./houseNumber"/>
        <xsl:text>, </xsl:text>
        <xsl:value-of select="./zipCode"/>
        <xsl:text> </xsl:text>
        <xsl:value-of select="./city"/>
        
        <xsl:if test="./country!=''">
            <xsl:text>, </xsl:text>
            <xsl:value-of select="./country"/>
        </xsl:if>
    </dd>
</xsl:template>

<xsl:template match="cvPhone[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Phone number:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd class="marked"><xsl:value-of select="."/></dd>
</xsl:template>

<xsl:template match="nationality[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Nationality:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="."/></dd>
</xsl:template>

<xsl:template match="maritalStatus[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Marital status:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="."/></dd>
</xsl:template>

<xsl:template match="courses[.!='']">
	<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;</xsl:text><h2><xsl:text>Education and courses:</xsl:text></h2>   
	<xsl:apply-templates select="./course"/>
	
</xsl:template>

<xsl:template match="courses/course[.!='']">
	<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><dl>
		<xsl:if test="preceding-sibling::course!=''">
			<xsl:attribute name="class"><xsl:text>offset</xsl:text></xsl:attribute>
		</xsl:if>

		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Period (from – to):</dt>
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="./from"/>
			<xsl:if test="./to!=''">
				<xsl:text> - </xsl:text><xsl:value-of select="./to"/>
			</xsl:if>
		</dd>
		
		<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Organisation providing education:</dt>
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="./schoolName"/></dd>
		
		<xsl:if test="./branch!=''">
			<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Branch:</dt>
			<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="./branch"/></dd>
		</xsl:if>
		
		<xsl:if test="./degree!=''">
			<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Degree:</dt>
			<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="./degree"/></dd>
		</xsl:if>
		
		<xsl:if test="./level!=''">
			<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Level of national classification:</dt>
			<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="./level"/></dd>			
		</xsl:if>	
		
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></dl>
</xsl:template>

<xsl:template match="workExperiences[.!='']">
	<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;</xsl:text><h2><xsl:text>Work experiences:</xsl:text></h2>   
	<xsl:apply-templates select="./work"/>
	
</xsl:template>

<xsl:template match="workExperiences/work[.!='']">
	<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><dl>
		<xsl:if test="preceding-sibling::work!=''">
			<xsl:attribute name="class"><xsl:text>offset</xsl:text></xsl:attribute>
		</xsl:if>
			
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Period (from – to):</dt>
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="./from"/>
			<xsl:if test="./to!=''">
				<xsl:text> - </xsl:text><xsl:value-of select="./to"/>
			</xsl:if>
		</dd>
		
		<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Employer:</dt>
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="./businessName"/></dd>
		
		<xsl:if test="./branch!=''">
			<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Sphere of business:</dt>
			<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="./branch"/></dd>
		</xsl:if>
		
		<xsl:if test="./position!=''">
			<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Position:</dt>
			<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="./position"/></dd>
		</xsl:if>
		
		<xsl:if test="./workload!=''">
			<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Workload:</dt>
			<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="./workload"/></dd>			
		</xsl:if>
			
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></dl>
</xsl:template>

<xsl:template match="personalSkills[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;</xsl:text><h2><xsl:text>Personal skills:</xsl:text></h2>
	
	<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><dl>
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>IT skills:</dt>
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="./itSkills/level"/></dd>
		
		<xsl:if test="./itSkills/description!=''">
			<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Detail of IT skills:</dt>
			<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:apply-templates select="./itSkills/description"/></dd>
		</xsl:if>

		<xsl:if test="./drivingLicence!=''">
			<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Driving licence:</dt>
			<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="./drivingLicence"/></dd>		
		</xsl:if>
	<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></dl>   
    
    <xsl:apply-templates select="./languages"/>
    <xsl:apply-templates select="./otherSkills"/>
</xsl:template>

<xsl:template match="itSkills/description[.!='']">
	<xsl:apply-templates/>
</xsl:template>

<xsl:template match="//br">
    <br />
</xsl:template>

<xsl:template match="personalSkills/languages[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;</xsl:text><h3><xsl:text>Language:</xsl:text></h3>
    
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><dl>
		<xsl:apply-templates select="./language"/>
	<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></dl>
</xsl:template>

<xsl:template match="personalSkills/languages/language[.!='']">
			<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Language:</dt>
			<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd class="lang_type"><xsl:value-of select="./name"/></dd>
			
			<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Level:</dt>
			<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd class="lang_level"><xsl:value-of select="./level"/></dd>
</xsl:template>

<xsl:template match="personalSkills/otherSkills[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;</xsl:text><h3><xsl:text>Other skills:</xsl:text></h3>
    
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><dl>
		<xsl:apply-templates select="./skill"/>
	<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></dl>
</xsl:template>

<xsl:template match="personalSkills/otherSkills/skill[.!='']">
			<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt></dt>
			<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd>
				<xsl:apply-templates select="./name"/>
				
				<xsl:if test="./level!=''">
					<xsl:text> - </xsl:text><xsl:value-of select="./level"/>
				</xsl:if>
			</dd>
</xsl:template>

<xsl:template match="personalSkills/otherSkills/skill/name[.!='']">
	<xsl:apply-templates />
</xsl:template>

<xsl:template match="otherInformation[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;</xsl:text><h2><xsl:text>Additional information:</xsl:text></h2>
    
		<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><dl>
			<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt></dt>
			<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:apply-templates /></dd>
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></dl>
</xsl:template>

</xsl:stylesheet>
