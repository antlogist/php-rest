<!--src/components/App.vue-->

<template>
  <div class="container">
    <div class="checkboxes-wrapper">

      <div class="answerone-wrapper">
        <input type="checkbox" id="answerOne" v-model="answerOne">
        <label for="answerOne">1. Lorem ipsum dolor sit amet, consectetur adipisicing elit?</label>
      </div>

      <div class="answerone-wrapper">
        <input type="checkbox" id="answerTwo" v-model="answerTwo">
        <label for="answerTwo">2. Lorem ipsum dolor sit amet, consectetur adipisicing elit?</label>
      </div>

      <div class="answerone-wrapper">
        <input type="checkbox" id="answerThree" v-model="answerThree">
        <label for="answerThree">3. Lorem ipsum dolor sit amet, consectetur adipisicing elit?</label>
      </div>

      <div class="answerone-wrapper">
        <input type="checkbox" id="answerFour" v-model="answerFour">
        <label for="answerFour">4. Lorem ipsum dolor sit amet, consectetur adipisicing elit?</label>
      </div>

      <div class="answerone-wrapper">
        <input type="checkbox" id="answerFive" v-model="answerFive">
        <label for="answerFive">5. Lorem ipsum dolor sit amet, consectetur adipisicing elit?</label>
      </div>

    </div>

    <h2>Products:</h2>

    <div class="row">
      <div
        class="col-sm-3 mb-3"
        v-for="(product, index) in products"
        :key="'product-' + index">
        <div class="card">
          <img :src="product.image_path" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{ product.name }}</h5>
            <p class="card-text">
              Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-outline">Add to Cart</a>
          </div>
        </div>
      </div>
    </div>

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
  created() {
    this.getProducts();
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
