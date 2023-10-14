(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($("#spinner").length > 0) {
                $("#spinner").removeClass("show");
            }
        }, 1);
    };
    spinner();

    // Initiate the wowjs
    new WOW().init();

    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $(".navbar").addClass("sticky-top shadow-sm");
        } else {
            $(".navbar").removeClass("sticky-top shadow-sm");
        }
    });

    // Dropdown on mouse hover
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";

    $(window).on("load resize", function () {
        if (this.matchMedia("(min-width: 992px)").matches) {
            $dropdown.hover(
                function () {
                    const $this = $(this);
                    $this.addClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "true");
                    $this.find($dropdownMenu).addClass(showClass);
                },
                function () {
                    const $this = $(this);
                    $this.removeClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "false");
                    $this.find($dropdownMenu).removeClass(showClass);
                }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $(".back-to-top").fadeIn("slow");
        } else {
            $(".back-to-top").fadeOut("slow");
        }
    });
    $(".back-to-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
        return false;
    });

    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: true,
        margin: 24,
        dots: true,
        loop: true,
        nav: false,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            },
        },
    });
})(jQuery);

//   FONT-END js
$(function () {
    $(".bookRoom").on("click", ".bookBtn", function (e) {
        let id = $(this).data("id");
        let user = 1;
        let ids = [id, user];
        e.preventDefault();
        Swal.fire({
            title: "le choix est-il fait?",
            text: "vous voulez bien reserver!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "reserver!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "get",
                    url: "reservation" + "/" + id,
                    data: { id: id },
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                    },
                    error: function (response) {
                        console.log("Error,", response);
                    },
                });
            }
        });
    });
    $(".filter").on("click", ".filterBtn", function (e) {
        let id = $(this).data("id");
        console.log(document.querySelector("#dateE").value);
    });
    $("body").on("click", ".logout", function (e) {
        let id = $("#id").val();
        let Logout = $("#Logout");
        Swal.fire({
            title: "êtes-vous sûr?",
            text: "vous ne pourez plus être en ligne!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "deconnexion !",
            cancelButtonText: "Annueler",
        }).then((result) => {
            if (result.isConfirmed) {
                if (Logout[0].checkValidity()) {
                    e.preventDefault();
                    $.ajax({
                        type: "post",
                        url: "delete",
                        data: Logout.serialize(),
                        success: function (response) {
                            Swal.fire({
                                icon: "success",
                                title: "deconnexion effectuer avec success.",
                            });
                            Logout[0].reset();
                            location.replace("/");
                        },
                    });
                }
            }
        });
    });
    $("body").on("click", ".delete", function (e) {
        let id = $("#id").val();
        let Supprimer = $("#Supprimer");
        Swal.fire({
            title: "êtes-vous sûr?",
            text: "Cet Action Est irréversible! Votre Compte Sera Supprimer.... ",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "suppression !",
            cancelButtonText: "Annueler",
        }).then((result) => {
            if (result.isConfirmed) {
                if (Supprimer[0].checkValidity()) {
                    e.preventDefault();
                    $.ajax({
                        type: "post",
                        url: "supprimer",
                        data: Supprimer.serialize(),
                        success: function (response) {
                            Swal.fire({
                                icon: "success",
                                title: "suppression effectuer avec success . Actualiser la page",
                            });
                            Supprimer[0].reset();
                            location.replace("/");
                        },
                    });
                }
            }
        });
    });

    $("#dateDebut").change(function () {
        let date = new Date(this.value);
        let year = String(date.getFullYear());
        let month = "";
        let day = "";
        if(String(date.getMonth() + 1) < 10){
            month = "0" + String(date.getMonth() + 1);
        }else{
            month = String(date.getMonth() + 1);
        }
        if(String(date.getDate() + 1) < 9){
            day ="0"+String(date.getDate() + 1);
        }else{
            day = String(date.getDate() + 1);
            if(String(date.getDate()) == 30 || String(date.getDate()) == 31){
                month = parseInt(month) + 1;
                month = String(month);
                if(month == 13){
                    month = "01";
                    year = String(date.getFullYear()+1);
                }
                day = "01";
            }
        }

        let jour = year + "-" + month + "-" + day;
        $("#dateFin").attr("min", jour);
    });
    //function de calcul du nombre de jour du client
    $("#nbNuit").click(function (){
        //recupperation puis convertion de la date choisir par le client
        let date1 = $("#dateDebut").val();
        date1 = new Date(date1);
        let date2 = $("#dateFin").val();
        //recupperation puis convertion de la date choisir par le client
        date2 = new Date(date2);
        let date3 = date2.getTime() - date1.getTime();
        date3 = date3 / (1000 * 3600 * 24);
        $("#nbNuit").val(date3);
        console.log(date3);
    })
     //function de calcul le montant total suite au nombre de jour que va occuper le client
    $("#Montant").click(function (){
        let prix = $("#prix").val();
        let nb = $("#nbNuit").val();

        let montant = prix * nb;
        $("#Montant").val(montant);
    })
});
