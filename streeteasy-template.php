<?php
/**
 * Streeteasy XML feed generator template.
 */
header('Content-Type: ' . feed_content_type('rss-http') . '; charset=' . get_option('blog_charset'), true);
$more = 1;
echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>'; ?>
<?php
 global $query_string;
    $args = array(
    'posts_per_page'  =>  -1,
    'orderby'         => 'date',
    'order'           => 'DESC',
    'post_type'       => 'property',
    'post_status'     => 'publish'
);
query_posts( $args );?>

 <streeteasy version="1.6">
<?php while( have_posts()) : the_post(); ?>
  <properties>
    <property status="active" type="sale" id="<?php the_ID(); ?>" url="<?php the_permalink_rss() ?>">
      <location>
        <address></address>
        <apartment></apartment>
        <city></city>
        <state></state>
        <zipcode></zipcode>
        <neighborhood><?php echo get_post_meta($post->ID, "nt_neighborhood", true);?></neighborhood>
      </location>
      <details>
        <mlsName></mlsName>
        <mlsId><?php the_ID(); ?></mlsId>
        <price></price>
        <maintenance></maintenance>
        <exclusive/>
        <taxes></taxes>
        <bedrooms></bedrooms>
        <bathrooms></bathrooms>
        <totalrooms></totalrooms>
        <squareFeet></squareFeet>
        <listedOn></listedOn>
        <description>
        <![CDATA[
]]>
</description>
        <propertyType></propertyType>
        <amenities>
          <doorman />
          <prewar />
          <other></other>
        </amenities>
      </details>
      <openHouses>
        <openHouse>
          <startsAt></startsAt>
          <endsAt></endsAt>
          <apptOnly></apptOnly>
        </openHouse>
      </openHouses>
<?php  $args = array(
            'post_parent'    => $post->ID,
            'post_type'      => 'attachment',
            'numberposts'    => -1, // show all
            'post_status'    => 'any',
            'post_mime_type' => 'image',
            'orderby'        => 'menu_order',
            'order'           => 'ASC'
       );

$images = get_posts($args);
if($images) { ?>
<?php foreach($images as $image) { ?>
      <media>
<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
      </media>
<?php } ?><?php } ?>
      <agents>
        <agent id="MB12514">
         <name></name>
         <photo></photo>
         <email></email>
         <lead_email></lead_email>
         <url></url>
        </agent>
        <agent id="MW12312">
         <name></name>
         <photo></photo>
         <email></email>
         <lead_email></lead_email>
         <url></url>
        </agent>
      </agents>
    </property>
  </properties>
<?php endwhile; ?>
</streeteasy>