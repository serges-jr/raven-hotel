$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(function () {
    $("#table").DataTable();

    //create categpry

    $("#createCategory").on("click", function (e) {
        let CategoryForm = $("#CategoryForm");
        if (CategoryForm[0].checkValidity()) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "storeCategory",
                data: CategoryForm.serialize(),
                success: function (response) {
                    $("#createModal").modal("hide");
                    Swal.fire({
                        icon: "success",
                        title: "chambre create avec success",
                    });
                    CategoryForm[0].reset();
                    location.reload();
                },
            });
        }
    });

    //recuper
    function getBills() {
        $.ajax({
            url: "category",
            type: "get",
            success: function (response) {
                console.log(response);
            },
        });
    }

    // update category

    $(".category").on("click", ".editBtn", function (e) {
        let category_id = $(this).data("id");
        e.preventDefault();
        $.ajax({
            type: "get",
            url: "editCategory" + "/" + category_id,
            data: { id: category_id },
            success: function (data) {
                $("#category_id").val(data.id);
                $("#nom").val(data.name);
                $("#description").val(data.detail);
            },
        });
    });
    $("#updateCategory").on("click", function (e) {
        e.preventDefault();
        let UpdateForm = $("#UpdateForm");
        let id = document.querySelector("#category_id").value;
        $(this).html("sending..");
        if (UpdateForm[0].checkValidity()) {
            $.ajax({
                url: "editCategory" + "/" + id,
                type: "post",
                data: UpdateForm.serialize(),
                dataType: "json",
                success: function (response) {
                    $("#updateModal").modal("hide");
                    Swal.fire({
                        icon: "success",
                        title: "chambre modifier avec success",
                    });
                    UpdateForm[0].reset();
                    location.reload();
                    getBills();
                },
                error: function (data) {
                    console.log("error:", data);
                },
            });
        }
    });

    //info category

    $(".category").on("click", ".infoBtn", function (e) {
        let category_id = $(this).data("id");
        $.get("editCategory" + "/" + category_id, function (data) {
            Swal.fire({
                title: `<strong>information de la ${data.id}</strong>`,
                icon: "info",
                html: `type de chambre: <b>${data.name}</b> <br>
                        detail de la chmabre: <b>${data.detail}</b>`,
                showCloseButton: true,
                focusConfirm: false,
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> super!',
                confirmButtonAriaLabel: "thumbs up, great!",
            });
        });
    });

    //delete category

    $(".category").on("click", ".deleteBtn", function (e) {
        e.preventDefault();
        let category_id = $(this).data("id");
        Swal.fire({
            title: "are you sure?" + category_id,
            text: "you won't be able to evert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "deleteCategory" + "/" + category_id,
                    type: "delete",
                    data: { id: this.dataset.id },
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        location.reload();
                    },
                    error: function (response) {
                        console.log("Error,", response);
                        console.log("bonjour");
                    },
                });
            }
        });
    });
});

//Equipment

