let btnDelete = document.querySelectorAll(".hard_delete");

btnDelete.forEach(function(btn) {
    btn.addEventListener("click", function () {
        if (confirm('vuoi eliminare definitivamente la card?')) {

        } else {
            event.preventDefault();
        }

    });



});