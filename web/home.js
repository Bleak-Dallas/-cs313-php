/**************************************************
* Author: Dallas Bleak
* Created: 07/11/2017
**************************************************/

$(function() {
    
     /************************************************
     * This function creates an image slide show within
     * the selected class.
     *************************************************/
     // image slide show variables
     var galleryImage = $(".gallery").find("img").first();
     var images = [
     	"images/82nd_sign.jpg",
     	"images/82nd_staticline.jpg",
        "images/82nd_jumpout.JPG",
        "images/82nd_jump.JPG",
        "images/82nd_gun1.jpg"
     ];
     // function for image slide ahow
     var i = 0;
     setInterval(function() {
     	i = (i + 1) % images.length;
     	galleryImage.fadeOut(function() {
     		$(this).attr("src", images[i]);
     		$(this).fadeIn();
     	});
     }, 3000);

   /**************************************************
    * MOVE PACMAN
    * These functions allow PacMan to move left and right 
    **************************************************/
    // variables for moving the box
    var ARROW_RIGHT = 39;
    var ARROW_LEFT = 37;
    var html =  $("html");
    var box = $(".pacman");
    // check which key was pressed
    html.keydown(function(event) {
        console.log(event.which);
    });
    // move box to the right
    html.keydown(function(event) {
        if(event.which == ARROW_RIGHT) {
            box.stop().animate({
            "margin-left": "+=20px" 
    }, 50);
        }
    });
    // move box to the left 
    html.keydown(function(event) {
        if(event.which == ARROW_LEFT) {
            box.stop().animate({
            "margin-left": "-=20px" 
    }, 50);
        }
    });

});