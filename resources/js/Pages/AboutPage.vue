<template>
  <Head>
    <title>Обо мне</title>
  </Head>
  <Layout>
    <main class="page">
      <div class="about-page">
        <div class="about-page__content">
          <h1>Автобиография</h1>
          <p>Кабалинов Максим Владимирович</p>

          <p>
            Родился и вырос в Севастополе. На данный момент 19 лет 😉. За всю
            школьную жизнь учился в двух учреждениях: ГБОУ Гимназия №10 😐 и ГБОУ
            СОШ №41 😋. После успешного окончания школы началась моя учеба в
            СевГУ, которая продолжается по сей день!🤩🤩🤩. Ну а что еще добавить,
            только lorem...
          </p>
          <p lang="en">
            Aute cillum incididunt enim aute. Sit excepteur adipisicing
            exercitation et sunt proident. Adipisicing qui qui sit reprehenderit
            tempor aliquip in ullamco in. Ad dolore reprehenderit sit consectetur
            ut eu laborum ea aute ad. Magna in est laborum velit elit Lorem ad.
          </p>
          <p lang="en">
            Non deserunt cupidatat culpa anim nisi sint non ullamco tempor.
            Incididunt veniam magna laboris fugiat eiusmod tempor fugiat deserunt
            eu. Et ipsum occaecat ad irure est velit ullamco. Nulla in Lorem nulla
            minim nulla excepteur non mollit. Nisi Lorem laboris id adipisicing
            anim velit ullamco officia occaecat id. Qui sit minim eiusmod
            exercitation tempor esse est consectetur laborum minim proident.
            Voluptate ullamco adipisicing eiusmod labore nulla proident sunt ad
            officia commodo est adipisicing deserunt.
          </p>
        </div>
      </div>
    </main>
  </Layout>
</template>

<script>
import { Head } from "@inertiajs/vue3";
import Layout from "@src/Components/Layout.vue";
import { visitPage } from "@src/Utils/storage";

export default {
  components: {
    Layout,
    Head,
  },
  mounted() {
    visitPage("Обо мне");
  }
}
</script>

<style lang="scss">
.about-page {
  &__content {
    p {
      line-height: 2;
    }
  }
}
</style>
