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
   <StreetAddress><?php echo $options['wprls_firm_name']; ?></StreetAddress>
   <UnitNumber></UnitNumber>
   <City></City>
   <State></State>
   <Zip></Zip>
   <Lat></Lat>
   <Long></Long>
   <DisplayAddress>No</DisplayAddress>
  </Location>
  <ListingDetails>
   <Status></Status>
   <Price></Price>
   <ListingUrl></ListingUrl>
   <MlsId></MlsId>
   <MlsName></MlsName>
   <VirtualTourUrl></VirtualTourUrl>
   <ListingEmail></ListingEmail>
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
    <NoPets></NoPets>
    <Cats></Cats>
    <SmallDogs></SmallDogs>
    <LargeDogs></LargeDogs>
  </PetsAllowed>
  </RentalDetails>
  <BasicDetails>
    <PropertyType></PropertyType>
    <Title></Title>
    <Description><![CDATA[<?php the_content(); ?>]]></Description>
    <Bedrooms></Bedrooms>
    <Bathrooms></Bathrooms>
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
   <FirstName></FirstName>
   <LastName></LastName>
   <EmailAddress></EmailAddress>
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
