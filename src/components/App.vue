<!--src/components/App.vue-->

<template>
  <div class="container app-inner-wrapper mb-5">

    <div class="sample-title-wrapper mt-2 mb-4">
      <h2>Demo App</h2>
    </div>

    <div class="checkboxes-wrapper mb-3">

      <div class="answer-wrapper form-check mb-1">
        <input class="form-check-input" type="checkbox" id="answerOne" v-model="answerOne">
        <label class="form-check-label" for="answerOne">1. Non-Animal</label>
      </div>

      <div class="answer-wrapper form-check mb-1">
        <input class="form-check-input" type="checkbox" id="answerTwo" v-model="answerTwo">
        <label class="form-check-label" for="answerTwo">2. Waterproof outer</label>
      </div>

      <div class="answer-wrapper form-check mb-1">
        <input class="form-check-input" type="checkbox" id="answerThree" v-model="answerThree">
        <label class="form-check-label" for="answerThree">3. Warm</label>
      </div>

      <div class="answer-wrapper form-check mb-1">
        <input class="form-check-input" type="checkbox" id="answerFour" v-model="answerFour">
        <label class="form-check-label" for="answerFour">4. Chunky</label>
      </div>

      <div class="answer-wrapper form-check mb-1">
        <input class="form-check-input" type="checkbox" id="answerFive" v-model="answerFive">
        <label class="form-check-label" for="answerFive">5. Low heel / flat</label>
      </div>

    </div>

    <h4>Products:</h4>

    <div class="row">
      <div
        class="col-sm-3 mb-3"
        v-for="(product, index) in products"
        :key="'product-' + index">
        <div class="card">
          <img :src="product.image_path" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{ product.name }}</h5>
            <p class="card-text" v-html="product.description"></p>
            <a href="#" @click="addToCart" class="btn btn-outline">Add to Cart</a>
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
    addToCart(product) {
      console.log(product.title);
    }
  },
}
</script>
<style lang="scss">
$color: #ffff;
$color-2: #253f46;

.app-inner-wrapper {
  .checkboxes-wrapper {}
  .card {
    .card-body {
      .card-title {
      }
      .card-text {
        .false {
          opacity: 0.25;
        }
      }

    }
  }
}
</style>
<style lang="scss" scoped>
$color: #ffff;
$color-2: #253f46;
.app-inner-wrapper {
  padding: 15px;
  background-color: $color;
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
  .checkboxes-wrapper {}
  .card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 0.25rem;
    .card-body {
      flex: 1 1 auto;
      padding: 1rem 1rem;
      background-color: $color-2;
      .card-title {
        color: $color;
      }
      .card-text {
        color: $color;
      }

    }
  }
}
</style>
