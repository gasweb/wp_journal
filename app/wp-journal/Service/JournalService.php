<?php
namespace Magazine\Service;

use Magazine\Settings;

class JournalService
{
    public function _generateDoi($Journal, $Article)
    {
        if($Journal->getYear() > 2016 || ($Journal->getYear() == 2016 && $Journal->getNumber() >3))
        {
        //DOI 10.21292/2075-1230-2016-94-4-6-12
        $first = "10.21292/2075-1230-";
        $year = $Journal->getYear();
        $vol = $Journal->getVolume();
        $number = $Journal->getNumber();
        $pageStart = $Article->getPageStart();
        $pageEnd = $Article->getPageEnd();
        if($pageEnd>0)
            return "$first$year-$vol-$number-$pageStart-$pageEnd";        
        }
    return null;
    }

    public function generateDoi($Journal, $Article)
    {
        if($Journal->getYear() > Settings::DOI_START_YEAR || ($Journal->getYear() == Settings::DOI_START_YEAR && $Journal->getNumber() >= Settings::DOI_START_MONTH))
        {        
        $prefixPart = Settings::DOI_PREFIX."/".Settings::ISSN."-";       
        $year = $Journal->getYear();
        $vol = $Journal->getVolume();
        $number = $Journal->getNumber();
        $pageStart = $Article->getPageStart();
        $pageEnd = $Article->getPageEnd();
        if($pageEnd>0)
            return "$prefixPart$year-$vol-$number-$pageStart-$pageEnd";        
        }
    return null;
    }


}