<!-- Bootstrap -->
<script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="build/js/jquery-ui.min.js"></script>
<!--

-->

<!-- FastClick -->
<script src="vendor/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="vendor/nprogress/nprogress.js"></script>

<!-- Custom Theme Scripts -->

<script src="build/js/jquery.dataTables.min.js"></script>
<script src="build/js/dataTables.bootstrap.min.js"></script>
<script src="build/js/custom.min.js"></script>
<script src="build/js/jquery.zoomooz.js"></script>

<script>
	$(document).ready(function() {
    $('table').dataTable({
        "bJQueryUI": true
    });
} );
</script>
<script>
document.querySelector('#sweet-10').onclick = function(){
swal({
    title: "Oops!", 
    text: "Password anda salah!", 
    type: "error"
});
};
</script>
