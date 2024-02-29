import { setCookie, getCookie } from "./cookies";

const pageTitles = [
  "Главная",
  "Обо мне",
  "Интересы",
  "Учеба",
  "Фотоальбом",
  "Контакт",
  "Тест",
  "История просмотра",
];

export function visitPage(pageTitle) {
  // Update SessionStorage
  sessionStorage.setItem(
    pageTitle,
    parseInt(sessionStorage.getItem(pageTitle)) + 1
  );

  // Update Cookies
  let date = new Date(Date.now() + 86400e3);
  date = date.toUTCString();
  setCookie(pageTitle, parseInt(getCookie(pageTitle)) + 1, { expires: date });
}

function storageIsReady() {
  let ready = true;

  for (let title of pageTitles) {
    if (!sessionStorage.getItem(title) || !getCookie(title)) {
      ready = false;
      break;
    }
  }

  return ready;
}

export function initStorage() {
  if (storageIsReady()) return;
    
  for (let title of pageTitles) {
    sessionStorage.setItem(title, 0);
  }
  
  let date = new Date(Date.now() + 86400e3);
  date = date.toUTCString();
  
  for (let title of pageTitles) {
    setCookie(title, 0, { expires: date });
  }
}
