$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "Api-Token": $('meta[name="api-token"]').attr("content"),
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("form[ajax-request=huycoder]").submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr("action");
        var method = form.attr("method");
        var href = form.attr("href");
        var data = form.serialize();
        let button = form.find("button[type=submit]");
        //var token = $('meta[name="csrf-token"]').attr("content");
        //data += "&_token=" + token;
        if (button.attr("show")) {
            Swal.fire({
                title: "Bạn chắc chắn?",
                text: button.attr("show"),
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Đồng ý",
            }).then((result) => {
                if (result.isConfirmed) {
                    formSubmit(url, method, href, data, button);
                }
            });
        } else {
            formSubmit(url, method, href, data, button);
        }
    });
});

function formSubmit(url, method, href, data, button) {
    var txtBtn = button.html().trim();
    let settings = {
        url,
        method,
        data,
        dataType: "json",
        beforeSend: function () {
            button
                .prop("disabled", true)
                .html(`<i class="fa fa-spinner fa-spin"></i> Đang xử lý...`);
        },
        complete: function () {
            button.prop("disabled", false).html(txtBtn);
        },
        success: function (response) {
            if (button.attr("callback")) {
                window[`${button.attr("callback")}`](response);
            }
            if (!button.attr("callback")) {
                //Swal(response.message, response.status === true ? "success" : "error");
                // Swal.fire(
                //     "Thông báo",
                //     response.message,
                //     response.status === true ? "success" : "error"
                // );
                // ông cụ lê quốc huy nhé !!>>> //
                Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: response.status === true ? "success" : "error",
                    title: response.message,
                })
            }
            if (
                response.status === true &&
                !button.attr("href") &&
                !button.attr("callback")
            ) {
                setTimeout(() => {
                    if (!href) {
                        location.reload();
                        return;
                    }
                    location.href = href;
                }, 2000);
            }
        },
        error: function (error) {
            console.log(error);
        },
    };
    $.ajax(settings);
}
function remove(url, type, id) {
    Swal.fire({
        title: "Bạn chắc chắn?",
        text: "Bạn sẽ không thể khôi phục lại dữ liệu này!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Đồng ý",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    type: type,
                    id: id,
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                dataType: "json",
                success: function (response) {
                    // ông cụ lê quốc huy nhé !!>>> //
                    // if (response.status == true) {
                    //     Swal.fire("Thông báo", response.message, "success");
                    //     setTimeout(() => {
                    //         location.reload();
                    //     }, 2000);
                    // } else {
                    //     Swal.fire("Thông báo", response.message, "error");
                    //     setTimeout(() => {
                    //         location.reload();
                    //     }, 2000);
                    // }

                    if (response.status == true) {
                        // Swal.fire("Thông báo", response.message, "success");
                        Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            title: response.message,
                        })
                        // setTimeout(() => {
                        //     location.reload();
                        // }, 2000);
                    } else {
                        Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'error',
                            title: response.message,
                        })
                        // Swal.fire("Thông báo", response.message, "error");
                        // setTimeout(() => {
                        //     location.reload();
                        // }, 2000);
                    }
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }
    });
}
function callback(url, type, id) {
    $.ajax({
        url: url,
        type: "POST",
        data: {
            type: type,
            id: id,
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        success: function (response) {
                  // ông cụ lê quốc huy nhé !!>>> //
            if (response.status == true) {
                // Swal.fire("Thông báo", response.message, "success");
                Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'success',
                    title: response.message,
                })
                // setTimeout(() => {
                //     location.reload();
                // }, 2000);
            } else {
                Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'error',
                    title: response.message,
                })
                // Swal.fire("Thông báo", response.message, "error");
                // setTimeout(() => {
                //     location.reload();
                // }, 2000);
            }
        },
        error: function (error) {
            console.log(error);
        },
    });
}
function coppy(element) {
    window.getSelection().removeAllRanges();
    let range = document.createRange();
    range.selectNode(
        typeof element === "string" ? document.getElementById(element) : element
    );
    window.getSelection().addRange(range);
    document.execCommand("copy");
    window.getSelection().removeAllRanges();
    // Swal.fire("Thông báo", "Sao chép thành công", "success");
    Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    }).fire({
        icon: 'success',
        title: 'Sao chép thành công',
    })
}
 // ông cụ lê quốc huy nhé !!>>> //
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    function copyForm(id) {
        let btnCopyMeMo = document.querySelector('.btnCopyMeMo' + id);
        let btnCopyAccountNumber = document.querySelector('.btnCopyAccountNumber' + id);

        btnCopyMeMo.addEventListener('click', function(event) {
            let textMeMoCopy = document.getElementById('textMeMoCopy' + id).textContent;
            navigator.clipboard.writeText(textMeMoCopy);
            try {
                Toast.fire({
                    icon: 'success',
                    title: 'Copy nội dung giao dịch thành công'
                })
            } catch (err) {
                Toast.fire({
                    icon: 'error',
                    title: 'Copy nội dung giao dịch thất bại'
                })
            }
        });
        btnCopyAccountNumber.addEventListener('click', function(event) {
            let textAccountNumberCopy = document.getElementById('textAccountNumberCopy' + id).textContent;
            navigator.clipboard.writeText(textAccountNumberCopy);
            try {
                Toast.fire({
                    icon: 'success',
                    title: 'Copy số tài khoản giao dịch thành công'
                })
            } catch (err) {
                Toast.fire({
                    icon: 'error',
                    title: 'Copy số tài khoản giao dịch thất bại'
                })
            }
        });
    }

function baseUrl(url) {
    var baseUrl = window.location.origin;
    return baseUrl + url;
}
function getIDPOST() {
    var link_post = $("#idpost");
    var linkUP = link_post.val();
    if (linkUP.match(/^[0-9]+$/)) {
        return linkUP;
    } else {
        $.ajax({
            url: baseUrl("/api/tools/getUID"),
            type: "POST",
            data: { link: linkUP },
            dataType: "json",
            beforeSend: function () {
                link_post.val("Đang lấy id...");
                link_post.attr("disabled", "disabled");
            },
            complete: function () {
                link_post.removeAttr("disabled");
            },
            success: function (data) {
                if (data.status == true) {
                    $("#idpost").val(data.message);
                } else {
                    $("#idpost").val(data.message);
                }
            },
        });
    }
}

// Lê Quốc Huy //