$(function () {
    //create equipment
    $("#createEquipment").on("click", function (e) {
        let EquipmentForm = $("#EquipmentForm");
        if (EquipmentForm[0].checkValidity()) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "storeEquipment",
                data: EquipmentForm.serialize(),
                success: function (response) {
                    $("#createModal").modal("hide");
                    Swal.fire({
                        icon: "success",
                        title: "equipment create avec success",
                    });
                    EquipmentForm[0].reset();
                    location.reload();
                },
            });
        }
    });

    //info equipment

    $(".Equipment").on("click", ".infoBtn", function (e) {
        let Equipment_id = $(this).data("id");
        e.preventDefault();
        $.ajax({
            type: "get",
            url: "editEquipment" + "/" + Equipment_id,
            data: { id: this.dataset.id },
            success: function (data) {
                Swal.fire({
                    title: `<strong>information de la ${data.id}</strong>`,
                    icon: "info",
                    html: `<div class="card">
                    <div class="row card-body">
                            <div class="col">
                                    <img src="image/${data.icon}" class="img img-fluid">
                            </div>
                            <div class="col">
                                    <h2>${data.name}</h2>
                                    <span class="w-25 border-bottom border-dark"></span>
                                    <p>${data.description}</p>
                            </div>
                    </div>
            </div>`,
                    showCloseButton: true,
                    focusConfirm: false,
                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> super!',
                    confirmButtonAriaLabel: "thumbs up, great!",
                });
            },
        });
    });

    //update equuipment
    $(".Equipment").on("click", ".editBtn", function (e) {
        let id = $(this).data("id");
        e.preventDefault();
        $.ajax({
            type: "get",
            url: "editEquipment" + "/" + id,
            data: { id: this.dataset.id },
            success: function (data) {
                $("#id").val(data.id);
                $("#image").val(data.icon);
                $("#nom").val(data.name);
                $("#detail").val(data.description);
            },
            error: function (data) {
                console.log("Error", data);
            },
        });
    });

    $("#updateEquipment").on("click", function (e) {
        let updateEquipment = $("#EquipmentUpdate");
        let id = document.querySelector("#id").value;
        e.preventDefault();
        if (updateEquipment[0].checkValidity()) {
            $.ajax({
                type: "post",
                url: "editEquipment" + "/" + id,
                data: updateEquipment.serialize(),
                dataType: "json",
                success: function (response) {
                    $("#updateModal").modal("hide");
                    Swal.fire({
                        icon: "success",
                        title: "equipment modifier avec success",
                    });
                    updateEquipment[0].reset();
                    location.reload();
                },
                error: function (response) {
                    console.log("Error: ", response);
                },
            });
        }
    });

    //active equipement
    $(".Equipment").on("click", ".deleteBtn", function (e) {
        let id = $(this).data("id");
        e.preventDefault();
        Swal.fire({
            title: "are you sure?" + id,
            text: "vous voulez activer l'equipement !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "oui, activer l'equipement !",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "get",
                    url: "activeEquipment" + "/" + id,
                    data: { id: id },
                    success: function (response) {
                        if (response.status === 1) {
                            Swal.fire(
                                "desactivation!",
                                "operation reussir",
                                "success"
                            );
                            location.reload();
                        } else {
                            Swal.fire(
                                "activation!",
                                "operation reussir",
                                "success"
                            );
                            location.reload();
                        }
                    },
                    error: function (response) {
                        console.log("Error: ", response);
                    },
                });
            }
        });
    });
});

//Feature

$(function () {
    $("#name").change(function () {
        let reader = new FileReader();
        reader.onload = (e) => {
            $("#preview-image").attr("src", e.target.result);
        };
        reader.readAsDataURL(this.files[0]);
    });
    //create feature
    $("#createFeature").on("click", function (e) {
        let FeatureForm = $("#FeatureForm");
        if (FeatureForm[0].checkValidity()) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "storeFeature",
                data: FeatureForm.serialize(),
                success: function (response) {
                    $("#createModal").modal("hide");
                    Swal.fire({
                        icon: "success",
                        title: "feature create avec success",
                    });
                    FeatureForm[0].reset();
                    location.reload();
                },
                error: function (response) {
                    console.log("error: ", response);
                },
            });
        }
    });
});

// Users

$(function () {
    //create users
    $("#createUser").on("click", function (e) {
        let UserForm = $("#UserForm");
        e.preventDefault();
        if (UserForm[0].checkValidity()) {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": "<?= crsf_token() ?>",
                },
                type: "post",
                url: "storeUser",
                data: UserForm.serialize(),
                dataType: "json",
                success: function (response) {
                    $("#createModal").modal("hide");
                    Swal.fire({
                        icon: "success",
                        title: "users create avec success",
                    });
                    UserForm[0].reset();
                    location.reload();
                },
                error: function (response) {
                    console.log("Error :", response);
                },
            });
        }
    });
    // addImageUser
    $("#addimage").on("click", function (e) {
        console.log("fkjkf");
    });
    //   info bulle users

    $(".users").on("click", ".infoBtn", function (e) {
        let id = $(this).data("id");
        e.preventDefault();
        $.ajax({
            type: "get",
            url: "editUser" + "/" + id,
            data: { id: id },
            success: function (data) {
                Swal.fire({
                    title: `<strong>information de la ${data.id}</strong>`,
                    icon: "info",
                    html: `<div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-8 border-start border-2 border-primary p-0 text-center">
                            <h3>Name :${data.name}</h3>
                            <h3>Lastname :${data.lastname}</h3>
                            <h3>Email :${data.email}</h3>
                            <h3>date of birth :${data.date}</h3>
                            </div>
                        </div>`,
                    showCloseButton: true,
                    focusConfirm: false,
                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> super!',
                    confirmButtonAriaLabel: "thumbs up, great!",
                });
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    });

    // update users

    $(".users").on("click", ".editBtn", function (e) {
        let id = $(this).data("id");
        e.preventDefault();
        $.ajax({
            type: "get",
            url: "editUser" + "/" + id,
            data: { id: id },
            success: function (data) {
                $("#id").val(data.id);
                $("#nom").val(data.name);
                $("#mail").val(data.email);
                $("#prenom").val(data.lastname);
                $("#sex").val(data.sexe);
                $("#span").val(data.name);
                $("#tel").val(data.phone);
                $("#function").val(data.fonction);
                $("#salair").val(data.salaire);
                $("#adrese").val(data.adresse);
                $("#dat").val(data.date);
                $("#dateEmboche").val(data.dateEmbauche);
                $("#rol").val(data.role);
                $("#pass").val(data.password);
                console.log(data.password);
            },
            error: function (data) {
                console.log("Error: ", data);
            },
        });
    });
    $("#UpdateUser").on("click", function (e) {
        let UserUpdate = $("#UserUpdate");
        let id = document.querySelector("#id").value;
        if (UserUpdate[0].checkValidity()) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "editUser" + "/" + id,
                data: UserUpdate.serialize(),
                success: function (response) {
                    console.log(response);
                    location.reload();
                },
                error: function (response) {
                    console.log("Error: ", response);
                },
            });
        }
    });

    // desactiver l'users

    $(".users").on("click", ".deleteBtn", function (e) {
        let id = $(this).data("id");
        e.preventDefault();
        Swal.fire({
            title: "are you sure?" + id,
            text: "vous voulez desactiver un client!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "oui, desactiver ce client!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "get",
                    url: "activeUser" + "/" + id,
                    data: { id: id },
                    success: function (response) {
                        if (response.status === 1) {
                            Swal.fire(
                                "desactivation!",
                                "operation reussir",
                                "success"
                            );
                            location.reload();
                        } else {
                            Swal.fire(
                                "activation!",
                                "operation reussir",
                                "success"
                            );
                            location.reload();
                        }
                    },
                    error: function (response) {
                        console.log("Error: ", response);
                    },
                });
            }
        });
    });
});

