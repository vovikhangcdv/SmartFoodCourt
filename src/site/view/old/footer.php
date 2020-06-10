</div>

</main>
<footer class="c-footer">
    <div><a href="https://coreui.io">CoreUI</a> © 2020 creativeLabs.</div>
    <div class="ml-auto">Powered by&nbsp;<a href="https://coreui.io/">CoreUI</a></div>
</footer>
</div>
</div>
<!-- CoreUI and necessary plugins-->
<script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
<!--[if IE]><!-->
<script src="vendors/@coreui/icons/js/svgxuse.min.js"></script>
<!--<![endif]-->
<!-- Plugins and scripts required by this view-->
<script src="vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script src="vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="js/main.js"></script>
<script>
function toggle(id_form, ip, id_input) {
var x = document.getElementById('load_scan');
if (x.style.display === "none") {
    x.style.display = "block";
} else {
    x.style.display = "none";
}
document.getElementById(id_input).value = ip;
document.getElementById(id_form).submit(); // Form submission
}
</script>
<script>
function submit_form(id_form,id_input,value_input){
    document.getElementById(id_input).value = value_input;
    document.getElementById(id_form).submit(); // Form submission
}
</script>

</body>

</html>