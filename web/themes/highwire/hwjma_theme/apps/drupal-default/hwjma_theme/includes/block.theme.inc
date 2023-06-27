<?php

use Drupal\Core\Url;
use Drupal\Core\Template\Attribute;

/**
 * Implements hook_preprocess_THEME().
 */
function hwjma_preprocess_block__image_block(&$variables) {
  if (empty($variables['content']['#block_content']) || empty($variables['content']['field_image'][0])) {
    return;
  }

  // Add url to image formatter if it is not empty.
  $block_content = $variables['content']['#block_content'];
  if ($block_content->hasField('field_url') && !$block_content->get('field_url')->isEmpty()) {
    $url_field = $block_content->get('field_url')->first()->getValue();
    if (!empty($url_field['uri'])) {
      $variables['content']['field_image'][0]['#url'] = Url::fromUri($url_field['uri']);
    }
  }

  // Set image_formatter__2x theme hook for retina support.
  if (!empty($variables['content']['field_image'][0]['#item'])) {
    $variables['content']['field_image'][0]['#theme'] = 'image_formatter__2x';
  }
}

/**
 * Implements hook_preprocess_THEME().
 */
function hwjma_preprocess_image_formatter(&$variables) {
  // Add url_attributes.
  if (!empty($variables['url'])) {
    $variables['url_attributes'] = new Attribute([]);

    // Open external links in new window.
    if ($variables['url']->isExternal()) {
      $variables['url_attributes']['target'] = '_blank';
    }
  }
}

/**
 * Implements hook_preprocess_THEME().
 */
function hwjma_preprocess_image_formatter__2x(&$variables) {
  if (empty($variables['item']) || empty($variables['image'])) {
    return;
  }

  // Set width & height to half natural value to support retina display.
  // This requires the source image to be twice as large as it is meant to be displayed.
  // (E.g. to display an image at 100x100 in the browser, upload the image at 200x200.)
  $img_props = $variables['item']->getProperties();
  $width = !empty($img_props['width']) ? $img_props['width']->getValue() : '';
  $height = !empty($img_props['height']) ? $img_props['height']->getValue() : '';
  if (!empty($width)) {
    $variables['image']['#width'] = $width / 2;
  }
  if (!empty($height)) {
    $variables['image']['#height'] = $height / 2;
  }
}
