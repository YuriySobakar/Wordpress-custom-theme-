<?php get_header(); ?>

<section class="container-sm vh-100">
  <h1 class="title">
    <?= get_the_title(); ?>
  </h1>

  <article class="text fs-5">
    <?= get_the_content(); ?>
  </article>

  <article class="text fs-1">
    Playground:
    <div class="container fs-3">
<p class="text fs-1 ">
<?php
      
      $cars = array(
        array("brand" => "Toyota", "model" => "Camry", "year" => 2020),
        array("brand" => "Honda", "model" => "Civic", "year" => 2019),
        array("brand" => "Ford", "model" => "Fusion", "year" => 2018),
        array("brand" => "Chevrolet", "model" => "Malibu", "year" => 2017),
        array("brand" => "Nissan", "model" => "Altima", "year" => 2016),
        array("brand" => "Hyundai", "model" => "Elantra", "year" => 2015),
        array("brand" => "Volkswagen", "model" => "Jetta", "year" => 2014),
        array("brand" => "BMW", "model" => "3 Series", "year" => 2013),
        array("brand" => "Mercedes-Benz", "model" => "C-Class", "year" => 2012),
        array("brand" => "Audi", "model" => "A4", "year" => 2011),
        array("brand" => "Kia", "model" => "Optima", "year" => 2010),
        array("brand" => "Mazda", "model" => "Mazda6", "year" => 2009),
        array("brand" => "Subaru", "model" => "Legacy", "year" => 2008),
        array("brand" => "Lexus", "model" => "IS", "year" => 2007),
        array("brand" => "Infiniti", "model" => "G35", "year" => 2006)
    );
    
    $count = 0;
    while ($count <= 3) {
      echo  "$count). " . $cars[$count]["brand"] . " - " . $cars[$count]["model"] . " since " . $cars[$count]['year'];
      echo "<br>";
      $count++;
    }

    $display_brands_count = fn() => count($cars[0]);

    echo "Brand count is:" . $display_brands_count();

    $cars = array("Volvo", "BMW", "Toyota");

    foreach ($cars as &$x) {
      $x = "Ford";
    }

    $x = "ice cream";

    // var_dump($cars);

    $cars1 = array("brand" => "Ford", "model" => "Mustang");
    $cars2 = ["color" => "red", "year" => 1964];
    $cars1 += $cars2;
    echo "<br> cars2";

    var_dump($cars1)

 ?>
</p>
    </div>
  </article>
  
</section>

<?php get_footer(); ?>