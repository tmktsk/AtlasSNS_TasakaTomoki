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




