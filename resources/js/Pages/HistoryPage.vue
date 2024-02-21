<template>
  <Layout>
    <main class="page">
      <div class="history-page">
        <div class="history-page__content">
          <h1>История просмотра</h1>
          <h2>История текущего сеанса</h2>

          <div class="history-page__table table">
            <table id="current-session">
              <caption>
                ИСТОРИЯ ТЕКУЩЕГО СЕАНСА
              </caption>
              <thead>
                <tr>
                  <th>№</th>
                  <th>Название страницы</th>
                  <th>Количество посещений</th>
                </tr>
              </thead>
              <tbody id="current-session-body">
                <tr v-for="(page, index) of pages">
                  <td>{{ index + 1 }}</td>
                  <td>{{ page }}</td>
                  <td>
                    {{ getItemFromSessionStorage(page) ?? "Нет информации" }}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <h2>История за все время</h2>

          <div class="history-page__table table">
            <table id="all-history">
              <caption>
                ИСТОРИЯ ЗА ВСЕ ВРЕМЯ
              </caption>
              <thead>
                <tr>
                  <th>№</th>
                  <th>Название страницы</th>
                  <th>Количество посещений</th>
                </tr>
              </thead>
              <tbody id="all-history-body">
                <tr v-for="(page, index) of pages">
                  <td>{{ index + 1 }}</td>
                  <td>{{ page }}</td>
                  <td>{{ getItemFromCookies(page) ?? "Нет информации" }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>
  </Layout>
</template>

<script>
import Layout from "../Components/Layout.vue";
import { getCookie } from "../Utils/cookies.js";

export default {
  components: {
    Layout,
  },
  data() {
    return {
      pages: [
        "Главная",
        "Обо мне",
        "Интересы",
        "Учеба",
        "Фотоальбом",
        "Контакт",
        "Тест",
        "История просмотра",
      ],
    };
  },
  methods: {
    getItemFromSessionStorage(item) {
      return sessionStorage.getItem(item);
    },
    getItemFromCookies(item) {
      return getCookie(item);
    },
  },
};
</script>

<style lang="scss">
.history-page {
  &__content {
    h1,
    h2 {
      text-align: center;
    }
    h2 {
      margin-top: 50px;
    }
    h1 + h2 {
      margin-top: 15px;
    }
  }

  &__table {
    margin-top: 25px;
  }
}
</style>
