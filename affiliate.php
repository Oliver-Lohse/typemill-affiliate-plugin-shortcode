<?php

namespace Plugins\affiliate;

use \Typemill\Plugin;

class affiliate extends Plugin {

  protected $settings;

  public static function getSubscribedEvents() {
    return array(
      'onShortcodeFound' => 'onShortcodeFound'
    );
  }

  public function onShortcodeFound($shortcode) {
    $shortcodeArray = $shortcode->getData();
    if(is_array($shortcodeArray) && $shortcodeArray['name'] == 'affiliate') {
      $shortcode->stopPropagation();
      
      $title        = isset($shortcodeArray['params']['title'])       ? $shortcodeArray['params']['title'] : 'Titel';
      $description  = isset($shortcodeArray['params']['description']) ? $shortcodeArray['params']['description'] : 'Fallback text';
      $logo         = isset($shortcodeArray['params']['logo'])        ? $shortcodeArray['params']['logo'] : 'green';
      $link         = isset($shortcodeArray['params']['link'])        ? $shortcodeArray['params']['link'] : 'green';
      
      $html         = '<br><hr>';
      //$html        .= '<a href="'.$link.'">';
      $html        .= '<img src="'.$logo.'" style="background-color: #ffffff; padding: 7px; border: 1px solid #cccccc; float: left; width: 120px; margin-right: 15px; margin-bottom: 5px; border-radius: 5px;">';
      //$html        .= '</a>';
      $html        .= '<strong>'.$title.'</strong>';
      $html        .= ' - '.$description;
      $html        .= ' <a href="'.$link.'" style="background-color: DarkSlateGray; color: #ffffff; border-radius: 4px; padding-left: 5px; padding-right: 5px; text-decoration: none;"><small>kaufen...</small></a>';
      $html        .= '<hr><br>';
      
      $shortcode->setData($html);
    }
  }
}
?>