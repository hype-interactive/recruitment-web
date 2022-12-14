var $grid = $('.grid').masonry({
  itemSelector: '.grid-item',
  percentPosition: true,
  columnWidth: '.grid-sizer',
});

$grid.imagesLoaded().progress( function() {
$grid.masonry('layout');
});  


// custom query images by album name implementation using ajax
function getAlbum(str) {
// console.log(str);
$grid.masonry( 'remove', $grid.find('.grid-item') );

if (str.length==0) { 
  document.getElementById("gallery").innerHTML="";
  return;
  }
  if (window.XMLHttpRequest) {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
  if (this.readyState==4 && this.status==200) {
    resp = JSON.parse(this.responseText).results;


    console.log(resp);


  for (let index = 0; index < resp.length; index++) {

    var url = resp[index].url;

    
    var $item = $("<div class='grid-item'><img src="+ url.replace("public","storage")+ " /></div>");
    $grid.append(  $item)
    .masonry( 'appended', $item);
  }

  $grid.imagesLoaded().done(function(){
    $grid.masonry('layout');
  })

     

    var $this;
    $('.pills .pill-wrapper button').each(function(){
      $('.pills').find('.active').removeClass('active');
    if($(this).attr('value') == str){
      return $this = $(this);
    };if($(this).attr('value') == 0){
      return $this = $(this);
    }
  })
  $this.parent().addClass('active');
  }
  }

  xmlhttp.open("GET","search_images/?q="+str, true);
  xmlhttp.send();


}

// http://127.0.0.1:8000/storage/uploaded_img/4zU1Kzm6MN0mxKUysVbAsi1c2sbp7s1hNvbwgMYe.png
// http://127.0.0.1:8000/public/uploaded_img/4zU1Kzm6MN0mxKUysVbAsi1c2sbp7s1hNvbwgMYe.png

// window.location.hostname+
