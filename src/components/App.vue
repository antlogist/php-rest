<template>
  <div>
    <div class="checkboxes-wrapper">

      <div class="answerone-wrapper">
        <input type="checkbox" id="answerOne" v-model="answerOne">
        <label for="answerOne">Maxime similique ab debitis aliquid! Ea accusantium harum ducimus animi. Facilis?</label>
      </div>

      <div class="answerone-wrapper">
        <input type="checkbox" id="answerTwo" v-model="answerTwo">
        <label for="answerTwo">Maxime similique ab debitis aliquid! Ea accusantium harum ducimus animi. Facilis?</label>
      </div>

      <div class="answerone-wrapper">
        <input type="checkbox" id="answerThree" v-model="answerThree">
        <label for="answerThree">Maxime similique ab debitis aliquid! Ea accusantium harum ducimus animi. Facilis?</label>
      </div>

      <div class="answerone-wrapper">
        <input type="checkbox" id="answerFour" v-model="answerFour">
        <label for="answerFour">Maxime similique ab debitis aliquid! Ea accusantium harum ducimus animi. Facilis?</label>
      </div>

      <div class="answerone-wrapper">
        <input type="checkbox" id="answerFive" v-model="answerFive">
        <label for="answerFive">Maxime similique ab debitis aliquid! Ea accusantium harum ducimus animi. Facilis?</label>
      </div>

    </div>

    <h2>Products:</h2>
    {{ products }}

  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
  data() {
    return {
      test: "test"
    }
  },
  computed: {
    ...mapGetters("userAnswers", ["products", "answers"]),
    answerOne: {
      get() {
        return this.answers.answer_one ? this.answers.answer_one.answer : false;
      },
      set(answer) {
        this.setAnswers({
          answerNum: 'answer_one',
          answer
        })
      }
    },
    answerTwo: {
      get() {
        return this.answers.answer_two ? this.answers.answer_two.answer : false;
      },
      set(answer) {
        this.setAnswers({
          answerNum: 'answer_two',
          answer
        })
      }
    },
    answerThree: {
      get() {
        return this.answers.answer_three ? this.answers.answer_three.answer : false;
      },
      set(answer) {
        this.setAnswers({
          answerNum: 'answer_three',
          answer
        })
      }
    },
    answerFour: {
      get() {
        return this.answers.answer_four ? this.answers.answer_four.answer : false;
      },
      set(answer) {
        this.setAnswers({
          answerNum: 'answer_four',
          answer
        })
      }
    },
    answerFive: {
      get() {
        return this.answers.answer_five ? this.answers.answer_five.answer : false;
      },
      set(answer) {
        this.setAnswers({
          answerNum: 'answer_five',
          answer
        })
      }
    },

  },
  methods: {
    ...mapActions("userAnswers", ["getProducts", "setAnswers"]),
  },
}
</script>
