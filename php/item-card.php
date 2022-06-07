<?php
function itemcard(){
    $element = " 
        <div class=\"col-md-3 col-sm-6 my-3 my-md-0 p-2\">
            <form action=\"index.php\" method=\"post\">
                <div class=\"card shadow\">
                    <div>
                        <img src=\"images/crab.JPG\" class=\"img-fluid card-img-top\"> 
                    </div>

                    <div class=\"card-body\">
                        <h3 class=\"card-title\"> PRODUCT NAME </h3>
                        <h6>
                            <i class=\"fa fa-star\"></i>
                            <i class=\"fa fa-star\"></i>
                            <i class=\"fa fa-star\"></i>
                            <i class=\"fa fa-star\"></i>
                            <i class=\"far fa-star\"></i>
                        </h6>
                        <h5> 
                        <small><s>$599</s></small>
                        $200
                        </h5>
                        <p> 
                            This is demo description text
                        </p>

                        <p style=\"text-align: left;\">
                            <small>
                            <i class=\"fa fa-fish\"></i> Available: 200 Kilos <br>
                            <i class=\"fa fa-hashtag\"></i> Category: Fish </small>
                        </p>
                        <button type=\"submit\" name=\"add\"class=\"btn btn-success my-3\">
                            <i class=\"fa fa-shopping-cart\"></i>
                            Add to Cart
                        </button>
                    </div>

                </div>
            </form>
        </div>    
    ";
    echo $element;
}
    
?>