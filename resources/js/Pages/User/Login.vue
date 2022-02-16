<template>
    <Nav />

    <div class="min-h-full flex flex-col justify-center py-8 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img class="mx-auto h-12 w-auto" src="https://nl-nl.giesen.com/wp-content/uploads/2021/09/Giesen-Coffee-Roasters-Black-PNG-01-768x304.png" alt="Workflow" />
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Sign in to your account</h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Or
                {{ ' ' }}
                <Link :href="route('register')" class="font-medium text-indigo-600 hover:text-indigo-500"> register a new account </Link>
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" @submit.prevent="submit">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700"> Email address </label>
                        <div class="mt-1">
                            <input id="email" v-model="form.email" name="email" type="email" autocomplete="email" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                        <div class="mt-1">
                            <input id="password" v-model="form.password" name="password" type="password" autocomplete="current-password" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <Footer />
</template>

<script>
import Nav from '../../Shared/Layout/Nav';
import { Link } from '@inertiajs/inertia-vue3';
import {reactive} from "vue";
import {Inertia} from "@inertiajs/inertia";
import Footer from "../../Shared/Layout/Footer";

export default {
    components: {
        Footer,
        Nav,
        Link,
    },
    setup(){
        const form = reactive({
            email: null,
            password: null,
            remember: null,
        })

        function submit() {
            Inertia.post('/login', form)
        }

        return { form, submit }
    }
}
</script>