// comments

$(function () {
    //update comments
    $(".comments").on("click", ".editBtn", function (e) {
        let id = $(this).data("id");
        e.preventDefault();
        $.ajax({
            type: "get",
            url: "editComment" + "/" + id,
            data: { id: id },
            success: function (data) {
                $("#comment_id").val(data.id);
                $("#comment_user").val(data.user_id);
                $("#comment").val(data.content);
            },
            error: function (data) {
                console.log("Error: ", data);
            },
        });
    });

    $("#updateComment").on("click", function (e) {
        let CommentUpdate = $("#CommentUpdate");
        let id = document.querySelector("#comment_id").value;
        if (CommentUpdate[0].checkValidity()) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "editComment" + "/" + id,
                data: CommentUpdate.serialize(),
                dataType: "json",
                success: function (response) {
                    $("#updateModal").modal("hide");
                    Swal.fire({
                        icon: "success",
                        title: "comment modifier avec success",
                    });
                    CommentUpdate[0].reset();
                    location.reload();
                },
                error: function (response) {
                    console.log("Error: ", response);
                },
            });
        }
    });

    //active commentaire
    $(".comments").on("click", ".deleteBtn", function (e) {
        let id = $(this).data("id");
        e.preventDefault();
        Swal.fire({
            title: "are you sure?" + id,
            text: "vous voulez activer le commentaire!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "oui, activer le commentaire!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "get",
                    url: "activeComment" + "/" + id,
                    data: { id: id },
                    success: function (response) {
                        if (response.status === 1) {
                            Swal.fire(
                                "desactivation!",
                                "operation reussir",
                                "success"
                            );
                            location.reload();
                        } else {
                            Swal.fire(
                                "activation!",
                                "operation reussir",
                                "success"
                            );
                            location.reload();
                        }
                    },
                    error: function (response) {
                        console.log("Error: ", response);
                    },
                });
            }
        });
    });
});

// chambres

