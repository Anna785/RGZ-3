<?php Use \yii\helpers\Html;?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>
  
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="https://snoska.ru/images/covers/6c/af/6cafad5d-30e8-5e38-b497-4fe5f7f085e6.jpg" alt="Book">
    </div>

    <div class="item">
      <img src="https://snoska.ru/images/covers/e0/1b/e01b76b2-5f79-599f-9e9f-3c59de7ea3be.jpg" alt="Book">
    </div>

    <div class="item" >
      <img src="https://cdn.eksmo.ru/v2/ITD000000000195591/COVER/cover3d1__h600.jpg" alt="Book">
    </div>

    <div class="item">
      <img src="https://godliteratury.ru/wp-content/uploads/2015/12/voyna-i-mir.jpg" alt="Book">
    </div>
  </div>
  
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="icon-prev" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="icon-next" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<style type="text/css">
.item{
    background: #F5F5F5;    
    text-align: center;
    height: 550px !important;
	margin:0 auto;
}
</style>