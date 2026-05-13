<?php
/**
 * Title: Nutrition Coach – Hero Split
 * Slug: nutrition-coach/hero-split
 * Categories: featured, banner
 * Description: Two-column hero with rating badge, headline with accent highlight, CTA button, image, and learner count badge.
 */
$hero_img = esc_url( get_theme_file_uri( 'assets/images/hero.png' ) );
$star_img = esc_url( get_theme_file_uri( 'assets/images/hero-star.png' ) );
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"surface","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--50)">

<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|70"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center">

<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">

<!-- wp:group {"style":{"spacing":{"padding":{"top":"8px","bottom":"8px","left":"16px","right":"16px"},"margin":{"bottom":"24px","top":"0"}},"border":{"radius":"100px","color":"#E2E8F0","width":"1px"}},"backgroundColor":"base","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center","justifyContent":"left"}} -->
<div class="wp-block-group has-base-background-color has-background" style="border-color:#E2E8F0;border-width:1px;border-radius:100px;margin-top:0;margin-bottom:24px;padding-top:8px;padding-right:16px;padding-bottom:8px;padding-left:16px"><!-- wp:paragraph {"style":{"typography":{"fontSize":"14px","fontWeight":"600"},"color":{"text":"#1E293B"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<p class="has-text-color" style="color:#1E293B;margin-top:0;margin-bottom:0;font-size:14px;font-weight:600">4.8/5</p>
<!-- /wp:paragraph -->

<!-- wp:image {"sizeSlug":"full","style":{"spacing":{"margin":{"top":"0","bottom":"6px","left":"6px","right":"0"}}}} -->
<figure class="wp-block-image size-full" style="margin-top:0;margin-bottom:6px;margin-left:6px;margin-right:0"><img src="<?php echo $star_img; ?>" alt="5 stars"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"52px","fontWeight":"700","lineHeight":"1.1","letterSpacing":"-0.025em"},"spacing":{"margin":{"bottom":"8px","top":"0"}}}} -->
<h2 class="wp-block-heading" style="margin-top:0;margin-bottom:8px;font-size:52px;font-weight:700;letter-spacing:-0.025em;line-height:1.1">Where Learning Meets Real World Growth</h2>
<!-- /wp:heading -->

<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"52px","fontWeight":"700","lineHeight":"1.1","letterSpacing":"-0.025em"},"spacing":{"margin":{"bottom":"24px","top":"0"}},"color":{"text":"var:preset|color|accent"}}} -->
<h2 class="wp-block-heading has-text-color has-accent-color" style="margin-top:0;margin-bottom:24px;font-size:52px;font-weight:700;letter-spacing:-0.025em;line-height:1.1">Growth</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"17px","lineHeight":"1.65"},"color":{"text":"#64748B"},"spacing":{"margin":{"bottom":"40px","top":"0"}}}} -->
<p class="has-text-color" style="color:#64748B;margin-top:0;margin-bottom:40px;font-size:17px;line-height:1.65">Quality education designed to equip you with practical skills and industry-ready knowledge through our expertly crafted curriculum.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0"}}}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"accent","textColor":"base","style":{"border":{"radius":"100px"},"typography":{"fontSize":"15px","fontWeight":"600"},"spacing":{"padding":{"top":"16px","bottom":"16px","left":"32px","right":"32px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-accent-background-color has-text-color has-background has-custom-font-size wp-element-button" style="border-radius:100px;padding-top:16px;padding-right:32px;padding-bottom:16px;padding-left:32px;font-size:15px;font-weight:600">Explore Courses</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

</div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">

<!-- wp:group {"className":"nc-image-overlay-wrap","layout":{"type":"constrained"}} -->
<div class="wp-block-group nc-image-overlay-wrap">

<!-- wp:image {"sizeSlug":"full","style":{"border":{"radius":"24px"}}} -->
<figure class="wp-block-image size-full" style="border-radius:24px"><img src="<?php echo $hero_img; ?>" alt="Student learning on a tablet" style="border-radius:24px"/></figure>
<!-- /wp:image -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

</div>
<!-- /wp:group -->
