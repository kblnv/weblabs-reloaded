<template>
  <Layout>
    <main class="page page--wide">
      <div class="interests-page">
        <div class="interests-page__sidebar">
          <template v-for="{ name, id } of interests">
            <h2>
              <a :href="'#' + id">
                {{ name }}
              </a>
            </h2>
          </template>
        </div>
        <div class="interests-page__content">
          <h1>Мои интересы</h1>

          <template v-for="interest of interests">
            <h2 :id="interest.id">{{ interest.name }}</h2>
            <ul>
              <li v-for="item of interest.items">
                {{ item }}
              </li>
            </ul>
          </template>
        </div>
      </div>
    </main>
  </Layout>
</template>

<script>
import Layout from "../Components/Layout.vue";

export default {
  components: {
    Layout,
  },
  data() {
    return {
      interests: [
        {
          id: "hobbies",
          name: "Мои хобби",
          items: ["Работа...", "Веб - программирование", "Спорт", "Чтение"],
        },
        {
          id: "books",
          name: "Мои любимые книги",
          items: ["Джордж Оруэлл - 1984", "Марк Твен - Письма с земли"],
        },
        {
          id: "music",
          name: "Моя любимая музыка",
          items: [
            "Mac Miller",
            "Red Hot Chili Peppers",
            "Nirvana",
            "Mac Quayle",
          ],
        },
        {
          id: "films",
          name: "Мои любимые фильмы",
          items: ["Mr.Robot", "Peaky Blinders", "Fight Club", "Berserk 1997"],
        },
      ],
    };
  },
};
</script>

<style lang="scss">
@use "@/scss/vars" as *;

.interests-page {
  display: flex;
  flex-direction: row;

  &__sidebar {
    border: 2px solid #1b1b1b;
    padding: 10px 25px;

    a {
      text-decoration: none;

      color: $color-text-secondary;
      font-size: 1.5rem;

      transition: color 0.3s;

      &:hover {
        color: $color-text-primary;
      }
    }

    h2 {
      margin-top: 15px;
    }
  }

  &__content {
    margin-left: 35px;

    h1 + h2 {
      margin-top: 15px;
    }

    h2 {
      margin-top: 50px;
    }

    li {
      margin-top: 15px;
    }

    ul {
      list-style-position: inside;
    }
  }
}
</style>
