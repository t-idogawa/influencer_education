window.onload = function() {
    $('.delete__btn').on('click', function(e) {
        e.preventDefault();
        var id = e.target.value;
        var value = $(".title" + id).val();

        var modal = document.getElementById("modal__courner");

        $('.modal__title').text(value+"を");
        $('.modal__yes').val(id);
        modal.style.display = "block";
    })

    $('#modal__courner').on('click', function(e) {
        // 表示したポップアップ以外の部分をクリックしたとき
        if (!$(e.target).closest('.modal').length) {
            this.style.display = "none";
        }
    });

    $('.no__btn').on ('click', function(e) {
        e.preventDefault();

        var modal = document.getElementById("modal__courner");
        modal.style.display = "none";
    })
}