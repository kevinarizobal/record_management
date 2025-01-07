<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        function setActiveOnClick() {
            let navbar = document.getElementById('dashboard-menu');
            let a_tags = navbar.querySelectorAll("a"); // Select all <a> tags inside #dashboard-menu

            a_tags.forEach(link => {
                link.addEventListener("click", function () {
                    // Remove active and bg-warning classes from all links
                    a_tags.forEach(a => a.classList.remove('active', 'bg-warning'));

                    // Add active and bg-warning classes to the clicked link
                    this.classList.add('active', 'bg-warning');
                });
            });
        }

        setActiveOnClick();
    });
</script>
