<?php
/**
 * @file
 * Contains \Drupal\hwjma_basic_config\Plugin\Block\SocialMediaBlock.
 */
namespace Drupal\hwjma_basic_config\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Component\Render\FormattableMarkup;

/**
 * Provides a block with a simple text.
 *
 * @Block(
 *   id = "social_media_block",
 *   admin_label = @Translation("Social Media block"),
 * )
 */
class SocialMediaBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {

    $config = \Drupal::config('hwjma_basic_config.settings');

    $facebook = $config->get('footer_facebook');
    $twitter = $config->get('footer_twitter');
    $youtube = $config->get('footer_youtube');
    $linkedin = $config->get('footer_linkedin');

    $output = '<div class="flex flex-wrap">
    <div class="flex-grow w-full social-share">';

    if(!empty($twitter)){
      $output .= '<a class="twitter" href="'.$twitter.'" title="Follow on Twitter" class="fa fa-twitter"></a>';
    }

    if(!empty($facebook)){
      $output .= '<a class="facebook" href="'.$facebook.'" title="Follow on Facebook">
        <svg height="21px" version="1.1" viewBox="0 0 22 21" width="22px" xmlns="http://www.w3.org/2000/svg">
          <title></title>
          <g fill="none" fill-rule="evenodd" id="Symbols" stroke="none" stroke-width="1">
            <g id="fb">
              <rect height="20.38" id="Rectangle-Copy-6" width="22" x="0" y="0"></rect>
              <path d="M9.128,20.375 L9.128,11.081 L6,11.081 L6,7.459 L9.128,7.459 L9.128,4.788 C9.128,1.688 11.021,0 13.787,0 C15.112,0 16.25,0.099 16.582,0.143 L16.582,3.383 L14.664,3.384 C13.16,3.384 12.869,4.099 12.869,5.147 L12.869,7.46 L16.456,7.46 L15.989,11.082 L12.869,11.082 L12.869,20.375 L9.128,20.375 Z" fill="#FFFFFF" fill-rule="nonzero" id="Path-Copy"></path>
            </g>
          </g>
        </svg>
      </a>';
    }

    if(!empty($youtube)){
      $output .= '<a class="youtube" href="'.$youtube.'" title="Follow on YouTube">
        <svg height="21px" version="1.1" viewBox="0 0 22 21" width="22px" xmlns="http://www.w3.org/2000/svg">
          <title></title>
          <g fill="none" fill-rule="evenodd" id="Symbols" stroke="none" stroke-width="1">
            <g id="yt">
              <rect height="20.38" id="Rectangle-Copy-8" width="22" x="0" y="0"></rect>
              <polygon fill="#FFFFFF" fill-rule="nonzero" id="Path-Copy" points="3 18 3 2 19 9.986 3 18"></polygon>
            </g>
          </g>
        </svg>
      </a>';
    }

    if(!empty($linkedin)){
      $output .= '<a class="linkedin" href="'.$linkedin.'" title="Follow on LinkedIn">
        <svg height="21px" version="1.1" viewBox="0 0 22 21" width="22px" xmlns="http://www.w3.org/2000/svg">
          <title></title>
          <g fill="none" fill-rule="evenodd" id="Symbols" stroke="none" stroke-width="1">
            <g id="li">
              <rect height="20.38" id="Rectangle-Copy-7" width="22" x="0" y="0"></rect>
              <path d="M5.83606557,6.66085246 L5.83606557,19.644459 L2.29508197,19.644459 L2.29508197,6.66085246 L5.83606557,6.66085246 Z M11.7377049,6.66085246 L11.7377049,8.74413115 C13.3854426,5.69180328 20,5.46636066 20,11.666623 L20,19.644459 L16.4590164,19.644459 L16.4590164,13.0299016 C16.4590164,9.05455738 11.7377049,9.35554098 11.7377049,13.0299016 L11.7377049,19.644459 L8.19672131,19.644459 L8.19672131,6.66085246 L11.7377049,6.66085246 Z M4.06557377,1 C5.20577049,1 6.13114754,1.93245902 6.13114754,3.08209836 C6.13114754,4.2317377 5.20695082,5.16419672 4.06557377,5.16419672 C2.92537705,5.16419672 2,4.2317377 2,3.08209836 C2,1.93245902 2.92537705,1 4.06557377,1 Z" fill="#FFFFFF" fill-rule="nonzero" id="Combined-Shape-Copy"></path>
            </g>
          </g>
        </svg>
      </a>';
    }
      
    $output .= '</div>
        </div>';


        return [
          '#theme' => 'social_media_block',
          '#social' => $output,
        ];
  /*  return array(
      '#type' => 'markup',
      '#markup' => $value,
      'ALLOWED_TAGS' => ['a', 'svg','title','g','rect','path','div','i'],
    );  */
  }
}