$(function () {
    //create chambre
    $("#createChambre").on("click", function (e) {
        let ChambreForm = $("#ChambreForm");
        if (ChambreForm[0].checkValidity()) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "StoreRoom",
                data: ChambreForm.serialize(),
                success: function (response) {
                    $("#createModal").modal("hide");
                    Swal.fire({
                        icon: "success",
                        title: "chambre create avec success",
                    });
                    ChambreForm[0].reset();
                    location.reload();
                },
                error: function (response) {
                    console.log("Error :", response);
                },
            });
        }
    });
    //show details

    $(".room").on("click", ".infoBtn", function (e) {
        let id = $(this).data("id");
        e.preventDefault();
        $.ajax({
            type: "get",
            url: "editRoom" + "/" + id,
            data: { id: id },
            success: function (data) {
                Swal.fire({
                    title: `<strong>information de la ${data.id}</strong>`,
                    icon: "info",
                    html: `<div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-8 border-start border-2 border-primary p-0 text-center">
                            <h3>Name :${data.category_id}</h3>
                            <h3>Lastname :${data.lastname}</h3>
                            <h3>Email :${data.email}</h3>
                            <h3>date of birth :${data.date}</h3>
                            </div>
                        </div>`,
                    showCloseButton: true,
                    focusConfirm: false,
                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> super!',
                    confirmButtonAriaLabel: "thumbs up, great!",
                });
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    });
});

// reservation

$(function () {
    // affiche detail reservation
    $(".reservation").on("click", ".infoBtn", function (e) {
        let id = $(this).data("id");
        e.preventDefault();
        $.ajax({
            type: "get",
            url: "reserver" + "/" + id,
            data: { id: id },
            success: function (data) {
                Swal.fire({
                    title: `<strong>information de la reservation ${data.id}</strong>`,
                    icon: "info",
                    html: `<div class="row">
                            <div class="col">
                                <h3>${data.nameUser}</h3>
                            </div>
                            <div class="col border-start border-2 border-primary p-0 text-center">
                            <h3>Name :${data.chambre_id}</h3>
                            </div>
                        </div>`,
                    showCloseButton: true,
                    focusConfirm: false,
                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> super!',
                    confirmButtonAriaLabel: "thumbs up, great!",
                });
            },
        });
    });
});

// menages

$(function () {
    // netoyage d'une chambre
    $(".menage").on("click", ".infoBtn", function (e) {
        let id = $(this).data("id");
        e.preventDefault();
        Swal.fire({
            title: "ete vous sur?",
            text: "vous voulez rendre cette chambre libre et propre!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "oui!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "get",
                    url: "menage" + "/" + id,
                    data: { id: id },
                    success: function (data) {
                        console.log(data);
                        if (data.etat === 1) {
                            Swal.fire(
                                "operation échoué",
                                "veuillez patienter que la chambre soit libre!",
                                "error"
                            );
                            location.reload();
                        } else {
                            Swal.fire(
                                "la chambre est accessible!",
                                "operation reussir",
                                "success"
                            );
                            location.reload();
                        }
                    },
                    error: function (response) {
                        console.log("Error: ", response);
                    },
                });
            }
        });
    });
});
//logout
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

//reservation
$(".ReserverBook").on("click", ".deleteBtn", function () {
    let id = $("#id").val();
    console.log(id);
    Swal.fire({
        title: "êtes-vous sûr?",
        text: "vous ete sur le point d'annuler cet reservation",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "annueler !",
        cancelButtonText: "laisser",
    }).then((result) => {
        if (result.isConfirmed) {
        }
    });
});
///valider la reservation

$(".ReserverBook").on("click", ".valideBtn", function () {
    let id = $(this).data("id");
    console.log(id);
    Swal.fire({
        title: "êtes-vous sûr?",
        text: "vous ete sur le point de valider cet reservation",
        icon: "success",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "valider !",
        cancelButtonText: "annuler",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "get",
                url: "reservation" + "-" + id,
                data: { id: id },
                success: function (data) {
                    Swal.fire({
                        icon: "success",
                        title: "reservation valider avec success",
                    });
                    location.reload();
                },
            });
        }
    });
});
//recherche reservation
$(".checkCode").on("click", function () {
    $("#exampleModal").modal("show");
});
$(".Search").on("click", function (e) {
    let Check = $("#Check");
    if (Check[0].checkValidity()) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "SearchReserver",
            data: Check.serialize(),
            success: function (data) {
                $("#exampleModal").modal("hide");
                $("#payementModal").modal("show");
                Check[0].reset();
                $(".Search").attr("data-id", data.id);
                $("#prenom").text(data.user_lastname);
                $("#nom").text(data.user_name);
                $("#phone").text(data.user_phone);
                $("#email").text(data.user_email);

                $("#room").text(data.room_name + " " + data.room_numero);
                if(data.room_status == 0){
                    $("#status").text('libre');
                }else{
                    $("#status").text('occuper');
                }
                $("#dateDebut").text(data.dateDebut);
                $("#fin").text(data.dateFin);
                $("#nbjour").text(data.nbjour);
                $("#montant").text(data.montant);
                $("#CoDe").text(data.code);
                $(".Payer").attr("data-id", data.id);
            },
            error: function (data) {
                console.log("Error :", data);
            },
        });
    }
});

//payement reseravtion

$(".Payer").on("click", function (e) {
    let id = $(this).data("id");
    e.preventDefault();
    $.ajax({
        type: "get",
        url: "PayerReserver" + "/" + id,
        data: { id: id },
        success: function (data) {
            $("#payementModal").modal("hide");
            Swal.fire({
                icon: "success",
                title: "reservation effectuer avec success",
            });
            location.reload();
        },
        error: function (data) {
            console.log("Error:", data);
        },
    });
});
