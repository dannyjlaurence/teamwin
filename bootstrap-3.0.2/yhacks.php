<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="docs-assets/ico/favicon.png">

    <title>Carousel Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">
    <link href="yhacks.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
    <div class="row">
        <div class="col-lg-12">
        <h2 class="featurette-heading">BubHub<span class="text-muted">Read what's important</span></h2>
          <p class="lead"> A web application that uses k-means cluster and big data to display popular news stories from Twitter through a bubble map visual of the data.</p>
        </div>
    </div>


    <hr class="featurette-divider">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-12">


<?php

include 'database.inc.php';

stmt = $database->prepare("SELECT * FROM `category`");
$stmt->execute();
$res = $stmt->get_result();
$count = 1;
while($row = $res->fetch_array(MYSQLI_NUM)){
    echo "<div class = 'bubble' id = 't".$count++."'>".$row['cat_desc']."</div>";
}

?>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
        var topic = new Array();
        var tmpLeft, tmpTop;
        var currTopic;
        
        var count = 0;
        for (count = 0; count < 10; count++) {
            topic[count] = [];
            topic[count].topic = count;
            topic[count].topicNum = count;
            topic[count].subTopics = new Array();
            /*array for subtopics, will be used?*/
            for(var j = 0; j < 20; j++){
                topic[count].subTopics[j] = [];
            }
        }
        
        /*guesstimations ya feel*/
        topic[0].totalTweets = 10900;
        topic[1].totalTweets = 10890;
        topic[2].totalTweets = 8900;
        topic[3].totalTweets = 7000;
        topic[4].totalTweets = 11220;
        topic[5].totalTweets = 12560;
        topic[6].totalTweets = 13409;
        topic[7].totalTweets = 9000;
        topic[8].totalTweets = 10352;
        topic[9].totalTweets = 12459;
        
        /*STILL NEED TO SET SUBTOPICS
        AND GET PERCENTAGES*/
        
        
        
        var totalNumTweets = topic[1].totalTweets+topic[2].totalTweets+topic[3].totalTweets+
            topic[4].totalTweets+topic[5].totalTweets+topic[6].totalTweets+topic[7].totalTweets+
            topic[8].totalTweets+topic[9].totalTweets+topic[0].totalTweets;
            
        for(count = 0; count < 10; count++){
            topic[count].perc = Math.floor((topic[count].totalTweets / totalNumTweets)*1000);
        }
        
        /*not being used*/
        var subTopFunc = function(i){
            var subBubbles = new Array();
        //    $(".bubbles").css("display", "none");
            $(".bubble").hide();
            document.writeln("<head>");
            document.writeln("<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />");
            document.writeln("<title>BubHub</title>");
            document.writeln("<link rel='stylesheet' href='yhacks.css' type='text/css' />");
            document.writeln("</head><body>");
            document.body.style.backgroundColor = "rgb(60, 170, 130)";
            document.writeln("<h1 id='title'>BubHub</h1>");
            document.writeln("<h1 id='teamwin'>#TeamWin, YHACK2013</h1>");
            document.writeln("<p>");
            document.writeln("A web application that collects popular news stories through Twitter and creates a bubble map visual of the data.");
            document.writeln("</p>");
            document.writeln("<div id = 'subContainer'>");
            document.writeln("<span id = 'middleSubBubble'>&nbsp;</span>");
            for (count = 0; count < topic[i].subTopics.length; count++){
                document.writeln("<div class = 'subBubble'>"+topic[i].subTopics[count]+"</div>");
            }
            document.writeln("</div>");
        //Center the "info" bubble in the  "circle" div
        /*test first topic's subtopics, print something out*/
        
    $(document).ready(function(){
        
        var divTop = ($("#subContainer").height() - $("#middleSubBubble").height())/2;
        var divLeft = ($("#subContainer").width() - $("#middleSubBubble").width())/2;
        $("#middleSubBubble").css("top",divTop + "px");
        $("#middleSubBubble").css("left",divLeft + "px");
     //puts in circle
            count = 0;
            $("#subContainer div" ).each(function( index ) {
            radius = ($("#subContainer").width() - $(this).width())/2;
            tmpTop = (($("#subContainer").height()/2) + radius * Math.sin(start)) - ($(this).height()/2);
            tmpLeft = (($("#subContainer").width()/2) + radius * Math.cos(start)) - ($(this).width()/2);
            start += step; //arranges in a circle proportionately
                 
          //set the top/left settings for the image
            $(this).css("top",tmpTop);
            $(this).css("left",tmpLeft);
            $(this).css("width", 50+topic[i].subTopics[count].perc);
            $(this).css("height", 50+topic[i].subTopics[count].perc);
            count++;
            });
        });
        };
        
        document.writeln("<div id=\"container\">");
        document.writeln("<span id=\"middleBubble\">&nbsp;</span>");
        
        document.writeln("<div class = \"bubble\" id = 't0'>"+topic[0].topic+"</div>");
        document.writeln("<div class = \"bubble\" id = 't1'>"+topic[1].topic+"</div>");
        document.writeln("<div class = \"bubble\" id = 't2'>"+topic[2].topic+"</div>");
        document.writeln("<div class = \"bubble\" id = 't3'>"+topic[3].topic+"</div>");
        document.writeln("<div class = \"bubble\" id = 't4'>"+topic[4].topic+"</div>");
        document.writeln("<div class = \"bubble\" id = 't5'>"+topic[5].topic+"</div>");
        document.writeln("<div class = \"bubble\" id = 't6'>"+topic[6].topic+"</div>");
        document.writeln("<div class = \"bubble\" id = 't7'>"+topic[7].topic+"</div>");
        document.writeln("<div class = \"bubble\" id = 't8'>"+topic[8].topic+"</div>");
        document.writeln("<div class = \"bubble\" id = 't9'>"+topic[9].topic+"</div>");
        
        $("#t0").click(function(){
            subTopFunc(0);
        });
        document.writeln("</div>");
        $("#t1").click(function(){
            subTopFunc(1);
        });
        document.writeln("</div>");
        $("#t2").click(function(){
            subTopFunc(2);
        });
        document.writeln("</div>");
        $("#t3").click(function(){
            subTopFunc(3);
        });
        document.writeln("</div>");
        $("#t4").click(function(){
            subTopFunc(4);
        });
        document.writeln("</div>");
        $("#t5").click(function(){
            subTopFunc(5);
        });
        document.writeln("</div>");
        $("#t6").click(function(){
            subTopFunc(6);
        });
        document.writeln("</div>");
        $("#t7").click(function(){
            subTopFunc(7);
        });
        document.writeln("</div>");
        $("#t8").click(function(){
            subTopFunc(8);
        });
        document.writeln("</div>");
        $("#t9").click(function(){
            subTopFunc(9);
        });
        document.writeln("</div>");
        
    
    $(document).ready(function(){
        //Center the "info" bubble in the  "circle" div
        var divTop = ($("#container").height() - $("#middleBubble").height())/2;
        var divLeft = ($("#container").width() - $("#middleBubble").width())/2;
        $("#middleBubble").css("top",divTop + "px");
        $("#middleBubble").css("left",divLeft + "px");
        
     //Arrange the icons in a circle centered in the div
     numItems = $( "#container div" ).length; //How many items are in the circle?
     start = 0.25; //the angle to put the first image at. a number between 0 and 2pi
     step = (2*Math.PI)/numItems; //calculate the amount of space to put between the items.
    
     //puts in circle
     count = 0;
     $( "#container div" ).each(function( index ) {
          radius = ($("#container").width() - $(this).width())/2;
          tmpTop = (($("#container").height()/2) + radius * Math.sin(start)) - ($(this).height()/2);
          tmpLeft = (($("#container").width()/2) + radius * Math.cos(start)) - ($(this).width()/2);
          start += step; //arranges in a circle proportionately
                 
          //set the top/left settings for the image
          $(this).css("top",tmpTop);
          $(this).css("left",tmpLeft);
          $(this).css("width", 50+topic[count].perc);
          $(this).css("height", 50+topic[count].perc);
          count++;
     });
     
 });
</script>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->
      <hr class="featurette-divider">
  <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2013 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    
    </div><!-- /.container -->
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="docs-assets/js/holder.js"></script>
  </body>
</html>