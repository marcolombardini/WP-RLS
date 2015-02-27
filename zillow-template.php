<?php
/**
 * Zillow XML feed generator template.
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

<Listings>
<?php while( have_posts()) : the_post(); ?>
 <Listing>
  <Location>
   <StreetAddress></StreetAddress>
   <UnitNumber></UnitNumber>
   <City></City>
   <State></State>
   <Zip></Zip>
   <Lat></Lat>
   <Long></Long>
   <DisplayAddress><?php echo get_post_meta($post->ID, "nt_neighborhood", true);?></DisplayAddress>
  </Location>
  <ListingDetails>
   <Status></Status>
   <Price><?php listing_price();?></Price>
   <ListingUrl><?php the_permalink_rss() ?></ListingUrl>
   <MlsId><?php the_ID(); ?></MlsId>
   <MlsName></MlsName>
   <VirtualTourUrl></VirtualTourUrl>
   <ListingEmail><?php the_author_meta('user_email'); ?></ListingEmail>
   <AlwaysEmailAgent></AlwaysEmailAgent>
  </ListingDetails>
  <RentalDetails>
   <Availability><?php echo get_post_meta($post->ID, "nt_heating", true);?></Availability>
   <LeaseTerm></LeaseTerm>
   <DepositFees></DepositFees>
    <UtilitiesIncluded>
    <Water></Water>
    <Sewage></Sewage>
    <Garbage></Garbage>
    <Electricity></Electricity>
    <Gas></Gas>
    <Internet></Internet>
    <Cable></Cable>
    <SatTV></SatTV>
   </UtilitiesIncluded>
   <PetsAllowed>
    <NoPets><?php echo get_post_meta($post->ID, "nt_parking", true);?></NoPets>
    <Cats></Cats>
    <SmallDogs></SmallDogs>
    <LargeDogs></LargeDogs>
  </PetsAllowed>
  </RentalDetails>
  <BasicDetails>
    <PropertyType></PropertyType>
    <Title><?php the_title_rss() ?></Title>
    <Description><?php the_content(); ?></Description>
    <Bedrooms></Bedrooms>
    <Bathrooms></Bathrooms>
    <FullBathrooms></FullBathrooms>
    <HalfBathrooms></HalfBathrooms>
    <LivingArea></LivingArea>
    <LotSize></LotSize>
    <YearBuilt></YearBuilt>
 </BasicDetails>
 <Pictures>
  <Picture>
   <PictureUrl></PictureUrl>
   <Caption></Caption>
   </Picture><Picture>
   <PictureUrl><?php if (has_post_thumbnail() ):
      		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
      		echo $image[0]; ?>
      		<?php endif; ?></PictureUrl>
   <Caption></Caption>
  </Picture>
 </Pictures>
 <Agent>
   <FirstName><?php the_author() ?></FirstName>
   <LastName></LastName>
   <EmailAddress><?php the_author_meta('user_email'); ?></EmailAddress>
   <PictureUrl></PictureUrl>
   <OfficeLineNumber></OfficeLineNumber>
   <MobilePhoneLineNumber></MobilePhoneLineNumber>
   <FaxLineNumber></FaxLineNumber>
 </Agent>
 <Office>
  <BrokerageName></BrokerageName>
  <BrokerPhone></BrokerPhone>
  <StreetAddress></StreetAddress>
  <UnitNumber></UnitNumber>
  <City></City>
  <State></State>
  <Zip></Zip>
 </Office>
 <OpenHouses>
 </OpenHouses>
 <Neighborhood>
  <Name></Name>
  <Description></Description>
  </Neighborhood>
 <RichDetails>
  <AdditionalFeatures></AdditionalFeatures>
  <Appliances>
   <Appliance></Appliance>
   <Appliance></Appliance>
  </Appliances>
  <ArchitectureStyle></ArchitectureStyle>
   <Attic></Attic>
   <Basement></Basement>
   <CableReady></CableReady>
    <CoolingSystems>
     <CoolingSystem></CoolingSystem>
   </CoolingSystems>
   <Deck></Deck>
   <DoublePaneWindows></DoublePaneWindows>
   <ExteriorTypes>
    <ExteriorType></ExteriorType>
    <ExteriorType></ExteriorType>
   </ExteriorTypes>
   <Fireplace></Fireplace>
   <FloorCoverings>
    <FloorCovering></FloorCovering>
    <FloorCovering></FloorCovering>
    <FloorCovering></FloorCovering>
   </FloorCoverings>
   <Garden></Garden>
   <HeatingFuels>
    <HeatingFuel></HeatingFuel>
   </HeatingFuels>
   <HeatingSystems>
    <HeatingSystem></HeatingSystem>
   </HeatingSystems>
   <JettedBathTub></JettedBathTub>
   <Lawn></Lawn>
   <MotherInLaw></MotherInLaw>
   <NumFloors></NumFloors>
   <NumParkingSpaces></NumParkingSpaces>
   <ParkingTypes>
    <ParkingType></ParkingType>
    <ParkingType></ParkingType>
   </ParkingTypes>
   <Patio></Patio>
   <Porch></Porch>
    <RoofTypes>
     <RoofType></RoofType>
    </RoofTypes>
    <RoomCount></RoomCount>
    <Rooms>
     <Room></Room>
     <Room></Room>
     <Room></Room>
     <Room></Room>
     <Room></Room>
    </Rooms>
    <SecuritySystem></SecuritySystem>
    <Skylight></Skylight>
    <SprinklerSystem></SprinklerSystem>
    <ViewTypes>
     <ViewType></ViewType>
     <ViewType></ViewType>
    </ViewTypes>
    <Waterfront></Waterfront>
    <WhatOwnerLoves></WhatOwnerLoves>
    <YearUpdated></YearUpdated>
    <FitnessCenter></FitnessCenter>
    <BasketballCourt></BasketballCourt>
    <TennisCourt></TennisCourt>
    <NearTransportation></NearTransportation>
    <ControlledAccess></ControlledAccess>
    <Over55ActiveCommunity></Over55ActiveCommunity>
    <AssistedLivingCommunity></AssistedLivingCommunity>
    <Storage></Storage>
    <FencedYard></FencedYard>
    <PropertyName></PropertyName>
    <Furnished></Furnished>
    <HighspeedInternet></HighspeedInternet>
    <OnsiteLaundry></OnsiteLaundry>
    <CableSatTV></CableSatTV>
    <Taxes></Taxes>
 </RichDetails>
 </Listing>
<?php endwhile; ?>
</Listings>
