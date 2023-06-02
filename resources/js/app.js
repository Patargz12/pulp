import "./bootstrap";

window.addEventListener("scroll", function () {
    const navbarTransparent = document.getElementById("navbarTransparent");
    const button = document.getElementById("buttonOutline");
    const navbarBrand = document.getElementById("navbar-brand");
    if (window.scrollY > 0) {
        navbarTransparent.classList.add("navbar-light");
        navbarTransparent.classList.add("bg-light");
        navbarTransparent.classList.add("shadow-sm");
        navbarTransparent.classList.remove("navbar-dark");
        button.classList.add("btn-primary");
        button.classList.remove("btn-outline-light");
        navbarBrand.classList.add("text-primary");
    } else {
        navbarTransparent.classList.add("navbar-dark");
        navbarTransparent.classList.remove("bg-light");
        navbarTransparent.classList.remove("navbar-light");
        navbarTransparent.classList.remove("shadow-sm");
        button.classList.remove("btn-primary");
        button.classList.add("btn-outline-light");
        navbarBrand.classList.remove("text-primary");
    }
});

window.addEventListener("DOMContentLoaded", (event) => {
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector("#sidebarToggle");
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem("sb|sidebar-toggle") === "true") {
        //     document.body.classList.toggle("sb-sidenav-toggled");
        // }
        sidebarToggle.addEventListener("click", (event) => {
            event.preventDefault();
            document.body.classList.toggle("sb-sidenav-toggled");
            localStorage.setItem(
                "sb|sidebar-toggle",
                document.body.classList.contains("sb-sidenav-toggled")
            );
        });
    }
});

$(document).ready(function () {
    $(window).scroll(function () {
        if ($(document).scrollTop() > 10) {
            $("#navbar-brand-img-top").hide();
            $("#navbar-brand-img-scroll").show();
        } else {
            $("#navbar-brand-img-top").show();
            $("#navbar-brand-img-scroll").hide();
        }
    });
});

$(document).ready(function () {
    $("#dataTables").DataTable({
        columnDefs: [{ className: "dt-center", targets: "_all" }],
        order: [[0, "desc"]],
    });
});
