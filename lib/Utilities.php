<?php
namespace MWD\Alerts;

class Utilities {

	/**
	 * Process content output
	 */

	 /**
 	 * Convert class array into string, apply shortcode-specific filter, and return the string
 	 * @param  string $name  name of the function calling this one
 	 * @param  array $class
 	 * @return string
 	 */
 	public static function class_output($class) {
 		$u = new Utilities;
 		return esc_attr(trim(implode(' ', $class )));
 	}


	/**
	 * Process DOM
	 */
	function processdom( $content ) {
		$content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
	 // Hide warnings while we run this function
	 $previous_value = libxml_use_internal_errors(TRUE);
	 $doc = new \DOMDocument();
	 $doc->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
	 libxml_clear_errors();
	 libxml_use_internal_errors($previous_value);
		return $doc;
	}

	/**
	 * Parse a shortcode's contents for a tag and apply classes to each instance
	 * @param  [type] $tag     [description]
	 * @param  [type] $content [description]
	 * @param  [type] $class   [description]
	 * @param  string $title   [description]
	 * @param  [type] $data    [description]
	 * @return [type]          [description]
	 */

	public static function addclass( $finds, $content, $class, $nth = null ) {
		$u = new Utilities;
		$doc = $u->processdom($content);
		if(!$finds) {
			$root = $doc->documentElement;
			$finds = array($root->tagName);
		}
		foreach( $finds as $found ) {
			$tags = $doc->getElementsByTagName($found);
			foreach ($tags as $tag) {
				// Append the classes in $class to the tag's existing classes
				$tag->setAttribute(
					'class',
					$u->class_output(
						$class,
						$tag->getAttribute('class')
					)
				);
			}
		}
		return $doc->saveHTML($doc->documentElement);
	}
}
