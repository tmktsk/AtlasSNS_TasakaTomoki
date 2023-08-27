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

// $(function () {
$('.js-open-button').on('click', function (e) {
    e.preventDefault();
    var target = $(this).data('target');
    $(target).fadeIn();



    // isModalOpen = true;

    // $(document).on('click', function (e) {
    //     if (isModalOpen && !$(e.target).closest('.modal-contact, target-modal').length) {
    //         closeTargetModal();
    //     }

});

// $(".ui-widget-overlay").on("click", function () {
//     $(target).dialog("close");
// });

// modal.addEventListener('click', (event) => {
//     if (event.target.closest('#js-modal-content') === null) {

function closeTargetModal() {
    var target = $('.js-close-button').data('target');
    $(target).fadeOut();
}

// $('.js-close-button').on('click', function (e) {
//     e.preventDefault();
//     var target = $(this).data('target');
//     $(target).fadeOut();
// });
// });


$(function () {
    $('.js-modal-open').on('click', function () {
        $('.js-modal').fadeIn();
        var post = $(this).attr('post');
        var post_id = $(this).attr('post_id');
        $('.modal_post').text(post);
        $('.modal_id').val(post_id);

        return false;
    })

    $('.js-modal-close').on('click', function () {
        $('.js-modal').fadeOut();
    });
})
