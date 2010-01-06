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

<xsl:output omit-xml-declaration="yes" indent="yes" method="xml" doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" doctype-public="-//W3C//DTD XHTML 1.0 Strict//EN" encoding="utf-8" media-type="text/html"/>

<xsl:template match="/">
        <xsl:apply-templates select="./presentation/personalPageData"/>
</xsl:template>

<xsl:template match="personalPageData">
	<xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text><div id="contact_information">
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><h2 id="h2_contact">
			<xsl:text>Kontaktní informace:</xsl:text>
		</h2>
			
		<xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><dl id="dl_contact">
			<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Jméno:</dt>
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
	<xsl:text>&#xA;&#9;&#9;&#9;</xsl:text>
</xsl:template>


<!-- ******************** KONTAKTNí INFORMACE ******************************************** -->

<xsl:template match="contacts[.!='']">           
            <xsl:apply-templates select="./email"/>
            <xsl:apply-templates select="./homeAddress/address"/>
            <xsl:apply-templates select="./phoneNumbers"/>
            <xsl:apply-templates select="./communicationProtocols"/>    
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

<xsl:template match="contacts/email[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Email:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="."/></dd>
</xsl:template>

<xsl:template match="address[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Adresa:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd>
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

<xsl:template match="contacts/phoneNumbers">
    <xsl:if test="./mobilePhone!=''">
        <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Mobilní telefon:</dt>
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="./mobilePhone"/></dd>
    </xsl:if>
    
    <xsl:if test="./phone!=''">
        <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Pevná linka:</dt>
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="./phone"/></dd>
    </xsl:if>
    
    <xsl:if test="./fax!=''">
        <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Fax:</dt>
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="./fax"/></dd>
    </xsl:if>
</xsl:template>

<xsl:template match="contacts/communicationProtocols">
    <xsl:if test="./icq!=''">
        <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Icq:</dt>
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="./icq"/></dd>
    </xsl:if>
    
    <xsl:if test="./skype!=''">
        <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Skype:</dt>
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="./skype"/></dd>
    </xsl:if>
    
    <xsl:if test="./msn!=''">
        <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>MSN:</dt>
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="./msn"/></dd>
    </xsl:if>
    
    <xsl:if test="./irc!=''">
        <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>IRC:</dt>
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="./irc"/></dd>
    </xsl:if>
    
    <xsl:if test="./jabber!=''">
        <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Jabber:</dt>
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="./jabber"/></dd>
    </xsl:if>
    
    <xsl:if test="./aim!=''">
        <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>AIM:</dt>
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="./aim"/></dd>
    </xsl:if>
</xsl:template>

<!-- ************************ UNIVERZITNÍ INFORMACE ******************************************** -->

<xsl:template match="school[.!='']">
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text><div id="university_information">
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><h2 id="h2_university">

            <xsl:choose>
                <xsl:when test="./student!=''">
                    <xsl:text>Informace o studiu na univerzitě:</xsl:text>
                </xsl:when>
                <xsl:otherwise>
                    <xsl:text>Informace o práci na univerzitě:</xsl:text>
                </xsl:otherwise>
            </xsl:choose>
        </h2>
            
        <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><dl id="dl_university">
            <xsl:apply-templates select="./university"/>
            <xsl:apply-templates select="./faculty"/>
            
            <xsl:if test="./student!=''">
                <xsl:apply-templates select="./student"/>
            </xsl:if>  
            <xsl:if test="./employee!=''">
                <xsl:apply-templates select="./employee"/>
            </xsl:if>          
            
            <xsl:apply-templates select="./schoolAddress"/>
            <xsl:apply-templates select="./universityUrl"/>
            <xsl:apply-templates select="./facultyUrl"/>
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></dl>
            
        <xsl:apply-templates select="./projects"/>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text></div><xsl:text>&#xA;</xsl:text>
</xsl:template>

<xsl:template match="school/university[.!='']">
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Univerzita:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="."/></dd>
</xsl:template>

<xsl:template match="school/faculty[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Fakulta:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="."/></dd>
</xsl:template>

<xsl:template match="school/student">
    <xsl:apply-templates select="./branch"/>
    <xsl:apply-templates select="./grade"/>
</xsl:template>

<xsl:template match="school/student/branch[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Obor:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="."/></dd>
</xsl:template>

<xsl:template match="school/student/grade[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Ročník:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="."/></dd>
</xsl:template>

<xsl:template match="school/employee">
    <xsl:apply-templates select="./department"/>
    <xsl:apply-templates select="./positions"/>
    <xsl:apply-templates select="./office"/>
    <xsl:apply-templates select="./workPhone"/>
    <xsl:apply-templates select="./consultationHours"/> 
</xsl:template>

<xsl:template match="school/employee/department[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Katedra:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="."/></dd>
</xsl:template>

<xsl:template match="school/employee/positions[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Pracovní zařazení:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:apply-templates select="./position"/></dd>
</xsl:template>

