<h1>Video</h1>
<div class="owl-carousel owl-theme">
    <div class="item-video" data-merge="1.3"><a class="owl-video" href="https://www.youtube.com/watch?v=ddZlaO_48og"></a></div>
    <div class="item-video" data-merge="1.3"><a class="owl-video" href="https://www.youtube.com/watch?v=Nj3UF4zSHmA"></a></div>
    <div class="item-video" data-merge="1.3"><a class="owl-video" href="https://www.youtube.com/watch?v=1Dj_MRbBTKQ"></a></div>
    <div class="item-video" data-merge="1.3"><a class="owl-video" href="https://www.youtube.com/watch?v=nxkf7g_6Ljw"></a></div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $(".owl-carousel").owlCarousel({
      center: true,
      video:true,
      loop:true,
      margin:20,
      lazyLoad:true,
      merge:true,
      responsiveClass:true,
      responsive:{
          0:{
              items:1,
          },
          600:{
              items:3,
          },
          1000:{
              items:5,
          }
        }
    });
  });

</script>
test
