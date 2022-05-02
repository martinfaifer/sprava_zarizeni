<template>
    <Alert></Alert>
    <div
        class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8"
    >
        <div class="max-w-md w-full space-y-8">
            <div>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="mx-auto h-12 w-auto"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"
                    />
                </svg>
                <h2
                    class="mt-6 text-center text-3xl font-extrabold text-gray-900"
                >
                    Přihlašte se do svého účtu
                </h2>
            </div>
            <form class="mt-8 space-y-6" @submit.prevent="login()">
                <input type="hidden" name="remember" value="true" />
                <div class="">
                    <div>
                        <label for="email-address" class="sr-only">Email</label>
                        <input
                            id="email-address"
                            name="email"
                            type="email"
                            autocomplete="email"
                            class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Email"
                            v-model="email"
                        />
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500" v-html="errors.email"></p>
                    </div>
                    <div class="py-3">
                        <label for="password" class="sr-only">Heslo</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            autocomplete="current-password"
                            class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Heslo"
                            v-model="password"
                        />
                         <p class="mt-2 text-sm text-red-600 dark:text-red-500" v-html="errors.password"></p>
                    </div>
                </div>
                <div>
                    <button
                        type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        <span
                            class="absolute left-0 inset-y-0 flex items-center pl-3"
                        >
                            <LockClosedIcon
                                class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                                aria-hidden="true"
                            />
                        </span>
                        Přihlásit
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { LockClosedIcon } from "@heroicons/vue/solid";
import Alert from "../Alerts/Alert.vue";

export default {
    data() {
        return {
            errors: [],
            email: null,
            password: null,
        };
    },
    components: {
        LockClosedIcon,
        Alert,
    },

    created() {},
    methods: {
        login() {
            this.errors = [];
            axios
                .post("login", {
                    email: this.email,
                    password: this.password,
                })
                .then((response) => {
                    this.$root.$emit("alert_component", response.data.data);
                    if (response.data.status === "success") {
                        this.$store.state.user = response.data.data;
                        setTimeout(function () {}, 2000);
                        this.$router.push("/");
                    } else {
                        this.email = null;
                        this.password = null;
                    }
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },
    },
};
</script>
