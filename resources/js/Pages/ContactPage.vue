<template>
  <Head>
    <title>Контакты</title>
  </Head>
  <Layout>
    <main class="page">
      <div class="contact-page">
        <div class="contact-page__content">
          <h1>Контакт</h1>
          <form @submit.prevent="submitForm" @reset="resetForm" class="contact-form" method="post">
            <div class="contact-form__group">
              <label for="secondname">Фамилия:</label>
              <Tooltip text="Фамилия должна содержать только буквы!">
                <input required v-model="form.secondName" class="contact-form__input" id="secondname" type="text"
                  placeholder="Введите Вашу фамилию" />
              </Tooltip>
              <div v-if="form.errors.secondName" class="input-error">
                {{ form.errors.secondName }}
              </div>
            </div>

            <div class="contact-form__group">
              <label for="firstname">Имя:</label>
              <Tooltip text="Имя должно содержать только буквы!">
                <input required v-model="form.firstName" class="contact-form__input" id="firstname" type="text"
                  placeholder="Введите Ваше имя" />
              </Tooltip>
              <div v-if="form.errors.firstName" class="input-error">
                {{ form.errors.firstName }}
              </div>
            </div>

            <div class="contact-form__group">
              <label for="thirdname">Отчество:</label>
              <Tooltip text="Отчество должно содержать только буквы!">
                <input required v-model="form.thirdName" class="contact-form__input" id="thirdname" type="text"
                  placeholder="Введите Ваше отчество" />
              </Tooltip>
              <div v-if="form.errors.thirdName" class="input-error">
                {{ form.errors.thirdName }}
              </div>
            </div>

            <div class="contact-form__group">
              <label for="email">Email:</label>
              <Tooltip text="Введите Ваш email">
                <input required v-model="form.email" class="contact-form__input" id="email" type="email"
                  placeholder="Введите Ваш email" />
              </Tooltip>
              <div v-if="form.errors.email" class="input-error">
                {{ form.errors.email }}
              </div>
            </div>

            <div class="contact-form__group">
              <label for="phone">Номер телефона:</label>
              <Tooltip text="Номер должен начинаться с +7 или +380">
                <input required v-model="form.phone" class="contact-form__input" id="phone" type="tel"
                  placeholder="Введите Ваш номер телефона" />
              </Tooltip>
              <div v-if="form.errors.phone" class="input-error">
                {{ form.errors.phone }}
              </div>
            </div>

            <div class="contact-form__group">
              <label for="date-input">Дата рождения:</label>
              <div class="calendar">
                <Tooltip text="Выберите Вашу дату рождения" style="display: block">
                  <input @click="calendar.isOpened = true" :value="form.calendarValue" autocomplete="off"
                    class="contact-form__input" id="date-input" type="text" placeholder="Введите Вашу дату рождения"
                    readonly />
                </Tooltip>
                <div v-show="calendar.isOpened" class="calendar__popup" id="calendar-popup">
                  <div class="calendar__header">
                    <select v-model="calendar.currentMonth" name="month" id="select-month" title="Месяц рождения">
                      <optgroup>
                        <option disabled value="">
                          Месяц:
                        </option>
                        <option value="0" selected>
                          Январь
                        </option>
                        <option value="1">
                          Февраль
                        </option>
                        <option value="2">Март</option>
                        <option value="3">
                          Апрель
                        </option>
                        <option value="4">Май</option>
                        <option value="5">Июнь</option>
                        <option value="6">Июль</option>
                        <option value="7">
                          Август
                        </option>
                        <option value="8">
                          Сентябрь
                        </option>
                        <option value="9">
                          Октябрь
                        </option>
                        <option value="10">
                          Ноябрь
                        </option>
                        <option value="11">
                          Декабрь
                        </option>
                      </optgroup>
                    </select>

                    <select v-model="calendar.currentYear" name="year" id="select-year" title="Год рождения">
                      <optgroup>
                        <option disabled value="">
                          Год:
                        </option>
                        <option :value="calendar.firstYearOfBirth
                          " selected>
                          {{
                            calendar.firstYearOfBirth
                          }}
                        </option>
                        <option v-for="year in getNumberRange(
                          calendar.firstYearOfBirth +
                          1,
                          calendar.lastYearOfBirth
                        )" :value="year">
                          {{ year }}
                        </option>
                      </optgroup>
                    </select>

                    <svg @click="calendar.isOpened = false" class="calendar__close-btn" width="32px" height="32px"
                      viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM15.36 14.3C15.65 14.59 15.65 15.07 15.36 15.36C15.21 15.51 15.02 15.58 14.83 15.58C14.64 15.58 14.45 15.51 14.3 15.36L12 13.06L9.7 15.36C9.55 15.51 9.36 15.58 9.17 15.58C8.98 15.58 8.79 15.51 8.64 15.36C8.35 15.07 8.35 14.59 8.64 14.3L10.94 12L8.64 9.7C8.35 9.41 8.35 8.93 8.64 8.64C8.93 8.35 9.41 8.35 9.7 8.64L12 10.94L14.3 8.64C14.59 8.35 15.07 8.35 15.36 8.64C15.65 8.93 15.65 9.41 15.36 9.7L13.06 12L15.36 14.3Z"
                        fill="#292D32" />
                    </svg>
                  </div>
                  <div class="calendar__body">
                    <div class="calendar__weekdays">
                      <div class="calendar__weekday">
                        Пн
                      </div>
                      <div class="calendar__weekday">
                        Вт
                      </div>
                      <div class="calendar__weekday">
                        Ср
                      </div>
                      <div class="calendar__weekday">
                        Чт
                      </div>
                      <div class="calendar__weekday">
                        Пт
                      </div>
                      <div class="calendar__weekday">
                        Сб
                      </div>
                      <div class="calendar__weekday">
                        Вс
                      </div>
                    </div>
                    <div class="calendar__days" id="calendar-days">
                      <div v-for="_ in emptyDaysCount"></div>
                      <div v-for="day in totalDays" @click="pickDate(day)" class="calendar__day">
                        {{ day }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="contact-form__group">
              <p class="contact-form__wrap-label">Пол:</p>

              <div class="group-radios">
                <div class="group-radio">
                  <label for="male">Мужской</label>
                  <input v-model="form.gender" class="contact-form__input" name="gender" id="male" type="radio"
                    value="м" />
                </div>

                <div class="group-radio">
                  <label for="female">Женский</label>
                  <input v-model="form.gender" class="contact-form__input" name="gender" id="female" type="radio"
                    value="ж" />
                </div>
              </div>
            </div>

            <Modal ref="modal" class="modal">
              <h2>Вы точно хотите очистить форму?</h2>
              <p>Подтвердите действие</p>

              <div class="group-buttons">
                <button @click="closeModal" class="button button--medium" type="reset">
                  Очистить
                </button>
                <button @click="closeModal" class="button button--medium" type="button">
                  Отмена
                </button>
              </div>
            </Modal>

            <div class="contact-form__group">
              <div class="group-buttons main-buttons">
                <button @click="openModal" class="button button--medium" type="button">
                  Очистить форму
                </button>
                <button class="button button--medium" type="submit" :disabled="form.processing">
                  Отправить >
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </main>
  </Layout>
</template>

<script>
import { Head, useForm } from "@inertiajs/vue3";

import Layout from "@src/Components/Layout.vue";
import Tooltip from "@src/Components/Tooltip.vue";
import Modal from "@src/Components/Modal.vue";

import { visitPage } from "@src/Utils/storage";

export default {
  components: {
    Tooltip,
    Modal,
    Layout,
    Head,
  },
  mounted() {
    visitPage("Контакты");
  },
  data() {
    return {
      calendar: {
        firstYearOfBirth: 1900,
        lastYearOfBirth: new Date().getFullYear(),
        currentMonth: 0,
        currentYear: 1900,
        isOpened: false,
      },
      form: useForm({
        firstName: "",
        secondName: "",
        thirdName: "",
        email: "",
        phone: "",
        gender: "",
        calendarValue: "",
      }),
    };
  },
  methods: {
    getNumberRange(start, end) {
      return Array.from(
        { length: end - start + 1 },
        (_, index) => start + index
      );
    },
    getFirstDayOfWeek(year, month) {
      const date = new Date(year, month, 1);
      return date.getDay();
    },
    getDaysInMonth(year, month) {
      const date = new Date(year, month + 1, 0);
      return date.getDate();
    },
    getEmptyDaysCount(dayOfWeek) {
      if (dayOfWeek > 6 || dayOfWeek < 0) {
        throw new Error("Incorrect day of week!");
      }

      if (dayOfWeek === 0) {
        return 6;
      }

      return dayOfWeek - 1;
    },
    pickDate(day) {
      this.form.calendarValue = new Date(
        Number(this.calendar.currentYear),
        Number(this.calendar.currentMonth),
        day + 1
      )
        .toISOString()
        .split("T")[0];

      this.calendar.isOpened = false;
    },
    closeModal() {
      this.$refs.modal.closeModal();
    },
    openModal() {
      this.$refs.modal.openModal();
    },
    submitForm() {
      this.form.post("/contact", {
        onSuccess: () => {
          this.resetForm();
        },
      });
    },
    resetForm() {
      this.form.reset();
      this.form.clearErrors();
    },
  },
  computed: {
    firstDayOfWeek() {
      return this.getFirstDayOfWeek(
        Number(this.calendar.currentYear),
        Number(this.calendar.currentMonth)
      );
    },
    totalDays() {
      return this.getDaysInMonth(
        Number(this.calendar.currentYear),
        Number(this.calendar.currentMonth)
      );
    },
    emptyDaysCount() {
      return this.getEmptyDaysCount(this.firstDayOfWeek);
    },
  },
};
</script>

<style lang="scss" scoped>
@use "@styles/vars" as *;
@use "@styles/common" as *;

.contact-page {
  &__content {
    h1 {
      text-align: center;
    }

    .contact-form {
      @extend .form;
      align-items: center;

      &__group {
        @extend .form-group;
        max-width: 650px;
      }

      label,
      &__wrap-label {
        @include label();
      }

      &__input,
      select {
        @extend .form-input;

        &--valid {
          border-color: $border-color-valid;
        }

        &--unvalid {
          border-color: $border-color-unvalid;
        }
      }

      &__input[type="radio"] {
        width: 18px;
        height: 18px;

        &:hover {
          cursor: pointer;
        }
      }

      .group-radios {
        display: flex;
        flex-direction: row;
      }

      .group-radio {
        display: flex;
        flex-direction: row;

        input {
          margin-left: 5px;
        }
      }

      .group-radio+.group-radio {
        margin-left: 15px;
      }

      .group-buttons {
        @extend .form-group-buttons;

        &.main-buttons {
          button {
            @extend .form-group-button;
          }
        }
      }

      .modal {
        @extend .form-modal-buttons;
      }
    }

    .calendar {
      position: relative;
      display: inline-block;

      color: #ffffff;

      input {
        width: 100%;
      }

      select {
        max-width: 240px;
      }

      &__popup {
        position: absolute;

        z-index: 1;
        margin-top: 5px;

        background-color: #080808;
        border: 2px solid #ffffff;
        border-radius: 10px;
      }

      &__header {
        display: flex;
        padding: 8px;

        border-bottom: 1px solid #ffffff;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;

        #select-month+#select-year {
          margin-left: 10px;
        }

        optgroup {
          font-family: "IBM Plex Mono", sans-serif;
          background-color: #000000;
        }
      }

      &__close-btn {
        cursor: pointer;
        margin-left: auto;
      }

      &__body {
        padding: 8px;
      }

      &__weekdays {
        display: flex;
        justify-content: space-around;
      }

      &__weekday {
        text-align: center;
      }

      &__days {
        display: flex;
        flex-wrap: wrap;

        margin-top: 10px;

        div {
          width: 14.28%;
          padding: 10px;
        }
      }

      &__day {
        text-align: center;

        width: 14.28%;
        padding: 10px;

        cursor: pointer;

        border-radius: 5px;

        &:hover {
          background-color: #3b3b3b;
        }
      }
    }
  }
}
</style>
