<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
function setActive() {
    let navbar = document.getElementById('dashboard-menu');
    let a_tags = navbar.getElementsByTagName('a');
    let currentFile = document.location.href.split('/').pop().split('.')[0];

    for (let i = 0; i < a_tags.length; i++) {
        let file = a_tags[i].href.split('/').pop().split('.')[0];
        if (file === currentFile) {
            a_tags[i].classList.add('active', 'bg-warning'); // Add both active and warning color
            let parentCollapse = a_tags[i].closest('.collapse');
            if (parentCollapse) {
                new bootstrap.Collapse(parentCollapse, {toggle: true});
            }
        } else {
            a_tags[i].classList.remove('active', 'text-warning'); // Remove active and warning from others
        }
    }
}
setActive();
</script>
