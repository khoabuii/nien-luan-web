$(".menu1").next('ul').toggle();

$(".menu1").click(function(event) {
	$(this).next("ul").toggle(500);
});
function fadeoutfunction(){
    setTimeout(function(){
       $('[id$=messages]').fadeOut();
    },5000);
   }
$("document").ready(function(){
    setTimeout(function(){
        $("p.alert").remove();
    }, 7000 ); // 5 secs

});