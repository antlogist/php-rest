<template>
  <div>
    <h1>{{ test }}</h1>
    <button @click="setAnswer">Test</button>
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
    methods: {
    ...mapActions("answers", ["setAnswer"]),
    testStore() {
      this.setAnswer();
    }
  },
}
</script>
