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
		'numberposts'     => '',
		'posts_per_page'  => 1,
		'offset'          => 0,
		'cat'       	  =>  '',
		'orderby'         => 'date',
		'order'           => 'DESC',
		'include'         => '',
		'exclude'         => '',
		'meta_key'        => '',
		'meta_value'      => '',
		'post_type'       => 'property',
		'post_mime_type'  => '',
		'post_parent'     => '',
		'paged'			  => '',
		'post_status'     => 'publish'
	);
query_posts( $args );?>

<?php while( have_posts()) : the_post(); ?>

<streeteasy version="1.6">
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
      <media>
      </media>
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
</streeteasy>
<?php endwhile; ?>