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
    'posts_per_page'  => '-1',
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
   <UnitNumber></UnitNumber>
   <City>New York</City>
   <State></State>
   <Zip><?php echo get_post_meta($post->ID, "nt_prop_zip", true);?></Zip>
   <Lat></Lat>
   <Long></Long>
   <DisplayAddress></DisplayAddress>
  </Location>
  <ListingDetails>
   <Status><?php echo get_post_meta($post->ID, "nt_status", true);?></Status>
   <Price><?php echo rwmb_meta( wprls_price); ?></Price>
   <ListingUrl><?php the_permalink(); ?></ListingUrl>
   <MlsId><?php the_ID(); ?></MlsId>
   <MlsName></MlsName>
   <VirtualTourUrl></VirtualTourUrl>
   <ListingEmail><?php the_author_meta('user_email'); ?></ListingEmail>
   <AlwaysEmailAgent></AlwaysEmailAgent>
  </ListingDetails>
  <RentalDetails>
   <Availability>Required</Availability>
   <LeaseTerm>Required</LeaseTerm>
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
    <Title><?php the_title();?></Title>
    <Description><![CDATA[<?php the_content(); ?>]]></Description>
    <Bedrooms><?php echo get_post_meta($post->ID, "nt_bedrooms", true);?></Bedrooms>
    <Bathrooms><?php echo get_post_meta($post->ID, "nt_bathrooms", true);?></Bathrooms>
    <FullBathrooms></FullBathrooms>
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
   <FirstName>Required</FirstName>
   <LastName>Required</LastName>
   <EmailAddress><?php the_author_meta('user_email'); ?></EmailAddress>
   <PictureUrl></PictureUrl>
   <OfficeLineNumber></OfficeLineNumber>
   <MobilePhoneLineNumber>Required</MobilePhoneLineNumber>
   <FaxLineNumber></FaxLineNumber>
 </Agent>
 <Office>
  <BrokerageName><?php
$options = get_option( 'wprls_settings' );
echo $option = $options['wprls_firm_name'];
?></BrokerageName>
  <BrokerPhone><?php
$options = get_option( 'wprls_settings' );
echo $option = $options['wprls_firm_phone'];
?></BrokerPhone>
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
