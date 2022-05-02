import { createApp } from "vue";
import { createStore } from "vuex";
import App from "./components/App.vue";
import router from "./router/router";
import "flowbite";
// import { store } from "./store/store";

createApp(App).use(router).mount("#app");

require("./bootstrap");
