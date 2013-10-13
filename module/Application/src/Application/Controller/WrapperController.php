<?php
namespace Application\Controller;
class WrapperController
{
    public function getPrice($url) {
        $content = $this->getSiteContent($url);
        
        $preTag = '<li class="li sale" itemprop="offers" itemscope="itemscope" itemtype="http://schema.org/Offer">';
        $postTag = '<div class="listCartaoParcelamento">';
        
        $isolatedContent = $this->isolateContent($content, $preTag, $postTag);
        
        $preTag = '<abbr class="currency" title="BRL">R$</abbr> <span class="amount" itemprop="price">';
        $postTag = '</span>';
        
        $isolatedContent = $this->isolateContent($isolatedContent, $preTag, $postTag);
        
        $isolatedContent = str_replace('.', '', $isolatedContent);
        $isolatedContent = str_replace(',', '.', $isolatedContent);
        
        return floatval($isolatedContent);
    }
    
    public function getSiteContent($url) {
    	$conecurl = @fopen($url, 'r') or die('erro na conexão');
    	$content = "";
    	while (!feof($conecurl)) {
    		$content .= fgets($conecurl, 4096);
    	}
    
    	fclose($conecurl);
    
    	return $content;
    }
    
    public function isolateContent($content, $preTag, $postTag) {
    	$nprimetable = strpos($content, $preTag);
    	$nprimetable += strlen($preTag);
    	$fechatable = strpos($content,$postTag);
    	$quantopula = $fechatable - $nprimetable ;
    	$isolatedContent = substr($content, $nprimetable ,$quantopula);
    
    	return $isolatedContent;
    }
}

?>