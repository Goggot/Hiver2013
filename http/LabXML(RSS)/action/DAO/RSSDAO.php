<?php
	class RSSDAO{
		public static function getElem($url){
			$xml = new SimpleXMLElement($url, null, true);
			$tab = array();
			foreach($xml->channel->item as $item){
				$tab[] = $item;
			}
			return $tab;
		}
	}