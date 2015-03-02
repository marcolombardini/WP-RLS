<?php
/**
 * PadLister XML feed generator template.
 */
header('Content-Type: ' . feed_content_type('rss-http') . '; charset=' . get_option('blog_charset'), true);
$more = 1;
echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>'; ?>
<?php
 global $query_string;
    $args = array(
    'posts_per_page'  =>  1,
    'orderby'         => 'date',
    'order'           => 'DESC',
    'post_type'       => 'property',
    'post_status'     => 'publish'
);
query_posts( $args );?>

<PadMapperFeed  version="1.01">
<?php while( have_posts()) : the_post(); ?>
	<Listing>
		<ID><?php the_ID(); ?></ID>
		<Price><?php listing_price();?></Price>
		<Bedrooms><?php echo get_post_meta($post->ID, "nt_bedrooms", true);?></Bedrooms> 
                <FullBathrooms><?php echo get_post_meta($post->ID, "nt_bathrooms", true);?></FullBathrooms> 
		<PartialBathrooms></PartialBathrooms>
		<CatsAllowed></CatsAllowed> 
		<SmallDogsAllowed></SmallDogsAllowed> 
		<LargeDogsAllowed></LargeDogsAllowed> 
		<Lister>BrokerWithFee</Lister> 
		<PropertyType></PropertyType>
		<ContactName><?php the_author(); ?></ContactName>
		<ContactEmail><?php the_author_meta('user_email'); ?></ContactEmail>
		<StreetAddress><?php echo get_post_meta($post->ID, "nt_prop_add", true);?></StreetAddress>
		<City>New York</City>
		<State>NY</State> 
		<Country>US</Country>
		<PostalCode><?php echo get_post_meta($post->ID, "nt_prop_zip", true);?></PostalCode>
		<Description><![CDATA[<?php the_content(); ?>]]></Description>		
		<Photos> 
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
			<Photo>
<?php foreach($images as $image) { ?>
<URL><?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?></URL>
<?php } ?>
			</Photo>
  <?php } ?>
		</Photos>
		<OriginalURL><?php the_permalink_rss() ?></OriginalURL> 
		<ContactPhone>646-397-3680</ContactPhone> 
		<MinLeaseLength></MinLeaseLength> 
		<MinLeaseUnits></MinLeaseUnits> 
		<Unit><?php echo get_post_meta($post->ID, "nt_unit_num", true);?></Unit>
		<DateAvailable></DateAvailable> 
		<Deposit></Deposit> 
		<SquareFootage></SquareFootage>
		<Parking></Parking> 
		<AnonymizeAddress>True</AnonymizeAddress>
		<CommunityName></CommunityName>
		<NeighborhoodName><?php echo get_post_meta($post->ID, "nt_neighborhood", true);?></NeighborhoodName>
		<Amenities> 
			<Amenity>
			</Amenity>
		</Amenities>
	</Listing>
	<?php endwhile; ?>
</PadMapperFeed>
