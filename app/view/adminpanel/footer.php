</section>
<footer>
  <div class="navbar navbar-inverse navbar-fixed-bottom">
    <div class="container">
    <p class="pull-left"><?php echo date('Y') ?> &copy; allrights reserved.</p>
      <p class="pull-right">version 1.0</p>
    </div>
  </div>
</footer>
<!-- container section start -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
<script>
//knob
$(function() {
  $(".knob").knob({
    'draw' : function () { 
      $(this.i).val(this.cv + '%')
    }
  })
});

//carousel
$(document).ready(function() {
  $("#owl-slider").owlCarousel({
    navigation : true,
    slideSpeed : 300,
    paginationSpeed : 400,
    singleItem : true
  });
});
//custom select box
$(function(){
  $('select.styled').customSelect();
});
/* ---------- Map ---------- */
$(function(){
  $('#map').vectorMap({
    map: 'world_mill_en',
    series: {
      regions: [{
        values: gdpData,
        scale: ['#000', '#000'],
        normalizeFunction: 'polynomial'
      }]
    },
    backgroundColor: '#eef3f7',
    onLabelShow: function(e, el, code){
      el.html(el.html()+' (GDP - '+gdpData[code]+')');
    }
  });
});
</script>

</body>
</html>
