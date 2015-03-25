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
    <property status="Required" type="sale" id="Required" url="Required">
      <location>
        <address>Required</address>
        <apartment>Required</apartment>
        <city>Required</city>
        <state>Required</state>
        <zipcode>Required</zipcode>
        <neighborhood>Required</neighborhood>
      </location>
      <details>
        <mlsName></mlsName>
        <mlsId>Required</mlsId>
        <price>Required</price>
        <maintenance></maintenance>
        <exclusive/>
        <taxes></taxes>
        <bedrooms>Required</bedrooms>
        <bathrooms>Required</bathrooms>
        <totalrooms>Required</totalrooms>
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
        <agent id="Required">
         <name></name>
         <photo></photo>
         <email></email>
         <lead_email>Required</lead_email>
         <url></url>
        </agent>
        <agent id="Required">
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
