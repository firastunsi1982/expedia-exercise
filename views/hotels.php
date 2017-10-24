<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Expedia - Hotels Offers!</title>
        <link rel="stylesheet" href="http://localhost/assets/style.css" type="text/css" media="screen" />
    </head>

    <?php //print_r($hotels);?>
    <body>
        <?php foreach ($hotels as $hotel): ?>
            <?php $offerDateRange = $hotel['offerDateRange']; ?>
            <?php $destination = $hotel['destination']; ?>
            <?php $hotelInfo = $hotel['hotelInfo']; ?>
            <?php $hotelUrgencyInfo = $hotel['hotelUrgencyInfo']; ?>
            <?php $hotelPricingInfo = $hotel['hotelPricingInfo']; ?>
            <?php $hotelUrls = $hotel['hotelUrls']; ?>
        
        
            <div>
                <ul>
                    <li>
                        <img src="http://lorempixum.com/100/100/nature/1" >
                            <h3>The Grasslands</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent euismod ultrices ante, ac laoreet nulla vestibulum adipiscing. Nam quis justo in augue auctor imperdiet.</p>
                    </li>

                    <li>
                        <img src="http://lorempixum.com/100/100/nature/2" >
                            <h3>Paradise Found</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent euismod ultrices ante, ac laoreet nulla vestibulum adipiscing. Nam quis justo in augue auctor imperdiet.</p>
                    </li>

                    <li>
                        <img src="http://lorempixum.com/100/100/nature/3" >
                            <h3>Smoke On The Water</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent euismod ultrices ante, ac laoreet nulla vestibulum adipiscing. Nam quis justo in augue auctor imperdiet.</p>
                    </li>

                    <li>
                        <img src="http://lorempixum.com/100/100/nature/4" >
                            <h3>Headline</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent euismod ultrices ante, ac laoreet nulla vestibulum adipiscing. Nam quis justo in augue auctor imperdiet.</p>
                    </li>
                </ul>
            </div>
        <?php endforeach; ?>
    </body>
</html>