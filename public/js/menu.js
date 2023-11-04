/* menu.js */
document.addEventListener("DOMContentLoaded", function () {
    const toggleMenu = document.querySelector(".toggle-menu");
    const menuList = document.querySelector(".menu-list");

    toggleMenu.addEventListener("click", function () {
        // メニューの表示・非表示を切り替える
        menuList.style.display = menuList.style.display === "block" ? "none" : "block";

        // アップ矢印のクラスを切り替える
        toggleMenu.classList.toggle("rotate");
    });
});

$(function () {
    $('.js-modal-open').on('click', function () {
        var post = $(this).data('post');
        var post_id = $(this).data('post_id');
        // var form = document.getElemntById('updateForm');

        // form.action = "{{ route('update') }}/" + post_id;
        $('#modal_post').val(post);
        $('#modal_id').val(post_id);
        $('.js-modal').fadeIn(100);
        return false;
    });

    $('.js-modal-close').on('click', function () {
        $('.js-modal').fadeOut(100);
        return false;
    });
});
