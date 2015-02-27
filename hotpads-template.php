<?php
/**
 * HotPads XML feed generator template.
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

 <hotPadsItems	version="2.1">
	 <?php while( have_posts()) : the_post(); ?>
 				<Company id	="company123">
 								<name>Revlon	Realty</name>
 								<website>http://somesite.com</website>
 								<CompanyLogo	source="http://yoursite.com/path/to/logo.gif" />
 				</Company>
 				<Listing id	="abc123" type	="RENTAL" companyId	="company123" propertyType	="CONDO ">
 								<name>The	Willows	at	Yorkshire</name>
 							<unit>55C</unit>		
 							<street	hide="false">124	Main	St.</street>
 								<city>El	Paso</city>
 								<state>CT</state>
 								<zip>00040</zip>
 								<country>US</country>	
 								<latitude>34.123456</latitude>		
 								<longitude>-77.654321</longitude>	
 							<lastUpdated>2014-08-13T00:36:00.000Z</lastUpdated>
 								<contactName>Rosemarie</contactName>
 								<contactEmail>rosemarie@somesite.com</contactEmail>
 								<contactPhone>123-456-7890</contactPhone>
 								<contactFax>123-456-7899</contactFax>
 								<contactTimes>
 												Sunday:	9:00	am	to	5:00	pm
 												Monday:	9:00	am	to	5:00	pm
 												Tuesday:	9:00	am	to	5:00	pm
 												Wednesday:	9:00	am	to	5:00	pm
 												Thursday:	9:00	am	to	5:00	pm
 												Friday:	9:00	am	to	5:00	pm
 												Saturday:	9:00	am	to	5:00	pm
 								</contactTimes>
 								<openHouses>
 												<openHouse>
 																<date>2013-09-29</date>
 																<startTime>1:00	PM</startTime>
 																<endTime>3:00	PM</endTime>
	<appointmentRequired>false</appointmentRequired>
												</openHouse>
												<openHouse>
																<date>2013-09-30</date>
																<startTime>2:00	PM</startTime>
																<endTime>4:30	PM</endTime>
																<appointmentRequired>false</appointmentRequired>
												</openHouse>
								</openHouses>
								<previewMessage>Spacious	Everything!</previewMessage>		
								<description>This	apartment	comes	with	3	parking	spaces.		Check	out	the	kitchen	photos
								</description>
								<terms>One	year	lease,	then	month	to	month.		Deposit	equals	first	month's	rent</terms>
								<leaseTerm>OneYear</leaseTerm>	
								<website>http://somesite.com/listings.asp?id=299</website>
								<virtualTourUrl>http://somesite.com</virtualTourUrl>
								<!-- Listing	tags	are	optional	-->
								<ListingTag	type="PROPERTY_AMENITY"><tag>Pool</tag></ListingTag>
								<ListingTag	type="MODEL_AMENITY"><tag>Washer/Dryer</tag></ListingTag>
								<ListingTag	type="MODEL_AMENITY_SELECT"><tag>Hardwood	Floors</tag></ListingTag>
								<ListingTag	type="RENT_INCLUDES"><tag>Gas</tag></ListingTag>
								<ListingTag	type="RENT_INCLUDES"><tag>Water</tag></ListingTag>
								<ListingTag	type="DOGS_ALLOWED"><tag>false</tag></ListingTag>
								<ListingTag	type =	"YEAR_BUILT"><tag>1995</tag></ListingTag>
								<ListingTag	type=" VIEW_TYPE"><tag>Ocean</tag></ListingTag>
								<ListingTag	type =	"ARCHITECTURE_STYLE"><tag>French</tag></ListingTag>
								<ListingTag	type =	"LAUNDRY"><tag>In_unit</tag></ListingTag>
								<ListingPermission>yourEmailAddress@example.com</ListingPermission>
								<ListingPhoto	source="http://yoursite.com/path/to/photo1.jpg">
												<label>Garage</label>	
												<caption>Park	your	car	here.</caption>
								</ListingPhoto>
								<ListingPhoto	source="http://yoursite.com/path/to/photo2.jpg">
												<label>Seesaw</label>
												<caption>A	rare	find!</caption>
								</ListingPhoto>
								<price>320000</price>
								<pricingFrequency>ONCE</pricingFrequency>	
								<HOA-Fee>295</HOA-Fee>
							 <deposit>750</deposit>
							 <numBedrooms>2</numBedrooms>
								<numFullBaths>2</numFullBaths>
								<numHalfBaths>1</numHalfBaths>
								<squareFeet>1500</squareFeet>
								<dateAvailable>2012-12-31</dateAvailable>	<!-- format:	YYYY-MM-DD	-->
				</Listing>
				<?php endwhile; ?>
</hotPadsItems>