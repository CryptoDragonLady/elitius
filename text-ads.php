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
$pid=(INT)$_GET['pid'];
$title = $gXpLang['site_title'].' - '.$gXpLang['text_ads'];

$ads = $gXpDb->getTextAds($pid);

$description = $gXpLang['desc_text_ads'];
$keywords = $gXpLang['keyword_text_ads'];

$sql = "SELECT `id`, `name` FROM `".$gXpDb->mPrefix."product`";
$result = $gXpDb->mDb->getAll($sql);
$num_product = count($result);
for($i=0; $i<$num_product; $i++)
{
	$f = $result[$i];
	$products[$f['id']] = $f['name'];
}

$gXpSmarty->assign_by_ref('products', $products);
$gXpSmarty->assign_by_ref('description', $description);
$gXpSmarty->assign_by_ref('keywords', $keywords);
$gXpSmarty->assign_by_ref('ads', $ads);
$gXpSmarty->assign_by_ref('title', $title);

$gXpSmarty->display("text-ads.tpl");

?>
