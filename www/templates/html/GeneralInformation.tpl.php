<div id="toc_nav">
    <a href="#toc_nav" id="tocContent">Contents</a>
    <ol id="toc"><li>Intro</li></ol>
    <div id="toc_major_name">General Information</div>
</div>
<div id="toc_bar"></div>
<div id="long_content">
<?php
$contents = file_get_contents('phar://'.UNL_UndergraduateBulletin_Controller::getDataDir().'/General Information.epub/OEBPS/General_Information.xhtml');

$xml = simplexml_load_string($contents);

// Fetch all namespaces
$namespaces = $xml->getNamespaces(true);
$xml->registerXPathNamespace('default', $namespaces['']);

// Register the rest with their prefixes
foreach ($namespaces as $prefix => $ns) {
    $xml->registerXPathNamespace($prefix, $ns);
}

$body = $xml->xpath('//default:body');
echo UNL_UndergraduateBulletin_EPUB_Utilities::format($body[0]->asXML());
?>
</div>