<xsl:template match="school/employee/positions/position[.!='']">
    <xsl:value-of select="."/>
    <xsl:if test="following-sibling::position!=''">
        <xsl:text>, </xsl:text>   
    </xsl:if>
</xsl:template>

<xsl:template match="school/employee/office[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Kancelář:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="."/></dd>
</xsl:template>

<xsl:template match="school/employee/workPhone[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Pracovní telefon:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="."/></dd>
</xsl:template>

<xsl:template match="school/employee/consultationHours[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Konzultační hodiny:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:apply-templates select="./consultation"/></dd>
</xsl:template>

<xsl:template match="school/employee/consultationHours/consultation[.!='']">
    <xsl:value-of select="./day"/>
    <xsl:text>: </xsl:text>
    <xsl:value-of select="./from"/>
    <xsl:text> - </xsl:text>
    <xsl:value-of select="./to"/>
    <xsl:if test="following-sibling::consultation!=''">
        <xsl:text>; </xsl:text>   
    </xsl:if>
</xsl:template>

<xsl:template match="school/universityUrl[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Webová prezentace univerzity:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd>
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><xsl:apply-templates select="./webUrl"/>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text></dd>
</xsl:template>

<xsl:template match="school/facultyUrl[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Webová prezentace fakulty:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd>
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><xsl:apply-templates select="./webUrl"/>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text></dd>
</xsl:template>

<xsl:template match="webUrl[.!='']">
	<a><xsl:attribute name="href"><xsl:value-of select="./url"/></xsl:attribute><xsl:attribute name="title"><xsl:value-of select="./title"/></xsl:attribute><xsl:value-of select="./title"/></a>
</xsl:template>

<xsl:template match="school/projects[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><div id="university_projects">
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text>
        <h3 id="h3_university_projects">Projekty:</h3>
        
        <xsl:apply-templates select="./project"/>    
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></div>
</xsl:template>

<xsl:template match="school/projects/project[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dl class="dl_university_projects">       
        <xsl:apply-templates select="./name"/>
        <xsl:apply-templates select="./description"/>
        <xsl:apply-templates select="./coWorkers"/>
        <xsl:apply-templates select="./yearFinished"/>
        <xsl:apply-templates select="./projectUrl"/>
        
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text></dl>
</xsl:template>

<xsl:template match="school/projects/project/name[.!='']">
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Název projektu:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="."/></dd>
</xsl:template>

<xsl:template match="school/projects/project/description[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Popis:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="."/></dd>
</xsl:template>

<xsl:template match="school/projects/project/coWorkers[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Spoluautoři:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:apply-templates select="./coWorker"/></dd>
</xsl:template>

<xsl:template match="school/projects/project/coWorkers/coWorker[.!='']">
    <xsl:apply-templates select="./person"/>
    <xsl:if test="following-sibling::coWorker!=''">
        <xsl:text>, </xsl:text>   
    </xsl:if>
</xsl:template>

<xsl:template match="school/projects/project/yearFinished[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Datum ukončení:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="."/></dd>
</xsl:template>

<xsl:template match="school/projects/project/projectUrl[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Webová prezentace:</dt>
        
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd>
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><xsl:apply-templates select="./webUrl"/>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text></dd>
</xsl:template>


<!-- ************************ INFORMACE O ZAMESTNANI ******************************************** -->

<xsl:template match="business[.!='']">
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text><div id="company_information">
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><h2 id="h2_company">Informace o zaměstnání:</h2>
            
        <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><dl id="dl_company">
            <xsl:apply-templates select="./businessName"/>
            <xsl:apply-templates select="./id"/>
            <xsl:apply-templates select="./directions"/>
            <xsl:apply-templates select="./workloads"/>
            <xsl:apply-templates select="./position"/>
            <xsl:apply-templates select="./businessAddress"/>
            <xsl:apply-templates select="./businessUrl"/>
            <xsl:apply-templates select="./otherInformation"/>
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></dl>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text></div><xsl:text>&#xA;</xsl:text>
</xsl:template>

<xsl:template match="business/businessName[.!='']">
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Firma:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="."/></dd>
</xsl:template>

<xsl:template match="business/id[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>IČ:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="."/></dd>
</xsl:template>

<xsl:template match="business/directions[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Oblast podnikání:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:apply-templates select="./direction"/></dd>
</xsl:template>

<xsl:template match="business/directions/direction[.!='']">
    <xsl:value-of select="."/>
    <xsl:if test="following-sibling::direction!=''">
        <xsl:text>, </xsl:text>   
    </xsl:if>
</xsl:template>

<xsl:template match="business/workloads[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Pracovní náplň:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:apply-templates select="./workload"/></dd>
</xsl:template>

<xsl:template match="business/workloads/workload[.!='']">
    <xsl:value-of select="."/>
    <xsl:if test="following-sibling::workload!=''">
        <xsl:text>, </xsl:text>   
    </xsl:if>
</xsl:template>

<xsl:template match="business/position[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Dosažená pozice:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="."/></dd>
</xsl:template>

