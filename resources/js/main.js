import "./assets/main.scss";

// import { createApp } from "vue";
// import { createRouter, createWebHistory } from "vue-router";
// import { setCookie, getCookie } from "./Utils/cookies.js";

// import App from "./App.vue";

// const BASE_PATH = "/weblabs";

// const routes = [
//   {
//     path: BASE_PATH + "/",
//     name: "Главная",
//     component: () => import("./pages/MainPage.vue"),
//   },
//   {
//     path: BASE_PATH + "/about",
//     name: "Обо мне",
//     component: () => import("./pages/AboutPage.vue"),
//   },
//   {
//     path: BASE_PATH + "/interests",
//     name: "Интересы",
//     component: () => import("./pages/InterestsPage.vue"),
//   },
//   {
//     path: BASE_PATH + "/study",
//     name: "Учеба",
//     component: () => import("./pages/StudyPage.vue"),
//   },
//   {
//     path: BASE_PATH + "/album",
//     name: "Фотоальбом",
//     component: () => import("./pages/AlbumPage.vue"),
//   },
//   {
//     path: BASE_PATH + "/contact",
//     name: "Контакт",
//     component: () => import("./pages/ContactPage.vue"),
//   },
//   {
//     path: BASE_PATH + "/test",
//     name: "Тест",
//     component: () => import("./pages/TestPage.vue"),
//   },
//   {
//     path: BASE_PATH + "/history",
//     name: "История просмотра",
//     component: () => import("./pages/HistoryPage.vue"),
//   },
// ];

// // Init SessionStorage
// if (sessionStorage.length === 0) {
//   for (let { name } of routes) {
//     sessionStorage.setItem(name, 0);
//   }
// }

// // Init Cookies
// if (document.cookie.length === 0) {
//   let date = new Date(Date.now() + 86400e3);
//   date = date.toUTCString();

//   for (let { name } of routes) {
//     setCookie(name, 0, { expires: date });
//   }
// }

// const router = createRouter({
//   history: createWebHistory(),
//   routes,
//   linkActiveClass: "main-menu__link--active",
// });

// router.beforeEach((to, from, next) => {
//   document.title = to.name;

//   // Update SessionStorage
//   sessionStorage.setItem(
//     to.name,
//     parseInt(sessionStorage.getItem(to.name)) + 1
//   );

//   // Update Cookies
//   let date = new Date(Date.now() + 86400e3);
//   date = date.toUTCString();
//   setCookie(to.name, parseInt(getCookie(to.name)) + 1, { expires: date });

//   next();
// });

// createApp(App).use(router).mount("#app");
