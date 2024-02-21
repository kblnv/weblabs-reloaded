<template>
  <header class="header">
    <nav class="main-menu">
      <p class="date">{{ currentDate }}</p>
      <ul class="main-menu__items">
        <li class="main-menu__item">
          <Link class="main-menu__link" href="/"
            >Главная</Link
          >
        </li>
        <li class="main-menu__item">
          <Link class="main-menu__link" href="/about"
            >Обо мне</Link
          >
        </li>
        <li
          @mouseover="dropdownMenuIsOpen = true"
          @mouseleave="dropdownMenuIsOpen = false"
          class="main-menu__item"
        >
          <Link class="main-menu__link" href="/interests"
            >Мои интересы</Link
          >
          <div v-if="dropdownMenuIsOpen" class="dropdown-menu">
            <ul class="dropdown-menu__items">
              <li class="dropdown-menu__item">
                <a class="dropdown-menu__link" href="/interests#hobbies"
                  >Мои хобби</a
                >
              </li>
              <li class="dropdown-menu__item">
                <a class="dropdown-menu__link" href="/interests#books"
                  >Мои любимые книги</a
                >
              </li>
              <li class="dropdown-menu__item">
                <a class="dropdown-menu__link" href="/interests#music"
                  >Моя любимая музыка</a
                >
              </li>
              <li class="dropdown-menu__item">
                <a class="dropdown-menu__link" href="/interests#films"
                  >Мои любимые фильмы</a
                >
              </li>
            </ul>
          </div>
        </li>
        <li class="main-menu__item">
          <Link class="main-menu__link" href="/study"
            >Учеба</Link
          >
        </li>
        <li class="main-menu__item">
          <Link class="main-menu__link" href="/album"
            >Фотоальбом</Link
          >
        </li>
        <li class="main-menu__item">
          <Link class="main-menu__link" href="/contact"
            >Контакт</Link
          >
        </li>
        <li class="main-menu__item">
          <Link class="main-menu__link" href="/test"
            >Тест</Link
          >
        </li>
        <li class="main-menu__item">
          <Link class="main-menu__link" href="/history"
            >История просмотра</Link
          >
        </li>
      </ul>
    </nav>
  </header>
</template>

<script>
import { Link } from "@inertiajs/vue3";


export default {
  components: {
    Link,
  },
  data() {
    return {
      currentDate: "",
      dropdownMenuIsOpen: false,
    };
  },
  mounted() {
    this.currentDate = this.getCurrentDate();

    setInterval(() => {
      this.currentDate = this.getCurrentDate();
    }, 1000);
  },
  methods: {
    getCurrentDate() {
      const daysOfWeek = [
        "Воскресенье",
        "Понедельник",
        "Среда",
        "Вторник",
        "Четверг",
        "Пятница",
        "Суббота",
      ];

      const currentDate = new Date();

      const seconds = currentDate.getSeconds().toString().padStart(2, "0");
      const minutes = currentDate.getMinutes().toString().padStart(2, "0");
      const hours = currentDate.getHours().toString().padStart(2, "0");
      const day = currentDate.getDate().toString().padStart(2, "0");
      const month = (currentDate.getMonth() + 1).toString().padStart(2, "0");
      const year = currentDate.getFullYear();

      const dayOfWeek = currentDate.getDay();

      return `${hours}:${minutes}:${seconds} ${day}.${month}.${year} ${daysOfWeek[dayOfWeek]}`;
    },
  },
};
</script>

<style lang="scss">
@use "@/scss/vars" as *;

.header {
  width: 80%;
  margin: 0 auto;
}

.main-menu {
  padding: 28px 0;
  background-color: #1b1b1b;

  border-radius: 8px;

  .date {
    padding: 0;

    margin-top: 0px;
    text-align: center;
  }

  &__items {
    display: flex;

    justify-content: space-around;
    flex-wrap: wrap;

    margin-top: 15px;
    padding: 0 95px;

    list-style: none;
  }

  &__item + &__item {
    margin-left: 15px;
  }

  &__link {
    color: $color-text-secondary;
    text-decoration: none;

    font-size: 1rem;

    transition: color 0.3s;

    &:hover {
      color: #ffffff;
    }

    &--active {
      text-decoration: underline;
    }
  }
}

.dropdown-menu {
  position: absolute;
  z-index: 1;

  padding: 16px;
  border: 2px solid #000000;

  background-color: #1b1b1b;

  &__items {
    display: flex;
    flex-direction: column;
    list-style: none;
  }

  &__item + &__item {
    margin-top: 15px;
  }

  &__link {
    color: $color-text-secondary;
    text-decoration: none;

    font-size: 1rem;

    transition: color 0.3s;

    &:hover {
      color: $color-text-primary;
    }

    &--active {
      text-decoration: underline;
    }
  }
}
</style>
