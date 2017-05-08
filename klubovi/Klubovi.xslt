<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	
	<xsl:template match="/">
		<h1>Popis klubova</h1>
		<hr/>
		<xsl:apply-templates select="//klub"/>
	</xsl:template>
	
	
	<xsl:template match="//klub">
		<xsl:apply-templates select="naziv"/>
		<xsl:apply-templates select="mjesto"/>	
		<xsl:apply-templates select="godinaOsnutka"/>
		<xsl:apply-templates select="stadion"/>
	</xsl:template>
	
	<xsl:template match="naziv">
		<br/><br/><b>Naziv: </b> <xsl:value-of select="."/>
	</xsl:template>

	<xsl:template match="mjesto">
		<br/><b>Mjesto: </b> <xsl:value-of select="."/>
	</xsl:template>

	<xsl:template match="godinaOsnutka">
		<br/><b>Godina osnutka: </b><xsl:value-of select="."/>
	</xsl:template>
	
	<xsl:template match="//stadion">
		<xsl:apply-templates select="nazivStadiona"/>
		<xsl:apply-templates select="kapacitet"/>
	</xsl:template>
	
	<xsl:template match="nazivStadiona">
	<br/><b>Stadion: </b><xsl:value-of select="."/>
	</xsl:template>
	
	<xsl:template match="kapacitet">
	<br/><b>Kapacitet stadiona: </b><xsl:value-of select="."/>
	</xsl:template>
 

</xsl:stylesheet>