<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Expedia - Hotels Offers!</title>
        <link rel="stylesheet" href="<?php echo $config['SITE_PROTOCOL'] . $config['BASEURL'] . '/' . $config['APP'] ?>/assets/style.css" type="text/css" media="screen" />
    </head>
    <body>
        <form name="searchHotel" action="hotels.php" method="GET">
            <span>Expedia API Search:</span><br/>
            <label>Destination Name </label><input value="<?php echo $_GET['destName'];?>" name="destName" type="text" placeholder="New York"/>
            <label>Destination City </label><input value="<?php echo $_GET['destCity'];?>" name="destCity" type="text" placeholder="New York"/>
            <label>Min Trip Start Date </label><input value="<?php echo $_GET['minTripSt'];?>" name="minTripSt" type="text" placeholder="2017-05-03"/>
            <label>Max Trip Start Date </label><input value="<?php echo $_GET['maxTripSt'];?>" name="maxTripSt" type="text" placeholder="2017-05-10"/>
            <label>Length Of Stay </label><input value="<?php echo $_GET['lenStay'];?>" name="lenStay" type="text" placeholder="2"/>
            <label>Region ID</label><input value="<?php echo $_GET['regionIds'];?>" name="regionIds" type="text" placeholder="6126616,6057480"/>
            <label>Min Star Rating </label><input value="<?php echo $_GET['minRateSt'];?>" name="minRateSt" type="text" placeholder="2"/>
            <label>Max Star Rating </label><input value="<?php echo $_GET['maxRateSt'];?>" name="maxRateSt" type="text" placeholder="5"/>
            <label>Min Total Rate </label><input value="<?php echo $_GET['minTotlRate'];?>" name="minTotlRate" type="text" placeholder="3"/>
            <label>Max Total Rate </label><input value="<?php echo $_GET['maxTotlRate'];?>" name="maxTotlRate" type="text" placeholder="50"/>
            <label>Min Guest Rating </label><input value="<?php echo $_GET['minGustRate'];?>" name="minGustRate" type="text" placeholder="2"/>
            <label>Max Guest Rating </label><input value="<?php echo $_GET['maxGustRate'];?>" name="maxGustRate" type="text" placeholder="50"/><br/><br/>
            <input type="submit" name="searchBtn" value="Search"/>
        </form>
        
        <div class="main">
        <?php foreach ($hotels as $hotel): ?>
            <?php $offerDateRange = $hotel['offerDateRange']; ?>
            <?php $travelStartDate = $offerDateRange['travelStartDate'][0].'-'.$offerDateRange['travelStartDate'][1].'-'.$offerDateRange['travelStartDate'][2];?>
            <?php $travelEndDate = $offerDateRange['travelEndDate'][0].'-'.$offerDateRange['travelEndDate'][1].'-'.$offerDateRange['travelEndDate'][2];?>
            <?php $destination = $hotel['destination']; ?>
            <?php $hotelInfo = $hotel['hotelInfo']; ?>
            <?php $hotelUrgencyInfo = $hotel['hotelUrgencyInfo']; ?>
            <?php $hotelPricingInfo = $hotel['hotelPricingInfo']; ?>
            <?php $hotelUrls = $hotel['hotelUrls']; ?>
        
            <?php if ($hotelUrgencyInfo['almostSoldStatus'] == $config['ROOM_STATUS']['AVAILABLE'][0]):?>
               <?php $styleColor ='style="color:green"';?>
               <?php $styleOpacity ='';?>
               <?php $status = $config['ROOM_STATUS']['AVAILABLE'][1];?>
            <?php else:?>
                 <?php $styleColor ='style="color:red"';?>
                 <?php $styleOpacity ='style="opacity:0.6"';?>
                <?php $status = $config['ROOM_STATUS']['ALMOST_SOLD'][1];?>
            <?php endif;?>
            <div>
                <ul>
                    <a target="_blank" href="<?php echo urldecode($hotelUrls['hotelInfositeUrl']);?>">
                        <li <?php echo $styleOpacity;?>>
                            <img src="<?php echo $hotelInfo['hotelImageUrl'];?>"/>
                            <h3><?php echo $hotelInfo['hotelName'];?></h3>
                            <p>
                                <span <?php echo $styleColor;?>><b><?php echo $status;?></b></span>
                                <span>Travel start date: <?php echo $travelStartDate;?>, Travel end date: <?php echo $travelStartDate;?></span>
                                <span>Stay: <?php echo $offerDateRange['lengthOfStay'];?> Days.</span>
                                <span>City: <?php echo $destination['city'];?>, <?php echo $destination['country'];?> </span>
                                <span>Address: <?php echo $hotelInfo['hotelStreetAddress'];?></span>
                                <span>Rating: <?php echo $hotelInfo['hotelStarRating'];?></span>
                                <span>Review : <?php echo $hotelInfo['hotelReviewTotal'];?></span>
                                <span>People Views: <?php echo $hotelUrgencyInfo['numberOfPeopleViewing'];?></span>
                                <span>People Booked: <?php echo $hotelUrgencyInfo['numberOfPeopleBooked'];?></span>
                                <span>Available rooms: <?php echo $hotelUrgencyInfo['numberOfRoomsLeft'];?></span>
                                <span>Price/Night: <?php echo $hotelPricingInfo['originalPricePerNight'];?> USD</span>
                                <span>Total Price: <?php echo $hotelPricingInfo['totalPriceValue'];?> USD</span>
                                <span>Saved : <?php echo $hotelPricingInfo['percentSavings'];?>%</span>
                            </p>
                        </li>
                    </a>
                </ul>
            </div>
        <?php endforeach; ?>
        </div>
    </body>
</html>