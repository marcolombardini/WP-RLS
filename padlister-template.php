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
		'numberposts'     => '',
		'posts_per_page'  => 45,
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
		'paged'		  => '',
		'post_status'     => 'publish'
	);
query_posts( $args );?>

<PadMapperFeed  version="1.01">
<?php while( have_posts()) : the_post(); ?>
	<Listing>
		<!-- Required -->
		<ID><?php the_ID(); ?></ID> <!-- Unique ID for this listing, must stay the same from day to day -->
		<Price><?php listing_price();?></Price> <!-- Monthly Price -->
		<Bedrooms><?php echo get_post_meta($post->ID, "nt_bedrooms", true);?></Bedrooms>
		<FullBathrooms><?php echo get_post_meta($post->ID, "nt_bathrooms", true);?></FullBathrooms> <!-- These will become 2.5 baths on the site -->
		<PartialBathrooms></PartialBathrooms>
		<CatsAllowed></CatsAllowed> <!-- True or False - if Unknown, put False -->
		<SmallDogsAllowed></SmallDogsAllowed> <!-- True or False - if Unknown, put False -->
		<LargeDogsAllowed></LargeDogsAllowed> <!-- True or False - if Unknown, put False -->
		<Lister></Lister> <!-- One of Owner, BrokerWithFee, BrokerNoFee, ThirdPartyAgent, Subletter, RoomOrShare. If you're the property management company, choose Owner. If you're a website that represents others and you don't know who posted, choose ThirdPartyAgent -->
		<PropertyType></PropertyType> <!-- One of Apartment, House, Loft, Condo, Townhouse, Duplex -->
		<ContactName></ContactName> <!-- Preferably the name of the person the renters will be talking to, but failing this, can be a management company name -->
		<ContactEmail><?php the_author_meta('user_email'); ?></ContactEmail> <!-- Emailing this address must result in the message going directly to the lister. If this is not the case, your feed will be banned. -->
		<StreetAddress><?php echo get_post_meta($post->ID, "nt_prop_add", true);?></StreetAddress>
		<City>New York</City>
		<State>NY</State> 
		<Country>US</Country> <!-- Two letter country code. Some countries may not work, and many have no traffic.  -->
		<PostalCode><?php echo get_post_meta($post->ID, "nt_prop_zip", true);?></PostalCode>
		<Description><?php the_content(); ?></Description>
		<Photos> <!-- Listings with more and higher quality pictures tend to do a lot better, and will likely be ranked higher. May be limited to 8, so include the best first. -->
			<Photo>
				<URL><?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?></URL>
			</Photo>
			<Photo>
				<URL></URL>
			</Photo>
		</Photos>
		<!-- Optional (Everything below this line, until the /Listing tag) -->
		<!-- More complete listings may get higher ranking and more exposure due to higher perceived quality-->
		<OriginalURL><?php the_permalink_rss() ?></OriginalURL> <!-- The URL of this listing on your site. This is required if you'd like a listing to be posted directly to PadMapper with a link back to the original listing rather than being hosted on PadLister. Direct to PadMapper posting requires a partnership, since it requires more vetting on our end. Either way, you should include this in the feed if you have it, especially if you think you might change to direct to PadMapper at some point. -->
		<ContactPhone>646-397-3680</ContactPhone> <!-- Like the contact email, this must go directly to the lister. If this isn't followed, or the renter is told to go to another site to contact the person, the entire feed will be banned. -->
		
		<MinLeaseLength></MinLeaseLength> <!-- Integer  --> <!-- These will default to 1 year if not specified otherwise  -->
		<MinLeaseUnits></MinLeaseUnits> <!-- Month or Year  -->
		<Unit><?php echo get_post_meta($post->ID, "nt_unit_num", true);?></Unit>
		<DateAvailable></DateAvailable> <!-- Format is expected to be MM/DD/YYYY, leading zeroes not required. If this isn't included, it will be assumed to be available immediately. -->
		<Deposit></Deposit> <!-- Security deposit amount -->
		<SquareFootage></SquareFootage>
		<Parking></Parking> <!-- One of Street Parking, Parking Spot, Carport, Garage -->
		<AnonymizeAddress>True</AnonymizeAddress> <!-- True or False, but it's highly recommended that you leave this as false unless you need it to be True. -->
		<CommunityName></CommunityName>
		<NeighborhoodName><?php echo get_post_meta($post->ID, "nt_neighborhood", true);?></NeighborhoodName>
		<Amenities> <!-- These are free text. Try to use common language for them so that they'll come up in searches. -->
			<Amenity>
				Washer/Dryer
			</Amenity>
			<Amenity>
				Dog Park
			</Amenity>
			<Amenity>
				Pool
			</Amenity>
			<Amenity>
				Barbecue Pit
			</Amenity>
			<Amenity>
				Patio
			</Amenity>
		</Amenities>
	</Listing>
	<?php endwhile; ?>
</PadMapperFeed>
