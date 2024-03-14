<template>
  <Head>
    <title>Главная</title>
  </Head>
  <Layout>
    <main class="page">
      <div class="main-page">
        <div class="main-page__content">
          <div class="main-page__text">
            <h1>Кабалинов Максим Владимирович</h1>
            <p>Группа: ИС/б-21-3-о</p>
            <p>Лабораторная работа №4 (вариант №7):</p>
            <p>
              Исследование объектной модели документа (DOM) и системы событий
              JavaScript
            </p>
            <Link
              href="/about"
              class="button button--green button--large"
              >Обо мне ></Link
            >
          </div>
          <div class="main-page__photo">
            <img src="@assets/oppenheimer.jpg" alt="Оппенгеймер" />
          </div>
        </div>
      </div>
    </main>
  </Layout>
</template>

<script>
import { Head } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";

import Layout from "@src/Components/Layout.vue";
import { visitPage } from "@src/Utils/storage";

export default {
  components: {
    Layout,
    Link,
    Head,
  },
  mounted() {
    visitPage("Главная");
  }
}
</script>

<style lang="scss" scoped>
@use "@styles/vars" as *;

.main-page {
  &__content {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  &__text {
    a {
      display: inline-block;
      margin-top: 30px;

      text-decoration: none;

      transition: transform 0.3s, box-shadow 0.3s;

      &:hover {
        transform: scale(1.05);
        box-shadow: 0 0 20px 2px $color-bg-button-green;
      }
    }
  }
  &__photo {
    margin-left: 15px;

    img {
      min-height: 350px;
      min-width: 350px;

      width: 100%;
      height: 100%;

      max-height: 850px;
      max-width: 850px;

      object-fit: cover;
      opacity: 0.7;
      border-radius: 15px;
    }
  }
}
</style>
