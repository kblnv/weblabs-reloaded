<template>
  <Head>
    <title>Фотоальбом</title>
  </Head>
  <Layout>
    <main class="page">
      <div class="album-page">
        <div v-if="openedPhoto" class="album-page__overlay">
          <div class="album-page__overlay-content">
            <svg
              @click="closePhoto"
              class="album-page__overlay-close-photo"
              width="64px"
              height="64px"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM15.36 14.3C15.65 14.59 15.65 15.07 15.36 15.36C15.21 15.51 15.02 15.58 14.83 15.58C14.64 15.58 14.45 15.51 14.3 15.36L12 13.06L9.7 15.36C9.55 15.51 9.36 15.58 9.17 15.58C8.98 15.58 8.79 15.51 8.64 15.36C8.35 15.07 8.35 14.59 8.64 14.3L10.94 12L8.64 9.7C8.35 9.41 8.35 8.93 8.64 8.64C8.93 8.35 9.41 8.35 9.7 8.64L12 10.94L14.3 8.64C14.59 8.35 15.07 8.35 15.36 8.64C15.65 8.93 15.65 9.41 15.36 9.7L13.06 12L15.36 14.3Z"
                fill="#292D32"
              />
            </svg>
            <img
              :src="openedPhoto.path"
              :alt="openedPhoto.alt"
              data-openedPhoto
              width="650"
              height="650"
              class="album-page__overlay-photo image"
            />
            <div
              @click="prevPhoto"
              data-control
              class="album-page__overlay-prev-photo arrow"
            >
              &lt
            </div>
            <div
              @click="nextPhoto"
              data-control
              class="album-page__overlay-next-photo arrow"
            >
              &gt
            </div>
            <h2>{{ openedPhoto.title }}</h2>
          </div>
        </div>
        <div class="album-page__content">
          <h1>Фотоальбом</h1>
          <div class="album-page__photos">
            <div
              v-for="(photo, index) of photos"
              :key="photo.path"
              class="album-page__photo"
            >
              <img
                :data-photo="index"
                @click="openPhoto"
                loading="lazy"
                width="350"
                height="350"
                :src="photo.path"
                :title="photo.title"
                :alt="photo.alt"
                class="image"
              />
              <p>{{ photo.title }}</p>
            </div>
          </div>
        </div>
      </div>
    </main>
  </Layout>
</template>

<script>
import { Head } from "@inertiajs/vue3";

import { APP_URL } from "@src/config.js";
import Layout from "@src/Components/Layout.vue";
import { visitPage } from "@src/Utils/storage";

const BASE_URL = APP_URL + "/resources/assets";

