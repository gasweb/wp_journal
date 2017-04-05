<?php
namespace Magazine;

class Locale
{
	private $properties = array();

	public function getText($_property,$_lang)
	{
		$properties = array(
		"view" => array(
			"ru" => "Читать",
			"en" => "View",
			),
		"abstract" => array(
			"ru" => "Резюме",
			"en" => "Abstract",
			),
		"for_cite" => array(
			"ru" => "Для цитирования",
			"en" => "For citation",
			),
		"journal_archive" => array(
			"ru" => "Архив номеров",
			"en" => "Archive",
			),
		"number" => array(
			"ru" => "Номер",
			"en" => "Number",
			),
		"back" => array(
			"ru" => "Вернуться к содержанию",
			"en" => "Back to contents",
			),
		"udc" => array(
			"ru" => "УДК",
			"en" => "UDC",
			),
		"vol" => array(
			"ru" => "Том",
			"en" => "Vol",
			),
		"journal_title" => array(
			"ru" => "Туберкулёз и болезни лёгких",
			"en" => "Tuberculosis and Lung Diseases",
			),
		"reference" => array(
			"ru" => "Литература",
			"en" => "References"
			),
		"key_words" => array(
			"ru" => "Ключевые слова",
			"en" => "Key Words"
			),
		"doi" => array(
			"ru" => "DOI",
			"en" => "DOI"
			),
		"contents" => array(
			"ru" => "Содержание",
			"en" => "Contents"
			)
		);

		foreach($properties AS $property => $langValue)
		{
			if($property == $_property)
			{
				return $langValue[$_lang];
			}
		}
	}
}