<xsl:template match="business/businessUrl[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Webová prezentace:</dt>
        
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd>
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><xsl:apply-templates select="./webUrl"/>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text></dd>
</xsl:template>

<xsl:template match="business/otherInformation[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Doplňující informace:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:apply-templates /></dd>
</xsl:template>

<xsl:template match="//br">
    <br />
</xsl:template>

<!-- ************************ KONICKY ******************************************** -->

<xsl:template match="hobbies[.!='']">
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text><div id="hobbies">
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><h2 id="h2_hobbies">Zájmy, koníčky:</h2>
            
        <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><ul id="ul_hobbies">
            <xsl:apply-templates select="./hobby"/>
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></ul>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text></div><xsl:text>&#xA;</xsl:text>
</xsl:template>

<xsl:template match="hobbies/hobby[.!='']">
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><li><xsl:value-of select="."/></li>
</xsl:template>

<!-- ************************ ZNALOSTI  ******************************************** -->

<xsl:template match="knowledges[.!='']">
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text><div id="knowledges">
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><h2 id="h2_knowledges">Znalosti, dovednosti:</h2>
            
        <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><ul id="ul_knowledges">
            <xsl:apply-templates select="./knowledge"/>
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></ul>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text></div><xsl:text>&#xA;</xsl:text>
</xsl:template>

<xsl:template match="knowledges/knowledge[.!='']">
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><li><xsl:value-of select="."/></li>
</xsl:template>

<!-- ************************ INFORMACE DATU A MÍSTU NAROZENÍ ******************************************** -->

<xsl:template match="birth[.!='']">
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text><div id="birth_information">
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><h2 id="h2_birth">Informace o datu a místu narození:</h2>
            
        <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><dl id="dl_birth">
            <xsl:apply-templates select="./date"/>
            <xsl:apply-templates select="./sign"/>
            <xsl:apply-templates select="./place"/>
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></dl>

    <xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text></div><xsl:text>&#xA;</xsl:text>
</xsl:template>

<xsl:template match="birth/date[.!='']">
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Datum narození:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="."/></dd>
</xsl:template>

<xsl:template match="birth/sign[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Znamení:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="."/></dd>
</xsl:template>

<xsl:template match="birth/place[.!='']">
    <xsl:text>&#xA;&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dt>Místo narození:</dt>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><dd><xsl:value-of select="."/></dd>
</xsl:template>

<!-- ************************ TEXTOVE INFORMACE ******************************************** -->

<xsl:template match="texts[.!='']">
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text><div id="text_field">
        <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><hr /><xsl:text>&#xA;</xsl:text>    
        <xsl:apply-templates select="./text"/>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text></div><xsl:text>&#xA;</xsl:text>
</xsl:template>

<xsl:template match="texts/text[.!='']">
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text><div>
		<xsl:attribute name="class"><xsl:value-of select="./align"/><xsl:text>_text</xsl:text></xsl:attribute>
		<xsl:apply-templates select="./tfphoto"/>		
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><p>
			<xsl:attribute name="class"><xsl:value-of select="./align"/><xsl:text>_text_p</xsl:text></xsl:attribute>
			<xsl:apply-templates select="./message"/>
		</p>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></div>
</xsl:template>

<xsl:template match="texts/text/message[.!='']">
	    <xsl:apply-templates />
</xsl:template>

<xsl:template match="texts/text/tfphoto[.!='']">
	<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><img><xsl:attribute name="class"><xsl:value-of select="../align"/><xsl:text>_text_img</xsl:text></xsl:attribute><xsl:attribute name="src"><xsl:value-of select="./url"/></xsl:attribute><xsl:attribute name="alt"><xsl:value-of select="./alt"/></xsl:attribute><xsl:attribute name="title"><xsl:value-of select="./alt"/></xsl:attribute></img>
</xsl:template>

<!-- ************************ APLIKACE - FOTKA PRO GATE ******************************************** -->

<xsl:template match="applications/photoGATE[.!='']">
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text><div id="gate_photo">
	<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><img><xsl:attribute name="id"><xsl:text>img_gate_photo</xsl:text></xsl:attribute><xsl:attribute name="src"><xsl:value-of select="./url"/></xsl:attribute><xsl:attribute name="alt"><xsl:value-of select="./alt"/></xsl:attribute><xsl:attribute name="title"><xsl:value-of select="./alt"/></xsl:attribute></img>
	
	<form action="gate.js">
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><p>
			<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><input id="gate_dialogue" type="button" value="Zkoumání fotografie pomocí dialogu" onclick="newpage_dialogue('img')" />
			<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text><input id="gate_sonn" type="button" value="Zkoumání fotografie pomocí zvuků" onclick="newpage_sonn('img')" />
		<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;&#9;</xsl:text></p>	
	<xsl:text>&#xA;&#9;&#9;&#9;&#9;&#9;</xsl:text></form>
    <xsl:text>&#xA;&#9;&#9;&#9;&#9;</xsl:text></div><xsl:text>&#xA;</xsl:text>
</xsl:template>





















</xsl:stylesheet>

        
        