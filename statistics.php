<?php
/***************************************************************************
 *
 *	 PROJECT: eLitius Open Source Affiliate Software
 *	 VERSION: 1.0
 *	 LISENSE: GNU GPL (http://www.opensource.org/licenses/gpl-license.html)
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation.
 *
 *   Link to eLitius.com can not be removed from the software pages without
 *	 permission of the eLitius respective owners. It is the only requirement
 *	 for using this software.
 *
 *   Copyright 2009 Intelliants LLC
 *   http://www.intelliants.com/
 *
 ***************************************************************************/

$gProtected = TRUE; 

require_once('header.php');

$title = $gXpLang['site_title'].' - '.$gXpLang['general_statistics'];
$traffic['visits'] = $aff['hits'];
$traffic['visitors'] = $gXpDb->getVisitorsCount($aff);
$traffic['sales'] = $gXpDb->getSalesCount($aff);

if ($traffic['sales'] && $traffic['visits'])
{
	$traffic['ratio'] = format($traffic['sales'] / $traffic['visits'] * 100);
} 
else 
{
	$traffic['ratio'] = "0.000"; 
}

$description = $gXpLang['desc_statistics'];
$keywords = $gXpLang['keyword_statistics'];

$gXpSmarty->assign_by_ref('description', $description);
$gXpSmarty->assign_by_ref('keywords', $keywords);
$gXpSmarty->assign_by_ref('xproot', $gXpConfig['xpurl']);
$gXpSmarty->assign_by_ref('title', $title);
$gXpSmarty->assign_by_ref('traffic', $traffic);

$gXpSmarty->display("general-statistics.tpl");

?>
