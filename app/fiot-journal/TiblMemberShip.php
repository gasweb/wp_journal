<?php
namespace Magazine;

class TiblMemberShip
{
	public static function isMember()
	{
		if(\SwpmMemberUtils::is_member_logged_in())
		{
			$memberLevel = \SwpmMemberUtils::get_logged_in_members_level();		
		
			if($memberLevel == 2 || $memberLevel == 4)
				{
					return true;
				}
				else return false;
		}
		
	}

	public static function canWatchPdf($year, $number)
	{
		if(date("Y") - $year > 1)
			return true;
		elseif(date("n") - $number > 0 && date("Y") - $year == 1)
			return true;
		/*$yearDiff = (date("Y") - $year > 1) ? 1 : 0;
		$numDiff = (date("n") - $number > 0) ? 1 : 0;	
		if($yearDiff == 1 || ($yearDiff == 0 && $numDiff == 1))
		{		
			return true;
		}*/
		elseif(self::isMember())
		{
			return true;
		}		
			return false;
	}

	
}