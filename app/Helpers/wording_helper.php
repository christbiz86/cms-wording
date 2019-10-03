<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_object_wording'))
{
	function get_object_wording($object)
	{

//		unset($file->special_partitions);
//		unset($file->curr_partitions);
//		unset($file->showed_partitions);
//		unset($file->data_partitions);


//		unset($file->curr_packages); --> done
//		unset($file->pack_calc); --> done
//		unset($file->map_offer_profile); --> done
//		unset($file->recommend_packages); --> done
//		unset($file->list_packages); --> done
//		unset($file->packages); -- done
//		unset($file->gift_note); --> done
//		unset($file->buy_note); --> done
//		unset($file->list_sub_group); --> done
//		unset($file->list_duration); --> done
//		unset($file->partitions); --> done
//		unset($file->list_group); --> done
//		unset($file->list_head_group_new); --> done
//
//		empty value
//		unset($file->showed_bonus);
//		unset($file->promotions);
//		unset($file->pack_recommendation);
		return $file->$object;
	}


}