export default {
  components: {
    Layout,
    Head,
  },
  mounted() {
    visitPage("Фотоальбом");
  },
  data() {
    return {
      openedPhotoIndex: -1,
      photos: [
        {
          path: BASE_URL + "/tommy-shelby1.jpg",
          title: "Томас Шелби 1",
          alt: "Томас Шелби 1",
        },
        {
          path: BASE_URL + "/tommy-shelby2.jpg",
          title: "Томас Шелби 2",
          alt: "Томас Шелби 2",
        },
        {
          path: BASE_URL + "/tommy-shelby3.jpg",
          title: "Томас Шелби 3",
          alt: "Томас Шелби 3",
        },
        {
          path: BASE_URL + "/tommy-shelby4.jpg",
          title: "Томас Шелби 4",
          alt: "Томас Шелби 4",
        },
        {
          path: BASE_URL + "/tommy-shelby5.jpg",
          title: "Томас Шелби 5",
          alt: "Томас Шелби 5",
        },
        {
          path: BASE_URL + "/tommy-shelby6.jpg",
          title: "Томас Шелби 6",
          alt: "Томас Шелби 6",
        },
        {
          path: BASE_URL + "/tommy-shelby7.jpg",
          title: "Томас Шелби 7",
          alt: "Томас Шелби 7",
        },
        {
          path: BASE_URL + "/tommy-shelby8.jpg",
          title: "Томас Шелби 8",
          alt: "Томас Шелби 8",
        },
        {
          path: BASE_URL + "/tommy-shelby9.jpg",
          title: "Томас Шелби 9",
          alt: "Томас Шелби 9",
        },
        {
          path: BASE_URL + "/tommy-shelby10.jpg",
          title: "Томас Шелби 10",
          alt: "Томас Шелби 10",
        },
        {
          path: BASE_URL + "/tommy-shelby11.jpg",
          title: "Томас Шелби 11",
          alt: "Томас Шелби 11",
        },
        {
          path: BASE_URL + "/tommy-shelby12.jpg",
          title: "Томас Шелби 12",
          alt: "Томас Шелби 12",
        },
        {
          path: BASE_URL + "/tommy-shelby13.jpg",
          title: "Томас Шелби 13",
          alt: "Томас Шелби 13",
        },
        {
          path: BASE_URL + "/tommy-shelby14.jpg",
          title: "Томас Шелби 14",
          alt: "Томас Шелби 14",
        },
        {
          path: BASE_URL + "/tommy-shelby15.jpg",
          title: "Томас Шелби 15",
          alt: "Томас Шелби 15",
        },
        {
          path: BASE_URL + "/tommy-shelby16.jpg",
          title: "Томас Шелби 16",
          alt: "Томас Шелби 16",
        },
      ],
    };
  },
  mounted() {
    document.addEventListener("keydown", this.keydownHandler);
  },
  unmounted() {
    document.removeEventListener("keydown", this.keydownHandler);
  },
  methods: {
    openPhoto(event) {
      this.openedPhotoIndex = Number(event.target.dataset.photo);
    },
    closePhoto() {
      this.openedPhotoIndex = -1;
    },
    prevPhoto() {
      if (this.openedPhotoIndex > 0) {
        this.openedPhotoIndex -= 1;
      }
    },
    nextPhoto() {
      if (this.openedPhotoIndex < this.photos.length - 1) {
        this.openedPhotoIndex += 1;
      }
    },
    keydownHandler({ key }) {
      if (this.openedPhoto) {
        if (key === "Escape") {
          this.closePhoto();
        } else if (key === "ArrowLeft") {
          this.prevPhoto();
        } else if (key === "ArrowRight") {
          this.nextPhoto();
        }
      }
    },
  },
  computed: {
    openedPhoto() {
      if (this.openedPhotoIndex === -1) {
        return null;
      }
      return this.photos[this.openedPhotoIndex];
    },
  },
};
</script>

<style lang="scss">
.album-page {
  .image {
    border: 3px solid #ffffff;
    object-fit: cover;
    border-radius: 15px;
  }

  &__content {
    h1 {
      text-align: center;
    }
  }

  &__overlay {
    position: fixed;
    z-index: 3;

    width: 100%;
    height: 100%;

    top: 0;
    left: 0;

    background-color: rgba(0, 0, 0, 0.6);

    &-content {
      width: 100%;
      height: 100%;

      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;

      h2 {
        margin-top: 15px;
      }
    }

    &-close-photo {
      position: absolute;
      cursor: pointer;
      top: 10px;
      right: 10px;
    }

    &-photo {
      position: relative;
    }

    &-prev-photo {
      transform: translate(-400px, -50%);
    }

    &-next-photo {
      transform: translate(400px, -50%);
    }

    .arrow {
      position: absolute;

      font-size: 5rem;
      color: #ffffff;

      cursor: pointer;

      user-select: none;
    }
  }

  &__photos {
    margin-top: 45px;

    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;

    column-gap: 15px;
    row-gap: 20px;
  }

  &__photo {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    p {
      text-align: center;
    }

    img {
      cursor: pointer;
    }
  }
}
</style>
