<template>
  <Head>
    <title>Тест</title>
  </Head>
  <Layout>
    <main class="page">
      <div class="test-page">
        <div class="test-page__content">
          <h1>Тест по теории вероятностей и математической статистике</h1>
          <form @submit.prevent="submitForm" @reset="resetForm" method="post">
            <div class="questions-form">
              <div class="question">
                <h2 class="question__number">Вопрос 1</h2>
                <p class="question__text">
                  Какое из утверждений относительно генеральной и выборочной
                  совокупностей является верным?
                </p>
                <div class="question__answers">
                  <div class="question__answer-variant">
                    <input required v-model="form.firstQuestion" name="question1" id="question1_answ1" type="radio"
                      value="A" />
                    <label for="question1_answ1">A. Выборочная совоупность – часть генеральной</label>
                  </div>
                  <div class="question__answer-variant">
                    <input required v-model="form.firstQuestion" name="question1" id="question1_answ2" type="radio"
                      value="B" />
                    <label for="question1_answ2">B. Генеральная совокупность – часть выборочной</label>
                  </div>
                  <div class="question__answer-variant">
                    <input required v-model="form.firstQuestion" name="question1" id="question1_answ3" type="radio"
                      value="C" />
                    <label for="question1_answ3">C. Выборочная и генеральная совокупности равны по
                      численности</label>
                  </div>
                  <div class="question__answer-variant">
                    <input required v-model="form.firstQuestion" name="question1" id="question1_answ4" type="radio"
                      value="D" />
                    <label for="question1_answ4">D. Правильный ответ отсутствует</label>
                  </div>
                </div>
                <div v-if="form.errors.firstQuestion" class="input-error">
                  {{ form.errors.firstQuestion }}
                </div>
              </div>
              <div class="question">
                <h2 class="question__number">Вопрос 2</h2>
                <p class="question__text">Мощность критерия – это:</p>
                <div class="question__answers">
                  <div class="question__answer-variant">
                    <input required v-model="form.secondQuestion" name="question2" id="question2_answ1" type="radio"
                      value="A" />
                    <label for="question2_answ1">A. Вероятность не допустить ошибку второго рода</label>
                  </div>
                  <div class="question__answer-variant">
                    <input required v-model="form.secondQuestion" name="question2" id="question2_answ2" type="radio"
                      value="B" />
                    <label for="question2_answ2">B. Вероятность допустить ошибку второго рода</label>
                  </div>
                  <div class="question__answer-variant">
                    <input required v-model="form.secondQuestion" name="question2" id="question2_answ3" type="radio"
                      value="C" />
                    <label for="question2_answ3">C. Вероятность отвергнуть нулевую гипотезу, когда она
                      неверна</label>
                  </div>
                  <div class="question__answer-variant">
                    <input required v-model="form.secondQuestion" name="question2" id="question2_answ4" type="radio"
                      value="D" />
                    <label for="question2_answ4">D. Вероятность отвергнуть нулевую гипотезу, когда она
                      верна</label>
                  </div>
                </div>
                <div v-if="form.errors.secondQuestion" class="input-error">
                  {{ form.errors.secondQuestion }}
                </div>
              </div>
              <div class="question">
                <h2 class="question__number">Вопрос 3</h2>
                <p class="question__text">Сумма частот признака равна:</p>
                <div class="question__answers">
                  <div class="question__answer-variant">
                    <input required v-model="form.thirdQuestion" name="question3" id="question3_answ1" type="radio"
                      value="A" />
                    <label for="question3_answ1">A. Объему выборки n</label>
                  </div>
                  <div class="question__answer-variant">
                    <input required v-model="form.thirdQuestion" name="question3" id="question3_answ2" type="radio"
                      value="B" />
                    <label for="question3_answ2">B. Среднему арифметическому значений признака</label>
                  </div>
                  <div class="question__answer-variant">
                    <input required v-model="form.thirdQuestion" name="question3" id="question3_answ3" type="radio"
                      value="C" />
                    <label for="question3_answ3">C. Нулю</label>
                  </div>
                  <div class="question__answer-variant">
                    <input required v-model="form.thirdQuestion" name="question3" id="question3_answ4" type="radio"
                      value="D" />
                    <label for="question3_answ4">D. Единице</label>
                  </div>
                </div>
                <div v-if="form.errors.thirdQuestion" class="input-error">
                  {{ form.errors.thirdQuestion }}
                </div>
              </div>
              <div class="question">
                <h2 class="question__number">Вопрос 4</h2>
                <p class="question__text">
                  Что представляет собой критическая область?
                </p>
                <div class="question__answers">
                  <div class="question__answers-variant">
                    <Tooltip text="Введите ваш ответ (должен содержать не менее 20 слов)">
                      <textarea v-model="form.fourthQuestion" id="question4_answ" name="question4" cols="45"
                        rows="5"></textarea>
                    </Tooltip>
                  </div>
                </div>
                <div v-if="form.errors.fourthQuestion" class="input-error">
                  {{ form.errors.fourthQuestion }}
                </div>
              </div>
            </div>
            <div class="data-form">
              <h2>Введите Ваши данные</h2>

              <div class="data-form__group">
                <label for="secondname">Фамилия:</label>
                <Tooltip text="Фамилия должна содержать только буквы!">
                  <input required v-model="form.secondName" class="data-form__input" id="secondname" type="text"
                    placeholder="Введите Вашу фамилию" />
                </Tooltip>
                <div v-if="form.errors.secondName" class="input-error">
                  {{ form.errors.secondName }}
                </div>
              </div>

              <div class="data-form__group">
                <label for="firstname">Имя:</label>
                <Tooltip text="Имя должно содержать только буквы!">
                  <input required v-model="form.firstName" class="data-form__input" id="firstname" type="text"
                    placeholder="Введите Ваше имя" />
                </Tooltip>
                <div v-if="form.errors.firstName" class="input-error">
                  {{ form.errors.firstName }}
                </div>
              </div>

              <div class="data-form__group">
                <label for="thirdname">Отчество:</label>
                <Tooltip text="Отчество должно содержать только буквы!">
                  <input required v-model="form.thirdName" class="data-form__input" id="thirdname" type="text"
                    placeholder="Введите Ваше отчество" />
                </Tooltip>
                <div v-if="form.errors.thirdName" class="input-error">
                  {{ form.errors.thirdName }}
                </div>
              </div>

              <div class="data-form__group">
                <label for="group">Группа:</label>
                <Tooltip text="Выберите Вашу группу">
                  <select required v-model="form.group" name="group" id="group">
                    <option value="" selected disabled class="default-option">
                      Выберите Вашу группу
                    </option>
                    <optgroup label="Третий курс">
                      <option value="ИБ/б-21-1-о">ИБ/б-21-1-о</option>
                      <option value="ИБ/б-21-2-о">ИБ/б-21-2-о</option>
                      <option value="ИВТ/б-21-1-о">ИВТ/б-21-1-о</option>
                      <option value="ИВТ/б-21-2-о">ИВТ/б-21-2-о</option>
                      <option value="ИВТ/б-21-3-о">ИВТ/б-21-3-о</option>
                      <option value="ИС/б-21-1-о">ИС/б-21-1-о</option>
                      <option value="ИС/б-21-2-о">ИС/б-21-2-о</option>
                      <option value="ИС/б-21-3-о">ИС/б-21-3-о</option>
                      <option value="ПИ/б-21-1-о">ПИ/б-21-1-о</option>
                      <option value="ПИ/б-21-2-о">ПИ/б-21-2-о</option>
                    </optgroup>
                    <optgroup label="Четвертый курс">
                      <option value="ИБ/б-20-1-о">ИБ/б-20-1-о</option>
                      <option value="ИБ/б-20-2-о">ИБ/б-20-2-о</option>
                      <option value="ИВТ/б-20-1-о">ИВТ/б-20-1-о</option>
                      <option value="ИВТ/б-20-2-о">ИВТ/б-20-2-о</option>
                      <option value="ИС/б-20-1-о">ИС/б-20-1-о</option>
                      <option value="ИС/б-20-2-о">ИС/б-20-2-о</option>
                      <option value="ПИ/б-20-1-о">ПИ/б-20-1-о</option>
                      <option value="ПИН/б-20-1-о">ПИН/б-20-1-о</option>
                    </optgroup>
                  </select>
                </Tooltip>
                <div v-if="form.errors.group" class="input-error">
                  {{ form.errors.group }}
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

              <div class="data-form__group">
                <div class="group-buttons main-buttons">
                  <button @click="openModal" class="button buttom--medium" type="button">
                    Очистить форму
                  </button>
                  <button class="button button--medium" type="submit">
                    Отправить тест >
                  </button>
                </div>
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
    visitPage("Тест");
  },
  data() {
    return {
      form: useForm({
        firstQuestion: "",
        secondQuestion: "",
        thirdQuestion: "",
        fourthQuestion: "",

        firstName: "",
        secondName: "",
        thirdName: "",
        group: "",
      }),
    };
  },
  methods: {
    closeModal() {
      this.$refs.modal.closeModal();
    },
    openModal() {
      this.$refs.modal.openModal();
    },
    submitForm() {
      this.form.post('/test', {
        onSuccess: () => {
          this.resetForm();
        }
      });
    },
    resetForm() {
      this.form.reset();
      this.form.clearErrors();
    },
  },
};
</script>

<style lang="scss">
@use "@styles/vars" as *;
@use "@styles/common" as *;

.test-page {
  .question {
    margin-top: 15px;

    &__text {
      margin-top: 10px;
    }

    &__answers {
      display: flex;
      flex-direction: column;

      margin-top: 25px;
    }

    &__answer-variant {
      display: flex;
      flex-direction: row;
      text-align: center;
    }

    label {
      margin-left: 15px;
      cursor: pointer;
    }

    input[type="radio"] {
      cursor: pointer;
    }

    textarea {
      @extend .form-input;

      &.valid {
        border-color: $border-color-valid;
      }

      &.unvalid {
        border-color: $border-color-unvalid;
      }
    }
  }

  .question+.question {
    margin-top: 45px;
  }

  .data-form {
    @extend .form;

    &__group {
      @extend .form-group;
    }

    label {
      @include label();
    }

    &__input,
    select {
      @extend .form-input;

      &.valid {
        border-color: $border-color-valid;
      }

      &.unvalid {
        border-color: $border-color-unvalid;
      }
    }

    optgroup,
    option {
      font-family: "IBM Plex Mono", sans-serif;
      background-color: #000000;
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
}
</style>
