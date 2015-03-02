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
    'posts_per_page'  => -1,
    'orderby'         => 'date',
    'order'           => 'DESC',
    'post_type'       => 'property',
    'post_status'     => 'publish'
);
query_posts( $args );?>

<Listings>
<?php while( have_posts()) : the_post(); ?>
 <Listing>
  <Location>
   <StreetAddress><?php echo get_post_meta($post->ID, "nt_prop_add", true);?></StreetAddress>
   <UnitNumber><?php echo get_post_meta($post->ID, "nt_unit_num", true);?></UnitNumber>
   <City>New York</City>
   <State>New York</State>
   <Zip><?php echo get_post_meta($post->ID, "nt_prop_zip", true);?></Zip>
   <Lat></Lat>
   <Long></Long>
   <DisplayAddress>No</DisplayAddress>
  </Location>
  <ListingDetails>
   <Status><?php realto_property_prop_tags(); ?></Status>
   <Price><?php listing_price();?></Price>
   <ListingUrl><?php the_permalink_rss() ?></ListingUrl>
   <MlsId><?php the_ID(); ?></MlsId>
   <MlsName></MlsName>
   <VirtualTourUrl></VirtualTourUrl>
   <ListingEmail><?php the_author_meta('user_email'); ?></ListingEmail>
   <AlwaysEmailAgent></AlwaysEmailAgent>
  </ListingDetails>
  <RentalDetails>
   <Availability></Availability>
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
    <Description><![CDATA[<?php the_content(); ?>]]></Description>
    <Bedrooms><?php echo get_post_meta($post->ID, "nt_bedrooms", true);?></Bedrooms>
    <Bathrooms><?php echo get_post_meta($post->ID, "nt_bathrooms", true);?></Bathrooms>
    <FullBathrooms><?php echo get_post_meta($post->ID, "nt_bathrooms", true);?></FullBathrooms>
    <HalfBathrooms></HalfBathrooms>
    <LivingArea></LivingArea>
    <LotSize></LotSize>
    <YearBuilt></YearBuilt>
 </BasicDetails>
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
<Pictures>
  <?php foreach($images as $image) { ?>
   <Picture>
    <PictureUrl><?php echo wp_get_attachment_url($image->ID); ?></PictureUrl>
     <Caption></Caption>
  </Picture>
  <?php } ?>
</Pictures>
<?php } ?>
 <Agent>
   <FirstName><?php the_author_meta('first_name'); ?></FirstName>
   <LastName><?php the_author_meta('last_name'); ?></LastName>
   <EmailAddress><?php the_author_meta('user_email'); ?></EmailAddress>
   <PictureUrl></PictureUrl>
   <OfficeLineNumber>646-397-3680</OfficeLineNumber>
   <MobilePhoneLineNumber></MobilePhoneLineNumber>
   <FaxLineNumber></FaxLineNumber>
 </Agent>
 <Office>
  <BrokerageName>Resident Media Group</BrokerageName>
  <BrokerPhone>646-397-3680</BrokerPhone>
  <StreetAddress></StreetAddress>
  <UnitNumber></UnitNumber>
  <City></City>
  <State></State>
  <Zip></Zip>
 </Office>
 <OpenHouses>
 </OpenHouses>
 <Neighborhood>
  <Name><?php echo get_post_meta($post->ID, "nt_neighborhood", true);?></Name>
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
